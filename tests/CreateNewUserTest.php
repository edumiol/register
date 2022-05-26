<?php

declare(strict_types=1);

use App\CreateNewUser;
use App\InMemoryUserRepository;
use App\NewUserData;
use App\UpdateUserEmail;
use App\UpdateUserEmailData;
use App\User;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\CreateNewUser
 */
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

    /**
     * @covers \App\InMemoryUserRepository::get
     * @uses \App\NewUserData
     * @uses \App\CreateNewUser
     */
    public function testShouldCreateNewUser(): void
    {
        $this->save('emiranda.dev@gmail.com','edumiol', 'emiranda.dev@gmail.com');
        $this->save('joao@objective.com.br', 'jao', 'joao@gmail.com');
        $user = $this->getUser('emiranda.dev@gmail.com');
        $excepted = 'edumiol';

        $this->assertEquals($excepted, $user->username);
    }

    public function testShouldUpdateUserEmail(): void
    {
        $this->testShouldCreateNewUser();
        $data = new UpdateUserEmailData('joao@objective.com.br', 'jamil@objective.com.br');
        $action = new UpdateUserEmail($this->repository, $data);
        $action->execute();

        $expected = 'jamil@objective.com.br';
        $user = $this->getUser('joao@objective.com.br');

        $this->assertEquals($expected, $user->email);
    }

    private function save(string $code, string $username, string $email): void
    {
        $data = new NewUserData($code, $username, $email);
        $action = new CreateNewUser($this->repository, $data);
        $action->execute();
    }

    private function getUser(string $code): User
    {
        return $this->repository->get($code);
    }

}
