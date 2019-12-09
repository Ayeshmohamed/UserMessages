<?php

namespace Connections;

class Connection
{
    protected $servername;
    protected $username;
    protected $password;
    protected $db;
    function __construct()
    {
        $this->servername = "localhost";
        $this->username = "YOUR_USERNAME";
        $this->password = "YOUR_Password";
        $this->db = "Guestbook";
    }
    public  function DB()
    {
        $conn =  mysqli_connect($this->servername, $this->username, $this->password, $this->db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}
