<?php

namespace App\Actions\Task;

use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\Task;

class CreateTaskAction {

    public static function execute($request, $course) {
        throw_if(!Course::where('id', $course)->first(), new ApiException(404, "Course not found"));
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $course,
            'start_date' => date( 'Y-m-d', strtotime($request->start_date)),
            'end_date' => date('Y-m-d', strtotime($request->end_date)),
        ]);

        return [
            'data' => [
                'message' => 'Task created successfully'
            ]
        ];

    }

}
