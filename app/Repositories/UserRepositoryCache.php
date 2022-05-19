<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Redis;

class UserRepositoryCache implements UserRepositoryInterface
{
    public function getUsers()
    {
        $keys = Redis::keys('*');
        $values = [];

        foreach ($keys as $key) {
            $redisValues = json_decode(Redis::get($key), true);
            $values[] = [
                'name' => $key,
                'phone' => $redisValues['phone'],
                'email' => $redisValues['email'],
            ];
        }

        return json_encode($values);
    }
    public function addUser($name, $email, $phone)
    {
        $key = $name;
        $value = json_encode(['email' => $email, 'phone' => $phone]);
        Redis::set($key, $value);

        return 'name: ' . $name . ', email: ' . $email . ', phone: ' . $phone;
    }
}