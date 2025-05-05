<?php

namespace App\Actions\Task;

use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\Task;
use App\Models\User;

class UpdateTaskAction {

    public static function execute($request, $course, $task) {

        $task = Task::where(['course_id' => $course, 'id' => $task])->update($request->validated());
        throw_if(!$task, new ApiException(404, 'Task or course not found'));

        return [
            'data' => [
                'message' => 'Course updated successfully'
            ],
        ];

    }

}
