<?php

namespace App\Core\Entity;

interface Entity
{
    public function getId();

    public function setId($id);

    public function toArray();
}