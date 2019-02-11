<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Auth\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Response;
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


    public function index()
    {
        $userId = auth()->user()->id;
        $files = [];

        $documents = Team::where('user_id', $userId)->get();

        $filePath = url('storage/documents/' . $userId);
       
        foreach ($documents as $document) {
            $fileArr = json_decode($document->documents);
            foreach ($fileArr as $file) {
                $ext = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", 'gif', 'GIF');
                $fileExt = explode('.', $file);
                if (in_array($fileExt[1], $ext)) {
                    $files[] = [
                        'key' => true,
                        'image' => $file,
                        'fileName' =>  $fileExt[0],
                        'filePath' => $filePath.'/'.$file,
                    ];
                } else {
                    $files[] = [
                        'key' => false,
                        'image' => 'documents.PNG',
                        'fileName' =>  $fileExt[0],
                        'filePath' => url('storage/documents/documents.PNG'),
                    ];
                }
            }
        }
        return view('frontend.user.account', compact('files', 'filePath'));
    }
    public function add_documents(Request $request)
    {
        
        $userId = auth()->user()->id;

        $fileArray = [];

        if ($request->hasFile('file')) {
            
            $storedPath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . 'public/documents';
            $folderPath = $storedPath.'/'.$userId;

            if (!File::isDirectory($folderPath)) {
                File::makeDirectory($folderPath, 0777, true, true);
            }

            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move($folderPath, $filename);
            $fileArray[] = $filename;

            Team::create(['user_id' => $userId, 'documents' => json_encode($fileArray, JSON_FORCE_OBJECT)]);
           
            return redirect()->route('frontend.user.account')->withFlashSuccess('Document has added.');

        }
    }

}
