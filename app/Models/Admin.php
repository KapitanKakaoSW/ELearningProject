<?php
declare(strict_types=1);

namespace App\Models;

class Admin extends User {
    public string $Role;
    public function setDefaultRole() {
        $this->Role = 'admin';
    }
    public function manageUsers() {

    }
}
