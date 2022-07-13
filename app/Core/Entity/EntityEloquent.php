<?php

namespace App\Core\Entity;

use Illuminate\Database\Eloquent\Model;

class EntityEloquent extends Model implements Entity
{
    protected $id;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
}



