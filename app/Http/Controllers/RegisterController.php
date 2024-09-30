<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class RegisterController extends Controller {

    protected function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
        ]);
    }
}


