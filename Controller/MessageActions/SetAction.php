<?php

namespace Controller\MessageActions;

include_once '../../Autoload.php';
session_start();

use Connections\Connection;
use Model\Message;

class SetAction
{
    protected $message;
    public function __construct()
    {
        $this->message = new Message();
    }
    public function execute($request)
    {
        $create = $this->message->create($request);
        if ($create) {
            $conn = new  Connection();
            $messages = "SELECT messages.* , messages.id AS m_id , users.* , users.id AS u_id FROM messages JOIN users  ON messages.to_id=users.id   WHERE messages.to_id = '" . $_SESSION['loggedIn']['id'] . "'  ";
            $results = mysqli_fetch_all($conn->DB()->query($messages), MYSQLI_ASSOC);
            $_SESSION['messages'] = $results;
            header('Location:../View/Messages/messages.php');
        }
        return $create;
    }
}
