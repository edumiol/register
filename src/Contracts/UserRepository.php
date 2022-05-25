<?php

namespace App\Contracts;

use APP\User;

interface UserRepository
{
    public function save(User $user);

    public function get(string $id);
}
