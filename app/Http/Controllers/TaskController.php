<?php

namespace App\Http\Controllers;

use App\Actions\Task\CompleteTaskAction;
use App\Actions\Task\CreateTaskAction;
use App\Actions\Task\DeleteTaskAction;
use App\Actions\Task\GetOneTaskAction;
use App\Actions\Task\GetTaskAction;
use App\Actions\Task\UpdateTaskAction;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request, $course){
        return GetTaskAction::execute($request, $course);
    }

    public function store(CreateTaskRequest $request, $course){
        return CreateTaskAction::execute($request, $course);
    }

    public function update(UpdateTaskRequest $request, $course, $task){
        return UpdateTaskAction::execute($request, $course, $task);
    }

    public function destroy($course, $task){
        return DeleteTaskAction::execute($course, $task);
    }

    public function show($course, $task){
        return GetOneTaskAction::execute($course, $task);
    }

    public function complete(Request $request, $course, $task){
        return completeTaskAction::execute($request, $course, $task);
    }
}
