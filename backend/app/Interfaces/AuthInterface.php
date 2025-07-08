<?php

namespace App\Interfaces;

use App\Models\User;

interface AuthInterface
{
    public function isLoggedIn(array $credentials): bool;

    public function signUp(array $credentials): User;
}