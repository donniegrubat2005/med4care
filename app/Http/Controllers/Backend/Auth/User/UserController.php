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
use App\Mail\Backend\Contact\SendEmail;
use Illuminate\Support\Facades\Mail;

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

        // return new SendEmail([
        //     'title' => 'register',
        //     'email' => 'sample@gmail.com',
        //     'name' => 'bryan',
        //     'subject' => 'Email From ' . app_name(),
        //     'password' => '1112321',
        //     'message' => 'You are register from ' . app_name() . ' with your credentials.'
        // ]);
        return view('backend.auth.user.index')->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
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
        $user = $this->userRepository->create($request->only(
            'id_code',
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

        if ($user) {

            // Create user documents
            if ($request->hasFile('files')) {
                $this->create_document($request->file('files'), $user->id);
            }

            // Create user image
            if ($request->hasFile('image-file')) {
                $this->create_userImage($request->file('image-file'), $user->id);
            }

            // send Email
            Mail::send(new SendEmail([
                'title' => 'register',
                'email' => $user->email,
                'name' => $user->name,
                'subject' => 'Email From ' . app_name(),
                'password' => $request->password,
                'message' => 'You are register from ' . app_name() . ' with your Credenstials.'
            ]));
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
        $files = $this->userRepository->getUserFile($user);
        // dd($files);
        // $files = Team::where('user_id', $user->id)->get();
        // $files = $this->get_documents($user->id);

        return view('backend.auth.user.show')
            ->with(['files' => $files, 'percent' => $user->verification_points])
            ->withUser($user)
            ->withUsers($this->userRepository->getActivePaginated(10, 'id', 'asc'));
    }


    public function download($id)
    {
        $documents = Team::find($id);
        $userId = $documents->user_id;
        $file = $documents->documents;

        $s3File = 'documents/' . $userId . '/' . $file;

        if (Storage::disk('s3')->exists($s3File)) {
            return Storage::disk('s3')->download($s3File);
        }
    }

    public function get_documents($userId)
    {
        $items   = [];
        $dbFiles = Team::where('user_id', $userId)->get();
        $s3      = Storage::disk('s3');
        $s3Files = $s3->files('documents/' . $userId);

        foreach ($dbFiles as $fk => $file) {
            $ext = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", 'gif', 'GIF');

            if (in_array($dbFiles[$fk]->extention, $ext)) {
                $items[] = [
                    'key' => true,
                    'docId' => $file->id,
                    'dbFile' => $file->documents,
                    'fileName' => $file->documents,
                    'fileUrl' => $s3->url($s3Files[$fk]),
                    'files' => '<img class="img-thumbnail d-block img-doc" src="' . $s3->url($s3Files[$fk]) . '"/>',
                ];
            } else {
                $items[] = [
                    'key' => false,
                    'docId' => $file->id,
                    'fileName' => $file->documents,
                    'dbFile' => $file->documents,
                    'fileUrl' => $s3->url($s3Files[$fk]),
                    'files' => '<img src="https://image.flaticon.com/icons/png/512/202/202322.png" class="img-thumbnail d-block img-doc">',
                ];
            }
        }
        // dd( $items);


        // foreach ($items as $sk => $item) {
        //     $docId = $documents[$sk]->id;
        //     $docu = $documents[$sk]->documents;
        //     $filesDocs = $documents[$sk]->files;

        //     $ext = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", 'gif', 'GIF');
        //     $docExt = explode('.', $documents[$sk]->documents);

        //     if (in_array($docExt[1], $ext)) {

        //         $files[] = [
        //             'docId' => $docId,
        //             'key' => true,
        //             'dbFile' => $docu,
        //             'fileName' => $docExt[0],
        //             'fileUrl' => $s3->url($item),
        //             'files' => '<img class="img-thumbnail d-block img-doc" src="data:image/jpeg;base64,' . base64_encode($filesDocs) . '"/>',
        //         ];
        //     } else {
        //         $files[] = [
        //             'docId' => $docId,
        //             'key' => false,
        //             'dbFile' => $docu,
        //             'fileName' => $docExt[0],
        //             'fileUrl' => $s3->url('documents/documents.PNG'),
        //             'files' => '<img src="https://image.flaticon.com/icons/png/512/202/202322.png" class="img-thumbnail d-block img-doc">',
        //         ];
        //     }
        // }
        return $items;
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
        // dd($permissionRepository->get(['id', 'name'])->where('model_id', $user->id));
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
        foreach ($files as $file) {

            $name = time() . '_' . $file->getClientOriginalName();
            $data = file_get_contents($file->getRealPath());
            $extention = $file->getClientOriginalExtension();
            $fileSize =  File::size($file);
            $filePath = 'documents/' . $userId . '/' . $name;

            Storage::disk('s3')->put($filePath, file_get_contents($file));

            Team::create(['user_id' => $userId, 'documents' => $name, 'size' => $this->bytesToHuman($fileSize), 'extention' => $extention]);


            // $name = time() . '_' . $file->getClientOriginalName();
            // $data = file_get_contents($file->getRealPath());

            // // $name = time().'_'. $file->getClientOriginalName();
            // $filePath = 'documents/' . $userId . '/' . $name;
            // Storage::disk('s3')->put($filePath, file_get_contents($file));

            // Team::create(['user_id' => $userId, 'documents' => $name, 'files' => $data]);

            // Team::create(['user_id' => $userId, 'documents' => $name]);
        }
    }

    public function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function create_userImage($file, $userId)
    {
        $name = time() . '_' . $file->getClientOriginalName();
        $filePath = 'images/' . $userId . '/' . $name;
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
