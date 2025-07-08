<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface AuthInterface
{
    public function isLoggedIn(array $credentials): bool;

    public function getUsers(): Collection;

    public function signUp(array $credentials): User;
}