<?php

namespace App;
use App\Contracts\Command;
use App\Contracts\UserRepository;

class CreateNewUser implements Command
{
    public function __construct(
        private readonly UserRepository $repository,
        private readonly NewUserData $data
    ) {
    }

    public function execute(): void
    {
        $user = new User($this->data->id, $this->data->username, $this->data->email);
        $this->repository->save($user);
    }
}
