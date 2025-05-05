<?php

namespace App\Actions\Course;

use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\User;

class UpdateCourseAction {

    public static function execute($request, $course_id) {

        $course = Course::where('id', $course_id)->update($request->validated());
        throw_if(!$course, new ApiException(404, 'Course not found'));

        return [
            'data' => [
                'message' => 'Course updated successfully'
            ],
        ];

    }

}
