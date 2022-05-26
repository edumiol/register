<?php

namespace App;

class User
{
    public function __construct(
        public readonly string $id,
        public string $username,
        public string $email,
    ) {
    }

    public function updateEmail(string $email): void
    {
        $this->email = $email;
    }

    public function updateUsername(string $username): void
    {
        $this->username = $username;
    }
}
