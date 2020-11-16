<?php

                    $server = "localhost";
                    $user = "root";
                    $pass = "";
                    $dbname = "silvaro";
    
                    $conn = new mysqli($server, $user, $pass ,$dbname);

                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);}


                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $logID = strtolower(test_input($_POST["logID"]));
                    $password = test_input($_POST["password"]);
                    }

                    
                    $chk = "/@/";
                    $valid = preg_match($chk,$logID);
                    if ($valid == TRUE) $sql ="SELECT password, f_name, l_name FROM users WHERE email='$logID'";
                    else        $sql ="SELECT password, f_name, l_name FROM users WHERE username='$logID'";

                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) == 0) die("Email/Username Not Found!");


                    $row = mysqli_fetch_assoc($result);
                    $realpass = $row['password'];
                    $realname = $row['f_name']." ".$row['l_name'];

                    if ($realpass==$password) echo "Welcome $realname";
                    else die ("Wrong Password");

                    function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                    }

                    $conn->close();

?>
        