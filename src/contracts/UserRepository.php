<?php

interface UserRepository
{
    public function save(User $user);

    public function get(string $id);
}
