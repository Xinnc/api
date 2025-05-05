<?php

namespace App\Actions\User;

class LogoutAction {

    public static function execute($request) {
        $request->user->remember_token = null;

        return [
            'data' => [
                'message' => 'Logged out successfully'
            ]
        ];
    }

}
