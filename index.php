<?php


use App\CreateNewUser;
use App\InMemoryUserRepository;
use App\NewUserData;
use App\UpdateUserEmail;
use App\UpdateUserEmailData;

require_once "bootstrap.php";

$repository = new InMemoryUserRepository();

$data = new NewUserData('jack@objective.com.br', 'jackmakiyama', 'jack@objective.com.br');
$action = new CreateNewUser($repository, $data);
$action->execute();

$data = new NewUserData('leo@objective.com.br', 'leo', 'leo@objective.com.br');
$action = new CreateNewUser($repository, $data);
$action->execute();

$data = new NewUserData('luiz@objective.com.br', 'luiz', 'luiz@objective.com.br');
$action = new CreateNewUser($repository, $data);
$action->execute();

$data = new NewUserData('carlos@objective.com.br', 'carlos', 'carlos@objective.com.br');
$action = new CreateNewUser($repository, $data);
$action->execute();

$data = new UpdateUserEmailData('jack@objective.com.br', 'jackmakiyama@objective.com.br');
$action = new UpdateUserEmail($repository, $data);
$action->execute();

echo "<pre>";
var_dump($repository);
echo "</pre>";
