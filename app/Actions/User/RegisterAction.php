<?php

namespace App\Actions\User;

use App\Exceptions\ApiException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterAction {

    public static function execute($request) {

        $user = User::create($request->validated());
        throw_if(!$user, new ApiException(503, "Something went wrong"));
        return [
            'data' => [
                'message' => 'User created successfully'
            ]
        ];
    }

}
