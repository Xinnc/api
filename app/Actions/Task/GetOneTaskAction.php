<?php

namespace App\Actions\Task;

use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\Task;
use App\Models\User;

class GetOneTaskAction {

    public static function execute($course, $task) {

        $task = Task::where(['course_id' => $course, 'id' => $task])->first();

        throw_if(!$task, new ApiException(404, "Course or task not found"));
        $course = Course::where('id', $course)->first();
        $user = User::where('id', $course->creator_id)->first();
        return [
            'data' => [
                'name' => $task->name,
                'description' => $task->description,
                'start_date' => $task->start_date,
                'end_date' => $task->end_date,
                'course' => [
                    'creator' => $user->first_name . ' ' . $user->last_name,
                    'title' => $course->title,
                    'description' => $course->description,
                ]
            ],
        ];

    }

}
