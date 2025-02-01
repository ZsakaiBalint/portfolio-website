<?php

require_once 'Controller.php';

class AuthController extends Controller {

    public function login() {
        // Logic for login page
        $this->view('login');  // This will include "views/login.php"
    }

    public function registration() {
        // Logic for registration page
        $this->view('registration');  // This will include "views/registration.php"
    }
    
}
?>
