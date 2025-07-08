<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthRepository implements AuthInterface
{
    /**
     * Log the user into the system
     * 
     * @param array $credentials
     * @return bool
     */
    public function isLoggedIn(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    /**
     * sign the user up for the system
     * 
     * @param array $credentials
     * @return \App\Models\User
     */
    public function signUp(array $credentials): User
    {
        return User::create([
            "name"=> $credentials["name"],
            "email"=> $credentials["email"],
            "password"=> bcrypt($credentials["password"])
        ]);
    }
}