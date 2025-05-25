<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class UserService {

    public static function getUser() {
        return User::where('id', Auth::id())
            ->firstOrFail(function() {
                throw new NotFoundResourceException('Usuário não encontrado.');
            });
    }
}