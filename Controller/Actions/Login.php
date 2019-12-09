<?php

namespace Controller\Actions;

use Connections\Connection;
use Model\User;
use mysqli;

include_once '../../Autoload.php';

class Login
{
    public function execute($request)
    {
        $login = new User();
        $result = $login->login($request);
        if($result){
         $conn= new Connection();
         $connect= $conn->DB();
         
         $id=$_SESSION['loggedIn']['id'];
         $sql="SELECT * FROM users WHERE id != $id ";
         $results=mysqli_fetch_all($connect->query($sql),MYSQLI_ASSOC);
           session_start();
           $_SESSION['users']=$results;      
            header('Location:../View/Users/users.php');
        }
        return $result;
    }
}
