<?php

namespace App\Core\Entity;

class User extends EntityEloquent
{
    private $name;
    private $comments;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getComments(){
        return $this->comments;
    }

    public function setComments($comments){
        $this->comments = $comments;
    }

    function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'comments' => $this->getComments()
        ];
    }
}