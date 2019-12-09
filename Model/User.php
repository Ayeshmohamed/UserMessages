<?php

namespace Model;

include_once '../Autoload.php';

use Connections\Connection;
use mysqli;

class User
{
    public function create($request)
    {
        try {
            $conn = new Connection();
            $contect = $conn->DB();
            $sql = "INSERT INTO users (name,email,password) 
        VALUES ('" . $request['name'] . "','" . $request['email'] . "','" . $request['password'] . "')";

            if ($created = $contect->query($sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function login($request)
    {
        $conn = new Connection();
        $contect = $conn->DB();
        $sql = 'SELECT * FROM users WHERE  email = "' . $request['email'] . '" ';
        if ($query = $contect->query($sql)) {
            $result = mysqli_fetch_assoc($query);
            if (password_verify($request['password'], $result['password'])) {
                session_start();
                $_SESSION['loggedIn'] = $result;
                return true;
            } else {
                echo "Invalid Password";
                exit;
            }
        } else { }
    }
}
