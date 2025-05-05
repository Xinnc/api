<?php

namespace App\Actions\Task;

use App\Models\Course;
use App\Models\Solution;
use App\Models\Task;
use App\Models\User;

class GetTaskAction {

    public static function execute($request, $course) {

        $tasks = Task::where('course_id', $course)->get();

        if (count($tasks) == 0) {
            return [
                'data' => [
                    'message' => 'There are no tasks yet',
                ]
            ];
        }

        foreach($tasks as $task) {
            if(!Solution::where(['task_id' => $task->id, 'user_id' => $request->user->id])->first()) $solution = false;
            else $solution = true;
            $list[] = array(
                'name' => $task->name,
                'description' => $task->description,
                'start date' => $task->start_date,
                'end date' => $task->end_date,
                'done' => $solution,
            );
        }

        return [
            'data' => $list,
        ];

    }

}
