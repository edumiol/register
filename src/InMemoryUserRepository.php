<?php

namespace App;
use App\Contracts\UserRepository;
use APP\User;

class InMemoryUserRepository implements UserRepository
{
    public function __construct(User ...$users)
    {
        foreach ($users as $user) {
            $this->save($user);
        }
    }

    public function save(User $user): void
    {
        $this->users[$user->id] = $user;
    }

    public function get(string $id): User
    {
        return $this->users[$id];
    }
}
