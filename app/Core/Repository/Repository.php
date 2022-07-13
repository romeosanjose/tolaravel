<?php

namespace App\Core\Repository;

use App\Core\Entity\Entity;

interface Repository
{
    public function find($id);
}