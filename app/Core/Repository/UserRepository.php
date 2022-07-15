<?php

namespace App\Core\Repository;

interface UserRepository extends Repository
{
    public function appendComments($comments);    
}