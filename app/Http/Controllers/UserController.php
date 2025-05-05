<?php

namespace App\Http\Controllers;

use App\Actions\User\AddFavoriteAction;
use App\Actions\User\DeleteFavoriteAction;
use App\Actions\User\GetFavoriteAction;
use App\Actions\User\LoginAction;
use App\Actions\User\LogoutAction;
use App\Actions\User\RegisterAction;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        return RegisterAction::execute($request);
    }

    public function login(Request $request){
        return LoginAction::execute($request);
    }

    public function logout(Request $request){
        return LogoutAction::execute($request);
    }

    public function index(Request $request){
        return GetFavoriteAction::execute($request);
    }

    public function store(Request $request){
        return AddFavoriteAction::execute($request);
    }

    public function destroy($id){
        return DeleteFavoriteAction::execute($id);
    }
}
