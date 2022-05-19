<?php

namespace App\Facades;

class UserRepositoryFacade
{
    private $source;

    public function __construct(string $source)
    {
        $sourcePath = 'App\\Repositories\\UserRepository' . ucfirst($source);
        $this->source = new $sourcePath();
    }
    public function addUser(string $name, string $email, string $phone) {
        return $this->source->addUser($name, $email, $phone);
    }
    public function getUsers() {
        return $this->source->getUsers();
    }
}