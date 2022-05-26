<?php

namespace App;

use PHPUnit\Framework\TestCase;

/**
 * @covers \App\User
 */
class UserTest extends TestCase
{
    /**
     * @covers \App\User::updateEmail
     * @dataProvider createUser
     */
    public function testShouldUpdateEmail($id, $username, $email): void
    {
        $user = new User($id, $username, $email);
        $user->updateEmail($email = 'eduardo.miranda@objective.com');

        $this->assertSame($user->email, $email, "The e-mail informed not is igual!");
    }

    /**
     * @return iterable<array<{id:string, username:string, email:string}>>
     */
    public function createUser(): iterable
    {
        yield [
          'id' => 'emiranda.dev@gmail.com',
          'username' => 'edumiol',
          'email' => 'emiranda.dev@gmail.com'
        ];
    }

}
