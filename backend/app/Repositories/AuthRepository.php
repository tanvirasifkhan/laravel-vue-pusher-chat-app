<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use Illuminate\Database\Eloquent\Collection;
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
     * List of users except authenticated user
     * 
     * @return \Illuminate\Database\Eloquent\Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return User::where('id', '!=', auth()->id())->orderBy('id', 'DESC')->get();
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