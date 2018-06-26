<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        
       return TaskResource::collection($tasks);
    }

    public function store(Request $request){
        $task = Task::create($request->all());
        
       return new TaskResource($task); 
    }
    
    public function destroy(Request $request,$id){
        Task::find($id)->delete();

        return "Done"; 
    }
}
