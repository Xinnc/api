<?php

namespace App\Actions\Course;

use App\Models\Course;

class CreateCourseAction {

    public static function execute($request) {

        Course::create([
            'creator_id' => $request->user->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return [
            'data' => [
                'message' => 'Course created successfully'
            ]
        ];

    }

}
