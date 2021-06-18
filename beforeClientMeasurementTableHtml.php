<?php
session_start();
 include_once('dbConnect.php');
?>
<!--هيختار الكلينت الي الكلينت الي عايز يبين جدوله-->
<!DOCTYPE html>
<html lang="en">
    <head></head>
    <body>
        <form action="clientMeasurementTable.php" method="POST" >
            <select name="selectClient">
                                                           <!--this php code to select the client with its id-->
                                                           <?php 
                                                                //open the db connection
                                                                 include_once ('dbConnect.php');
                                                                $sql = "SELECT id, name FROM client";
                                                                $result = mysqli_query($link, $sql);
                                                                $resultCheck = mysqli_num_rows($result);echo'<br>';
                                                                echo $resultCheck;
                                                                if ($resultCheck < 0){
                                                                    echo'sql error from beforeClientMeasurementTableHtml.php select query';
                                                                }else{
                                                                    while($row = mysqli_fetch_assoc($result)){
//                                                                       foreach($row as $value){
                                                                         echo'<option>'."id: ".$row["id"]." ".$row["name"].'</option>';
//                                                                    }
                                                                }
                                                                }
                                                                ?>
            </select>
            <input type="submit" name="subClient" value="Show Table">
        </form>
        
         <br><br>
         <p style="display: inline;">Register New Client <a href="registerClientHtml.php">here</a></p><br>
         <p style="display: inline">Or Go To </p> <a href="mainPage.php">Main Page</a><br>
    </body>
</html>