<?php
namespace App;

class UpdateUserEmailData
{
    public function __construct(
        public readonly string $id,
        public readonly string $email
    ) {
    }
}
