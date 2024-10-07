<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller {

    public function makeAdmin($id) {

        $user = User::findOrFail($id);
        if ($user) {
            $user->role = 'admin';
            $user->save();
            return redirect()->back()->with('success', 'Права администратора назначены!');
        }
        return redirect()->back()->with('error', 'Пользователь не найден.');
    }
}
