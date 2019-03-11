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
    }

    public function index()
    {
        $items = [];
        $user = auth()->user();

        $percent = $user->verification_points;
        
        $files = Team::where('user_id', $user->id)->get();

        foreach ($files as $fk => $file) {
            $items[] = (object)[
                'docId' => $file->id,
                'fileSize' => $file->size,
                'fileName' =>  $file->documents,
                'filePath' =>  Storage::disk('s3')->url('documents/'. $user->id.'/'. $file->documents),
                'dateCreated' => $file->created_at
            ];
        }
       
        return view('frontend.user.account', compact('items', 'percent'));
    }

    public function add_documents(Request $request)
    {

        $userId = auth()->user()->id;

        $fileArray = [];

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $name = time() . '_' . $file->getClientOriginalName();
            $data = file_get_contents($file->getRealPath());
            $extention = $file->getClientOriginalExtension();
            $fileSize =  File::size($file) ;
            $filePath = 'documents/' . $userId . '/' . $name;

            Storage::disk('s3')->put($filePath, file_get_contents($file));

            Team::create(['user_id' => $userId, 'documents' => $name, 'size' => $this->bytesToHuman($fileSize), 'extention' => $extention]);

            return redirect()->route('frontend.user.account')->withFlashSuccess('Document has added.');
        }
    }

   
    public function delete_my_documents($id, $file)
    {
        $userId = auth()->user()->id;

        $s3File = 'documents/' . $userId . '/' . $file;

        if (Storage::disk('s3')->exists($s3File)) {

            $doc = Team::findOrFail($id);
            $doc->delete();

            Storage::disk('s3')->delete($s3File);

            return response()->json(true);
        }
        return response()->json(false);
    }

}
