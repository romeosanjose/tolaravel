<?php

namespace App\Core\Repository;

use App\Core\Entity\User;

class UserRepoEloquent implements UserRepository
{
    public function find($id)
    {
        return User::where('id',$id)
            ->get();
    }

    public function appendComments($comments)
    {
        
    }
}