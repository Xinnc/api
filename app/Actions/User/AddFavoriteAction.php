<?php

namespace App\Actions\User;

use App\Exceptions\ApiException;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddFavoriteAction {

    public static function execute($request) {
        if(Favorite::where(['user_id' => $request->user->id, 'course_id' => $request->course_id])->first()) {
            return [
                'data' => [
                    'message' => 'You already added this course'
                ]
            ];
        }
        Favorite::create([
            'user_id' => $request->user->id,
            'course_id' => $request->course_id,
        ]);

        return [
            'data' => [
                'message' => 'Added to favorite list'
            ]
        ];
    }

}
