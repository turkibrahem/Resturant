<?php

namespace App\Http\Services;

use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class AuthService
{

    public function attempt(Request $request)
    {
        return auth()->attempt(
            ['email' => $request->request->get('email'), 'password' => $request->request->get('password')]
        );
    }

    public function registerFromRequest(Request $request, $user = null)
    {
        if (!$user) {
            $user = new User();
            $user->phone_verify = code($numbers = 4, $type = 'digits');
        }

        $user->fill($request->request->all());
        $user->password = $request->input("password");
        $user->active = 1;
        $user->name = $user->first_name . ' ' . $user->last_name;
        $user->save();
        return $user;
    }
}
