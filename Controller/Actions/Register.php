<?php

namespace Controller\Actions;

use Model\User;
use Validations\Validation;

include_once '../Autoload.php';

class Register
{
    /*
    * params = $request
    *  return session 
    */
    public function execute($request)
    {
        try {
            $validate = new Validation();
            $validated = $validate->validate($request);
            if ($validated) {
                $user = new User();
                $register = $user->create($request);
                if ($register) {
                    return $register;
                    header('Location:../../View/login.php');
                } else {
                    header('Location:../../View/login.php');
                }
            } else {
                echo "Invalid email Address";
            }
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
            exit;
        }
    }
}
