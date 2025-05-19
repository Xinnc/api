<?php

namespace App\Actions\Course;

use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\User;

class GetMyCourseAction {

    public static function execute($user) {

        $courses = Course::where('creator_id', $user)->get();
        throw_if(count($courses) <= 0, new ApiException(404, "Course not found"));
        foreach($courses as $course) {
            $user = User::where('id', $course->creator_id)->first();
            $list[] = array(
                'creator' => $user->first_name . ' ' . $user->last_name,
                'title' => $course->title,
                'description' => $course->description,
            );
        }

        return [
            'data' => $list,
        ];

    }

}
