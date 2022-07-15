<?php

namespace App\Core\Repository;

use App\Core\Entity\User;

class UserRepoEloquent implements UserRepository
{
    public function find($id)
    {
        return User::where('id',$id)
            ->get()
            ->first();
    }

    public function appendComments($id, $comments)
    {
        $user = User::find($id);
        $user->comments = $comments;
        
        return $user->save();

        
            // ->update(['comments' => $comments]);
    }
}