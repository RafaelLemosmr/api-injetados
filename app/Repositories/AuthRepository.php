<?php

namespace App\Repositories;

use App\Exceptions\AuthFailedException;
use App\Models\User;
use App\Utils\Util;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function auth($credentials)
    {
        if(Auth::attempt($credentials)){
            $user = User::where('email', $credentials['email'])->first();
            return  $user->createToken('injetadosMobile')->plainTextToken;
        } else {
            throw new AuthFailedException();
        }
    }

    public function createUser($params)
    {
         return User::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'document' => $params['document'],
            'type_document' => $params['type_document'],
            'password' => Util::defaultPassword()
        ]);

    }
}
