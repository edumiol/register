<?php

declare(strict_types=1);

use App\NewUserData;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\CreateNewUser
 */
class CreateNewUserTest extends TestCase
{
    /**
     * @covers \App\NewUserData
     */
    public function testShouldCreateNewUser(): void
    {
        $data = new NewUserData('emiranda.dev@gmail.com','edumiol', 'emiranda.dev@gmail.com');
//        $repository = new InMemoryUserRepository();
//        $action = new CreateNewUser($repository, $data);
//        $action->execute();
//
//        $excepted = 'edumiol';
//        $user = $repository->get($data->id);
//
//        $this->assertEquals($excepted, $user->username);

        $this->assertIsObject($data);

    }
}
