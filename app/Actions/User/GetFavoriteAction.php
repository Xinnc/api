<?php

namespace App\Actions\User;

use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GetFavoriteAction {

    public static function execute($request) {
        $favorite = Favorite::all();
        foreach ($favorite as $fav) {
            $course = Course::where('id', $fav->course_id)->first();
            $user = User::where('id', $course->creator_id)->first();
            $list[] = array(
                'creator' => $user->first_name . ' ' . $user->last_name,
                'title' => $course->title,
                'description' => $course->description,
            );
        }

        if (count($favorite) == 0) {
            return [
                'data' => [
                    'message' => 'You haven\'t favorite courses',
                ]
            ];
        }
        return [
            'data' => $list,
        ];
    }

}
