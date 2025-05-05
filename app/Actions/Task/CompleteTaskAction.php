<?php

namespace App\Actions\Task;

use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\Solution;
use App\Models\Task;
use App\Models\User;

class CompleteTaskAction {

    public static function execute($request, $course, $task) {

        $task = Task::where(['course_id' => $course, 'id' => $task])->first();
        throw_if(!$task, new ApiException(404, 'Task not found'));
        Solution::create([
            'task_id' => $task->id,
            'user_id' => $request->user->id,
            'solution' => $request->solution,
        ]);
        return [
            'date' => [
                'message' => 'Task has been completed',
            ]
        ];
    }

}
