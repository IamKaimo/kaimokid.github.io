<?php

                    $server = "localhost";
                    $user = "root";
                    $pass = "";
                    $dbname = "silvaro";
    
                    $conn = new mysqli($server, $user, $pass ,$dbname);

                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);}

                    $f_name = $l_name = $email = $password = $phone_num = "";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $f_name = test_input($_POST["f_name"]);
                    $l_name = test_input($_POST["l_name"]);
                    $email = test_input($_POST["email"]);
                    $password = test_input($_POST["password"]);
                    $phone_num = test_input($_POST["phone_num"]);
                    }
                
                    $sql = "INSERT INTO users(f_name,l_name,password,phone_num,email)
                    VALUES('$f_name','$l_name','$password','$phone_num','$email')";
                    $conn->query($sql);


                    $username = $f_name.$conn->insert_id;
                    $sql = "UPDATE users SET username='$username' WHERE id=$conn->insert_id";
                    $conn->query($sql);


                    function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                    }

                    $conn->close();

?>
        