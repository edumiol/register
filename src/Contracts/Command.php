<?php

namespace App\Contracts;

interface Command
{
    public function execute(): void;
}
