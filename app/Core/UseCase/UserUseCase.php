<?php

namespace App\Core\UseCase;

use App\Core\Repository\UserRepository;
use App\Core\Entity\User;

class UserUseCase 
{
    private $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function getRecord($id){
        $data = $this->userRepository->find($id);
        
        $user = new User();
        $user->setId($data['id']);
        $user->setName($data['name']);
        $user->setComments($data['comments']);

        return $user;
    }

    public function appendComments($id, $comments){
        if($comments == null || $comments == "") {
            throw new UserCommentException();
        }
        
        $user = $this->getRecord($id);
        $comments = $user->getComments() . "\n".$comments;
       
        return $this->userRepository->appendComments($id, $comments);
    }

}