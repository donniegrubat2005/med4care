<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Auth\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Backend\Auth\UserRepository;
use App\Models\Auth\User;

// use Illuminate\Contracts\Filesystem\Filesystem;
// use Image;
/**
 * Class AccountController.
 */
// use Image;
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
      
        $this->middleware(['role:user','permission:manage patients']);
   
    }



    public function index()
    {

        $user = auth()->user();
        $files = [];

        $s3 = Storage::disk('s3');
        $items = $s3->files('documents/'.$user->id);
        $documents = Team::where('user_id', $user->id)->get();

        foreach($items as $sk => $item){
            $docId = $documents[$sk]->id;
            $docu = $documents[$sk]->documents;
            $filesDocs = $documents[$sk]->files;

            $ext = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", 'gif', 'GIF');
            $docExt = explode('.', $documents[$sk]->documents);

            if (in_array($docExt[1], $ext)) {
                $files[] = [
                    'docId' => $docId,
                    'key' => true,
                    'dbFile' => $docu,
                    'fileName' => $docExt[0],
                    'fileUrl' =>   $s3->url($item),
                    'files' => '<img class="img-thumbnail d-block img-doc" src="data:image/jpeg;base64,'.base64_encode( $filesDocs ).'"/>' ,
                ];
            }
            else{
                $files[] = [
                    'docId' => $docId,
                    'key' => false,
                    'dbFile' => $docu,
                    'fileName' => $docExt[0],
                    'fileUrl' =>   $s3->url('documents/documents.PNG'),
                    'files' => '<img src="https://image.flaticon.com/icons/png/512/202/202322.png" class="img-thumbnail d-block img-doc">',
                ];
            }

        }
        return view('frontend.user.account', compact('files'));

    }

    
    public function patients()
    {
       
        return view('frontend.pages.patients');
    }
    // public function payments()
    // {

    //     return view('frontend.pages.payments');
    // }
    // public function reports()
    // {

    //     return view('frontend.pages.reports');
    // }
    
    
    
    public function add_documents(Request $request)
    {
        
        $userId = auth()->user()->id;

        $fileArray = [];

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            
            $name = time().'_'. $file->getClientOriginalName();
            $data = file_get_contents($file->getRealPath());

            // $name = time().'_'. $file->getClientOriginalName();
            $filePath = 'documents/'.$userId.'/'. $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));

            Team::create(['user_id' => $userId, 'documents' => $name, 'files' => $data ]);



            return redirect()->route('frontend.user.account')->withFlashSuccess('Document has added.');














            
            // $file = $request->file('file');
            // $name = time().'_'. $file->getClientOriginalName();
            // $filePath = 'documents/'.$userId.'/'. $name;
            // Storage::disk('s3')->put($filePath, file_get_contents($file));

            // Team::create(['user_id' => $userId, 'documents' => $name]);

        }
    }

    public function delete_my_documents($id, $file)
    {
        $userId = auth()->user()->id;
       
        $s3File = 'documents/'.$userId.'/'.$file;

        if(Storage::disk('s3')->exists($s3File)) {
          
            $doc = Team::findOrFail($id);
            $doc->delete();

            Storage::disk('s3')->delete($s3File);

            return response()->json(true);

        }
        return response()->json(false);
    }

}
