<?php

namespace App\Actions\Course;

use App\Models\Course;
use App\Models\User;

class GetCourseAction {

    public static function execute($request) {

        $courses = Course::all();

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
