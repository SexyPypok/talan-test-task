<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getUsers();
    public function addUser(string $name, string $email, string $phone);
}