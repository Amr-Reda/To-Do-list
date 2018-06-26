<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $request){
        $task = Task::create($request->all());
        
       return new TaskResource($task); 
    } 
}
