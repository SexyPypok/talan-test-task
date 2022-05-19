<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepositoryDb implements UserRepositoryInterface
{
    public function getUsers()
    {
        $users = User::get();
        $usersArray = [];
        foreach ($users as $user) {
            $usersArray[] = [
                'name' => $user['name'],
                'phone' => $user['phone'],
                'email' => $user['email'],
            ];
        }

        return json_encode($usersArray);
    }

    public function addUser($name, $email, $phone)
    {
        User::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ]);

        return 'name: ' . $name . ', email: ' . $email . ', phone: ' . $phone;
    }
}