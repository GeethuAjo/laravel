<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Directory;
use App\File;
use Validator;

class DirectoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show directory listing
     *
     * @return Response
     */
    public function index()
    {
        $directories = Directory::get();
        return view('index')->with(['directories'=>$directories]);
    }

    /**
     * Show files listing
     *
     * @return Response
     */
    public function viewFiles($directoryId)
    {
        $directory = Directory::find($directoryId);
        $files = File::where('directory_id',$directoryId)->paginate(2);
        return view('view-files')->with(['files'=>$files, 'directory' => $directory]);
    }

    /**
     * Show files listing
     *
     * @return Response
     */
    public function deletedFiles($directoryId)
    {
        $directory = Directory::find($directoryId);
        $deleted_files = File::withTrashed()->where('directory_id',$directoryId)->whereNotNull('deleted_at')->paginate(2);
        return view('deleted-files')->with(['deleted_files'=>$deleted_files,'directory' => $directory]);
    }

    /**
     * upload files 
     *
     * @return Response
     */
    public function uploadFiles($directoryId)
    {
        $directory = Directory::find($directoryId);
        return view('upload-files')->with([ 'directory' => $directory]);
    }

    /**
     * upload files 
     *
     * @return Response
     */
    public function storeFile(Request $request,$directoryId)
    {
        try{
            $validator = Validator::make($request->all(), [            
                'file' => 'mimes:txt,doc,docx,pdf,png,jpeg,jpg,gif|max:2000',
            ]);
            if ($validator->fails()) {

                return redirect('upload-files/'.$directoryId)
                            ->withErrors($validator)
                            ->withInput();
            } 
            $directory = Directory::find($directoryId);
            if($files=$request->file('file')){  
                $name=$files->getClientOriginalName();  
                $files->move('images/'.$directory->name,$name); 
            }
            File::create(['name' => $name,'directory_id' => $directoryId ]);
            return view('view-files')->with([ 'files'=>$files, 'directory' => $directory]);
        }catch (\Exception $ex) {
            return redirect('upload-files/'.$directoryId);
        }

    }

    /**
     * upload files 
     *
     * @return Response
     */
    public function deleteFile($fileId)
    {
        $file = File::find($fileId);
        $directory = Directory::find($file->directory_id);
        File::where('id',$fileId)->update(['deleted_at'=> date('Y-m-d h:i:s')]);
        $files = File::where('directory_id',$file->directory_id)->get();
        return view('view-files')->with([ 'files'=>$files, 'directory' => $directory]);

    }


    /**
     * search file 
     *
     * @return Response
     */
    public function searchFiles(Request $request,$directoryId,$type)
    {
        $filename = $request->get('search'); 
        $directory = Directory::find($directoryId); 
        if($type=="view"){
            $files = File::where('name','like','%'.$filename.'%')->paginate(2);
            return view('view-files')->with([ 'files'=>$files, 'directory' => $directory]);
        }
        elseif($type=="delete"){ 
            $deleted_files = File::withTrashed()->where('name','like','%'.$filename.'%')->whereNotNull('deleted_at')->paginate(2);
            return view('deleted-files')->with([ 'deleted_files'=>$deleted_files, 'directory' => $directory]);
        }
         
        
        

    }


}
