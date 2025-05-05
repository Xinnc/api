<?php

namespace App\Actions\Course;

use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\User;

class GetOneCourseAction {

    public static function execute($course) {

        $course = Course::where('id', $course)->first();

        throw_if(!$course, new ApiException(404, "Course not found"));

        $user = User::where('id', $course->creator_id)->first();
        return [
            'data' => [
                'creator' => $user->first_name . ' ' . $user->last_name,
                'title' => $course->title,
                'description' => $course->description,
            ],
        ];

    }

}
