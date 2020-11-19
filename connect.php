<?php

                    $server = "www.db4free.net:3306";
                    $user = "kaimokid@gmail.com";
                    $pass = "Kaimo1412K";
                    $dbname = "silvaro";
    
                    $conn = new mysqli($server, $user, $pass ,$dbname);

                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);}
?>