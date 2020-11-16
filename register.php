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
                    $email = strtolower(test_input($_POST["email"]));
                    $password = test_input($_POST["password"]);
                    $phone_num = test_input($_POST["phone_num"]);
                    }

                    $name_c = "/^[A-Za-z-']+$/";
                    $pass_c = "/^[A-Za-z0-9]{8,16}$/";
                    $pass_c2 = "/[0-9]+/";
                    $pass_c3 = "/[A-Za-z]+/";
                    $phone_c = "/^[0-9+][0-9]{8,15}$/";
                    $valid = TRUE;

                    
                    

                    $valid = preg_match($name_c,$f_name);
                    if($valid == FALSE)die("Invalid Firstname");
                    $valid = preg_match($name_c,$l_name);
                    if($valid == FALSE)die("Invalid Lastname");
                    $valid = preg_match($pass_c,$password);
                    if($valid == FALSE)die("Invalid Password");
                    $valid = preg_match($pass_c2,$password);
                    if($valid == FALSE)die("Invalid Password");
                    $valid = preg_match($pass_c3,$password);
                    if($valid == FALSE)die("Invalid Password");
                    $valid = preg_match($phone_c,$phone_num);
                    if($valid == FALSE )die("Invalid Phone");





                    $sql = "INSERT INTO users(f_name,l_name,password,phone_num,email)
                    VALUES('$f_name','$l_name','$password','$phone_num','$email')";
                    $conn->query($sql);


                    $username = strtolower($f_name)."_".$conn->insert_id;
                    $sql = "UPDATE users SET username='$username' WHERE id=$conn->insert_id";
                    $conn->query($sql);
                    echo "Registered Successfully!";


                    function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                    }

                    $conn->close();

?>
        