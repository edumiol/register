<?php

class User
{
    public function __construct(
        public readonly string $id,
        private string $username,
        private string $email,
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
