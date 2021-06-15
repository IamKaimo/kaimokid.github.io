<?php
session_start();
if(isset($_SESSION['username']))header("location: index.php");
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Silvaro | Hello!</title>
        <link rel="stylesheet" href="hello.css">
        <link rel="icon" href="logo.png">
    </head>
    
  
    <body>

        
            
            <div class ="fulllogo">
                <img src="logo.png">
                <div class="logotxt" >
                    <p id="logo">Silvaro</p>
                    <p>Welcome to your mini-world!</p>
                    <p>simple social platform.</p>
                </div>
            </div>
                       
                <div class="fullbox">
            
                    <div id="switchbar">
                        <div style="border-right: darkblue 1px solid;"><p id="slogin">Login</p></div><div><p id="sreg">Register</p></div>
                    </div>

                   <div>

                        <div>
                        <p id="errMsg" style ="height: 12px; text-align:center; color:red; <?php echo (isset($_SESSION['page'])||isset($_SESSION['page2']))? "color:red;":"color:green;"; ?> font-family:monospace; font-weight:bolder;">
                           <?php if(isset($_SESSION['error']))echo $_SESSION['error']; unset($_SESSION['error']); unset($_SESSION['page2']); ?>
                        </p>        
                        </div>


                    <form id="login" method="POST" action="h_login.php">           
                        <p>Email/Username:</p>  <input  type="text" placeholder="Enter Email or User" name="logID">
                        <p>Password:</p>    <input  type="password" placeholder="Enter Password" name="password">
                        <input class="next" type="submit" value="Login">  
                    </form>
                    
                    <form id="register" method="POST" action="h_register.php" style="display: none;" >
                        <p>Full Name:</p>
                        <div style="float: right; margin: 15px 0; height: 20px; padding: 0; width: 50%;">
                        <input type="text" name="f_name"  onblur="checker(this.value,this.name)" placeholder="Firstname" style="width: 50%;"><input type="text" name="l_name" onblur="checker(this.value,this.name)" placeholder="Lastname" style="width: 50%;"></div>
                        <p>Email address:</p><input  type="email"  onblur="checker(this.value,this.name)" name="email" placeholder="Enter Email">
                        <p>Password:</p><input  type="password"  onblur="checker(this.value,this.name)" name="password" placeholder="Enter Password">
                        <p>RE-Enter Password:</p><input type="password"  name="password2" placeholder="Re-Enter Password">
                        <p>Phone Number:</p><input type="text" name="phone_num" onblur="checker(this.value,this.name)" placeholder="Enter Mobile Number">
                        <p>Date of Birth:</p><input  type="date">
                        <input class="next" type="submit" value="Register">  
                    </form>
                    </div>
                </div>

                

              


        
        <script type="text/javascript" src="jquery.js"></script>
        <script>

        startAtLog();
        <?php if(isset($_SESSION['page'])) {unset($_SESSION['page']); echo "startAtReg();"; }?>

        $(function() {
                 
        $("#slogin,#sreg").hover(function(event) {
        $(this).css("color","blue");},function(event) {
         $(this).css("color","royalblue"); 
        });

        $("input").hover(function(event) {
        $(this).css("border","2px solid blue");},function(event) {
         $(this).css("border","1px solid royalblue"); 
        });

        $("input").focus(function(event) {
        $(this).css("background-color","whitesmoke");
        });
     
        $("input").blur(function(){
         $(this).css("background-color", "white");
        });

        $("#slogin").click(function(event) {
        $("#register").css("display","none");
        $("#login").css("display","block");
        document.getElementById("errMsg").innerHTML = "</br>";
        });
                 
        $("#sreg").click(function(event) {
        $("#register").css("display","block");
        $("#login").css("display","none");
        $("#errMsg").css("color","red");
        document.getElementById("errMsg").innerHTML = "</br>";
        });      
        });

        function startAtLog() {
            var x = document.getElementById("register");
            x.style.display = "none";
            var y = document.getElementById("login");
            y.style.display = "block";
        }



        function startAtReg() {
            var x = document.getElementById("register");
            x.style.display = "block";
            var y = document.getElementById("login");
            y.style.display = "none";
        }
        

        function checker(str,type) {
    
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("errMsg").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", "h_register.php?q=" + str+"&t="+type, true);
            xmlhttp.send();
        }
    
        </script>
        
    </body>  
</html>
            