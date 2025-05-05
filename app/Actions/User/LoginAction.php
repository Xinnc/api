<?php

namespace App\Actions\User;

use App\Exceptions\ApiException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginAction {

    public static function execute($request) {
        $user = User::where('email', $request->email)->first();
        throw_if(!$user || Hash::check($request->user, $user->password), new ApiException(422, "Wrong email or password"));

//        $token = $user->createToken('UserToken')->plainTextToken;
        $user->remember_token = Str::random(60);
        $user->save();
        return [
            'data' => [
                'token' => $user->remember_token,
            ]
        ];
    }

}
