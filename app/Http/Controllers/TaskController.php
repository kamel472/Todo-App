<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Http\Requests\TaskRequest;
use App\Task;


class TaskController extends Controller
{
    public function __construct(){

        $this->middleware('jwt')->except('index');
        //$this->middleware('can:control,task')->except('index','show','store');
    }
    
    public function index(){

        return TaskResource::collection(Task::where('visibility' , 'public')->paginate(10));
    }

    public function store(TaskRequest $request){

        $task = Task::create(['name'=> $request->name , 'user_id'=> auth()->user()->id

        ]);
        
        return response([

            'Message'=> 'Task created'

        ],201);
        
    }

    public function show(Task $task)
    {
        return response([

            'data'=> new TaskResource($task)
        ]);
    }

    public function update(TaskRequest $request, Task $task){

        $task->update([
            
            'name'=> $request->name 
            
        ]);
        
       return response([

           'message'=> 'Task Updated'
            
        ],201); 
    }

    public function setDeadline (Request $request, Task $task){

        $request->validate([

            'deadline' => ['date']
        ]);

        $task->update([
            
            'dead_line'=>$request->deadline 
            
        ]);

        
       return response([

           'message'=> 'Task Deadline Set'
            
        ],201); 
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response([

            'Message'=> 'Task Deleted'
            
        ]);

    }

    public function setVisibility(Request $request , Task $task){
        
        if($request->private == true){

            $visibility='private';
            $message = 'Task set as private';

        }else{

            $visibility='public';
            $message = 'Task set as public';

        }

        $task->update(['visibility'=>$visibility]);

        return response([

            'Message'=> $message
            
        ],201);

    } 

    public function setStatus(Request $request , Task $task){
        
        if($request->completed == true){

            $task->update(['status'=>'completed']);

            return response([

                'Message'=> 'Task Completed'
                
            ],201);

        }

    } 

}