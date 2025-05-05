<?php

namespace App\Actions\User;

use App\Exceptions\ApiException;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DeleteFavoriteAction {

    public static function execute($id) {

        throw_if(!Favorite::where('id', $id)->first(), new ApiException(404, 'Not Found'));
        Favorite::where('id',  $id)->delete();

        return [
            'data' => [
                'message' => 'Deleted from favorite list'
            ]
        ];
    }

}
