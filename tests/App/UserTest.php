<?php

namespace App;

use Generator;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @dataProvider createUser
     */
    public function testShouldUpdateEmail(string $id, string $username, string $email): void
    {
        $user = new User($id, $username, $email);
        $user->updateEmail($email = 'eduardo.miranda@objective.com');

        $this->assertSame($user->email, $email, "The e-mail informed not is igual!");
    }

    public static function createUser(): Generator
    {
        yield [
            'id' => 'emiranda.dev@gmail.com',
            'username' => 'edumiol',
            'email' => 'emiranda.dev@gmail.com'
        ];
    }

}
