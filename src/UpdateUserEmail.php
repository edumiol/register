<?php

namespace App;

use App\Contracts\Command;
use App\Contracts\UserRepository;

class UpdateUserEmail implements Command
{
    public function __construct(
        private readonly UserRepository $repository,
        private readonly UpdateUserEmailData $data
    ) {
    }

    public function execute(): void
    {
        $user = $this->repository->get($this->data->id);
        $user->updateEmail($this->data->email);
        $this->repository->save($user);
    }
}
