<?php

namespace Model;

include_once '../Autoload.php';

use Connections\Connection;
use mysqli;

class Message
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }
    public function create($request)
    {

        try {
            $contect = $this->conn->DB();
            $sql = "INSERT INTO messages (from_id,to_id,message,created_at,updated_at) VALUES ('" . $request['from_id'] . "','" . $request['to_id'] . "','" . $request['message'] . "','" . $request['created_at'] . "','" . $request['updated_at'] . " ')";
            if ($contect->query($sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo $th;
            exit;
        }
    }
    public function update($request)
    {
        try {
            $contect = $this->conn->DB();
            $message = $request['message'];
            $updated_at = $request['updated_at'];
            $id = $request['id'];
            $sql = "UPDATE `messages` SET `message` = '$message'  , `updated_at` = '$updated_at'  WHERE id =$id ";
            var_dump($sql);
            if ($contect->query($sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo $th;
            exit;
        }
    }
    public function delete($request)
    {

        try {
            $contect = $this->conn->DB();
            $sql_rep = "DELETE  FROM replies WHERE message_id = '".$request['id']."'";
            $contect->query($sql_rep);
            
            $sql = 'DELETE  FROM messages WHERE id="' . $request['id'] . '" ';
            if ($contect->query($sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo $th;
            exit;
        }
    }
    public function relpy($request)
    {
        try {
            $contect = $this->conn->DB();
            $sql = "INSERT INTO replies (message_id,user_id,reply,created_at,updated_at) VALUES ('" . $request['message_id'] . "','" . $request['user_id'] . "','" . $request['reply'] . "','" . $request['created_at'] . "','" . $request['updated_at'] . " ')";

            if ($contect->query($sql)) {
                $messages = 'SELECT * FROM messages WHERE to_id = "' . $_SESSION['loggedIn']['id'] . '"  ';
                $results = mysqli_fetch_all($messages);
                header('Location:../View/Messages/messages.php?messages=' . $results);
            } else { }
        } catch (\Throwable $th) {
            echo $th;
            exit;
        }
    }
}
