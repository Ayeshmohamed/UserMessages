<?php

namespace Validations;

include_once '../Autoload.php';

use Connections\Connection;

class Validation
{
    public function validate($request)
    {
        if ($request['email']) {
            if (filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
                $conn = new Connection();
                $contect = $conn->DB();
                $sql = 'SELECT * FROM users WHERE  email =  "' . $request['email'] . '" ';
               
                if (mysqli_fetch_array($contect->query($sql))) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }
    }
}
