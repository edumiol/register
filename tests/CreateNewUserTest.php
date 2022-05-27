<?php

use App\CreateNewUser;
use App\InMemoryUserRepository;
use App\NewUserData;
use App\User;
use PHPUnit\Framework\TestCase;

class CreateNewUserTest extends TestCase
{

    private InMemoryUserRepository $repository;

    /**
     * @before
     */
    public function setupUserRepository(): void
    {
        $this->repository = new InMemoryUserRepository();
    }

    public function testShouldCreateNewUser(): void
    {
        foreach ($this->getUsers() as $user) {
            $data = $this->getUserData($user['code'], $user['username'], $user['email']);
            $this->save($data);
        }

        $user = $this->getUser($code = 'emiranda.dev@gmail.com');
        $excepted = 'edumiol';

        $this->assertEquals($excepted, $user->username);
    }

    private function save(NewUserData $data): void
    {
        (new CreateNewUser($this->repository, $data))->execute();
    }

    private function getUser(string $code): User
    {
        return $this->repository->get($code);
    }

    private function getUserData(string $code, string $username, string $email): NewUserData
    {
        return new NewUserData($code, $username, $email);
    }

    /**
     * @return array<array{code:string, username:string, email:string}>
     */
    private function getUsers(): iterable
    {
        yield [
            'code' => 'emiranda.dev@gmail.com',
            'username' => 'edumiol',
            'email' => 'emiranda.dev@gmail.com'
        ];

        yield [
            'code' => 'joao@objective.com.br',
            'username' => 'jao',
            'email' => 'joao@gmail.com'
        ];
    }

}
