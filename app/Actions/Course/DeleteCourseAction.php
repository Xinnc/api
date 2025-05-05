<?php

namespace App\Actions\Course;

use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\User;

class DeleteCourseAction {

    public static function execute($request_id) {
        throw_if(!Course::where('id', $request_id)->first(), new ApiException(404, "Course not found"));
        Course::where('id', $request_id)->delete();
        return [
            'data' => [
                'message' => 'Course deleted successfully'
            ]
        ];
    }

}
