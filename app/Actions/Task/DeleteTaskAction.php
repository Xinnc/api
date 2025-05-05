<?php

namespace App\Actions\Task;

use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\Task;
use App\Models\User;

class DeleteTaskAction {

    public static function execute($course, $task) {
        throw_if(!Task::where(['course_id' => $course, 'id' => $task])->first(), new ApiException(404, "Task or course not found"));
        Task::where(['course_id' => $course, 'id' => $task])->delete();
        return [
            'data' => [
                'message' => 'Task deleted successfully'
            ]
        ];
    }

}
