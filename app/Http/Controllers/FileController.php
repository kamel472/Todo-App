<?php

namespace App\Http\Controllers;
use App\Task;
use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function upload(Request $request , Task $task)
    {
          
        if($request->hasFile('File')){
        
            $file = $request->File;
            $fileName= $file->getClientOriginalName();
            $explode= explode(".",$fileName );
            $fileActualExt = strtolower(end($explode));
            $fileActualName= $explode[0];
            $fileUniqueName = str_replace(' ', '_',$fileActualName.$task->name.'.'.$fileActualExt);
            $file->storeAs('files', $fileUniqueName , 'public');
            $task->files()->create(['name'=>$fileUniqueName]);

            return response([

                'Message'=> 'File uploaded'
    
            ],201);
        }
        
        else {

            return response([

                'Message'=> 'Uploading failed'
    
            ],404);
        }
        
        
    }
}
?>
