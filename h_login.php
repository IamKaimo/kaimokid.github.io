<?php

                    require 'connect.php';
                    session_start();

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $logID = strtolower(test_input($_POST["logID"]));
                    $password = test_input($_POST["password"]);
                    }

                    
                    $chk = "/@/";
                    $valid = preg_match($chk,$logID);
                    if ($valid == TRUE) $sql ="SELECT password, f_name, l_name, username FROM users WHERE email='$logID'";
                    else        $sql ="SELECT password, f_name, l_name, username FROM users WHERE username='$logID'";

                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) == 0) die("Email/Username Not Found!");


                    $row = mysqli_fetch_assoc($result);
                    $username =$row['username'];
                    $realpass = $row['password'];
                    $realname = $row['f_name']." ".$row['l_name'];

                    if ($realpass==$password)
                    {
                    
                    $_SESSION['username'] = $username;
                    $_SESSION['realname'] = $realname;
                    header("Location: index.php");
                    }
                    else die ("Wrong Password");

                    function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                    }

                    $conn->close();

?>
        