<?php
session_start();
/*Check for SESSION*/
if(isset($_SESSION['user'])){
     header("location:mainPage.php");
     exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log In Page</title>
        <meta charset="UTF-8">
        <style>input{margin-bottom:5px; padding:5px; width:250px;}</style>
    </head>
    <body style="text-align:center; padding-top:100px; width:600px; margin:20px auto;background-color:#efefef;">
        <h1>Log In Staff Page</h1>
        
        <div style="background-color:white; border:1px solid #CCC; padding-top:10px; margin:20px auto; text-align:center; width: 600px;">
            
            <form action="login.php" method="POST" style="padding-top: 10px;">
                
                <p><input type="text" name="btngan" placeholder="username"></p>  
                <p><input type="password" name="pass" placeholder="password"></p>
                <input type="submit" name="sub" value="Login" style="border:1px solid #808080;padding:10px; font-size:15px; width:100px;color:white; background-color:#312b2b;"><br>
                <hr><br>
                <button name="newAccButton">Create New Account</button>
                
            </form><br>
            
        </div>
    </body>
</html>
