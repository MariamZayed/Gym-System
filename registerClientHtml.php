<?php
session_start();
include_once ('dbConnect.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register Client Page</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h4>Register Client</h4>
        <form action="registerClient.php" method="POST">
            <input type="text"     name="username" placeholder="Full Name"> <br><br>
            <input type="text" name="mobile" placeholder="Phone Number"><br><br>
            <input type="text" name="age" placeholder="Age"><br><br>
            <input type="text" name="height" placeholder="Height"><br><br>
            <p style="display: inline">Receptionist ID Number</p> 
            <select name="selectReceptionist">
                <!--this php code to select the receptionisr id-->
                <?php
                echo'<option>'.$_SESSION['user'].'</option>';      
                ?>  
            </select>
            
            <br><br>
            <input type="submit"   name="subRegisterClient"  value="Register Client"><br><br>
        </form>
         <p style="display: inline">Show All Registered Clients <a href="viewClientsHtml.php">here</a></p> <br>
         <p style="display: inline">Choose Client To Show His Measurement Table <a href="beforeClientMeasurementTableHtml.php">here</a></p><br>
         <p style="display: inline;">Record New Measurements <a href="ZindexHtml.php">here</a></p><br>
         <p style="display: inline;">Or Go To <a href="mainPage.php">Main Page</a></p><br>
         
    </body>
</html>
