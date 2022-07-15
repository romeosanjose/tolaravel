<?php

namespace App\Http\Controllers;

use App\Core\Entity\User;
use App\Core\Repository\UserRepoEloquent;
use App\Core\UseCase\UserUseCase;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $userUseCase = new UserUseCase(new UserRepoEloquent());
        $userObject =  $userUseCase->getRecord($id);
       
        return view('users.index', ['user' => $userObject]);
    }
}
