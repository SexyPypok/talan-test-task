<?php

namespace App\Http\Controllers;

use App\Facades\UserRepositoryFacade;
use App\Http\Requests\AddUserRequest;

class UserController extends Controller
{
    public function getUsers(string $source)
    {
        $userRepositoryFacade = new UserRepositoryFacade($source);

        return $userRepositoryFacade->getUsers();
    }

    public function addUser(AddUserRequest $request, string $source)
    {
        $userRepositoryFacade = new UserRepositoryFacade($source);

        return $userRepositoryFacade->addUser($request->name, $request->email, $request->phone);
    }
}
