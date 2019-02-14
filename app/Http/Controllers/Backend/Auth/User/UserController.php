<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Models\Auth\User;
use App\Models\Auth\Team;
use App\Http\Controllers\Controller;
use App\Events\Backend\Auth\User\UserDeleted;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Http\Requests\Backend\Auth\User\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Http\Request;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request)
    {
        // dd($this->userRepository->getActivePaginated(25, 'id', 'asc'));
        return view('backend.auth.user.index')
            ->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
    }
 
    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.user.create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreUserRequest $request)
    {
        // if ( Storage::disk(‘resources’)->exists(‘/assets/js/country_names.json’) ) $country_names = json_decode(Storage::disk(‘resources’)->get( ‘/assets/js/country_names.json’ ), true);
      
      
      
        $user = $this->userRepository->create($request->only(
            'code',
            'first_name',
            'last_name',
            'email',
            'password',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        if ($request->hasFile('files')) {
            $this->create_document($request->file('files'), $user->id);
        }
        if ($request->hasFile('image-file')) {
            $this->create_userImage($request->file('image-file'), $user->id);
        }

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.created'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function show(ManageUserRequest $request, User $user)
    {
        $files = $this->get_documents($user->id);
        return view('backend.auth.user.show')
            ->with(['files' => $files])
            ->withUser($user)
            ->withUsers($this->userRepository->getActivePaginated(10, 'id', 'asc'));
    }
    public function download($id)
    {
        $documents = Team::find($id);
        $userId =  $documents->user_id;
        $file =  $documents->documents;

        $s3File = 'documents/'.$userId.'/'.$file;

        if(Storage::disk('s3')->exists($s3File)) {
            return Storage::disk('s3')->download($s3File);
        }
    }
    public function get_documents($userId)
    {

        $files = [];

        
        // $userId = auth()->user()->id;
        $documents = Team::where('user_id', $userId)->get();

        $s3 = Storage::disk('s3');
        $items = $s3->files('documents/'.$userId);

        foreach($items as $sk => $item){
            $docId = $documents[$sk]->id;
            $docu = $documents[$sk]->documents;

            $ext = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", 'gif', 'GIF');
            $docExt = explode('.', $documents[$sk]->documents);

            if (in_array($docExt[1], $ext)) {
                $files[] = [
                    'docId' => $docId,
                    'key' => true,
                    'dbFile' => $docu,
                    'fileName' => $docExt[0],
                    'fileUrl' =>   $s3->url($item)
                ];
            }
            else{
                $files[] = [
                    'docId' => $docId,
                    'key' => false,
                    'dbFile' => $docu,
                    'fileName' => $docExt[0],
                    'fileUrl' =>   $s3->url('documents/documents.PNG') 
                ];
            }

        }
        return $files;
        // dd($files);
        // return view('frontend.user.account', compact('files'));





        // $files = [];

        // $documents = Team::where('user_id', $userId)->get();
        // $filePath = url('storage/documents/' . $userId);
        // if (!empty($documents)) {
        //     foreach ($documents as $document) {
        //         $fileArr = json_decode($document->documents);
        //         foreach ($fileArr as $file) {
        //             $ext = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", 'gif', 'GIF');
        //             $fileExt = explode('.', $file);
        //             if (in_array($fileExt[1], $ext)) {
        //                 $files[] = [
        //                     'key' => true,
        //                     'image' => $file,
        //                     'fileName' => $fileExt[0],
        //                     'filePath' => $filePath . '/' . $file,
        //                 ];
        //             } else {
        //                 $files[] = [
        //                     'key' => false,
        //                     'image' => 'documents.PNG',
        //                     'fileName' => $fileExt[0],
        //                     'filePath' => url('storage/documents/documents.PNG'),
        //                 ];
        //             }
        //         }
        //     }
        // }
        // return $files;
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param User                 $user
     *
     * @return mixed
     */
    public function edit(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository, User $user)
    {
        return view('backend.auth.user.edit')
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->update($user, $request->only(
            'id_code',
            'first_name',
            'last_name',
            'email',
            'roles',
            'permissions'
        ));
        if ($request->hasFile('files')) {
            $this->create_document($request->file('files'), $user->id);
        }
        return redirect()->route('admin.auth.user.show', $user)->withFlashSuccess(__('alerts.backend.users.updated'));
    }

    public function create_document($files, $userId)
    {
        foreach($files as $file){
            $name = time().'_'. $file->getClientOriginalName();
            $filePath = 'documents/'.$userId.'/'. $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            Team::create(['user_id' => $userId, 'documents' => $name]);
        }

    }
    
    public function create_userImage($file, $userId)
    {
        $name = time().'_'. $file->getClientOriginalName();
        $filePath = 'images/'.$userId.'/'. $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageUserRequest $request, User $user)
    {
        $this->userRepository->deleteById($user->id);

        event(new UserDeleted($user));

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('alerts.backend.users.deleted'));
    }
}
