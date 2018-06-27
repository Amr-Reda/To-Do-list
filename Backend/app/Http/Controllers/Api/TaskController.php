<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Task;

class TaskController extends Controller
{
    /**
     * Get all of the tasks.
     * 
     * @return json
     */
    public function index(){
        $tasks = Task::all();
        
       return TaskResource::collection($tasks);
    }

    /**
     * create new task.
     * 
     * @return json
     */
    public function store(Request $request){
        $task = Task::create([
            'name' => $request->name,
        ]);
        
       return new TaskResource($task); 
    }
    
    /**
     * delete specific task.
     * 
     * @return json
     */
    public function destroy(Request $request,$id){
        Task::find($id)->delete();

        return  response()->json([
            'msg' => 'deleted successfully',
        ]);
    }
}
