<?php

declare(strict_types=1);

use App\CreateNewUser;
use App\InMemoryUserRepository;
use App\NewUserData;
use App\UpdateUserEmail;
use App\UpdateUserEmailData;
use App\User;
use PHPUnit\Framework\TestCase;

class UpdateUserEmailTest extends TestCase
{

    private InMemoryUserRepository $repository;

    /**
     * @before
     */
    public function setupUserRepository(): void
    {
        $this->repository = new InMemoryUserRepository();
    }

    /**
     * @covers \App\UpdateUserEmail::execute
     * @uses \App\UpdateUserEmailData
     */
    public function testShouldUpdateUserEmail(): void
    {
        $data = $this->getUserData($code='joao@objective.com.br', $username='jao', $email='joao@gmail.com');
        $this->save($data);

        $data = new UpdateUserEmailData($code, $email='jamil@objective.com.br');
        (new UpdateUserEmail($this->repository, $data))->execute();

        $user = $this->getUser($code);

        $this->assertEquals($email, $user->email);
    }

    /**
     * @param string $code
     * @param string $username
     * @param string $email
     * @return NewUserData
     */
    private function getUserData(string $code, string $username, string $email): NewUserData
    {
        return new NewUserData($code, $username, $email);
    }

    /**
     * @param NewUserData $data
     * @return void
     */
    private function save(NewUserData $data): void
    {
        (new CreateNewUser($this->repository, $data))->execute();
    }

    /**
     * @param string $code
     * @return User
     */
    private function getUser(string $code): User
    {
        return $this->repository->get($code);
    }
}