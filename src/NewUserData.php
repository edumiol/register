<?php

class NewUserData
{
    public function __construct(
        public readonly string $id,
        public readonly string $username,
        public readonly string $email,
    ) {
    }
}
