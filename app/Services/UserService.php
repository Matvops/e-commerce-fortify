<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class UserService {

    public static function getUser() {
        try {
            return User::where('id', Auth::id())->firstOrFail();
        } catch(ModelNotFoundException ) {
            throw new NotFoundResourceException('Usuário não encontrado');
        }
    }
}