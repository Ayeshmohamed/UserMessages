<?php
include_once '../Autoload.php';

use Controller\Actions\Login;
use Controller\Actions\Register;
try {
    /// Check for Sign Up 
    if ($_POST['signup']) {
        $request = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_ARGON2I)
        ];
        $register = new Register();
        $result = $register->execute($request);
    } else if ($_POST['login']) { /// Check for login  
        $request = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        $login = new Login();
        $result = $login->execute($request);
    }
} catch (\Throwable $th) {
    var_dump($th->getMessage());
    exit;
}

