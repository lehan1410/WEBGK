<?php
    function get_connection()
    {
        $conn = new mysqli('db','php_docker','password','user');
        if ($conn->connect_errno) {
            die('Connect failed with message: ' . $conn->connect_error);
        }
        $conn->set_charset("utf8");
        return $conn;
    }
?>