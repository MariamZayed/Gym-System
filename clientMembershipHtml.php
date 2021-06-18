<?php
include_once ('dbConnect.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Membership Type</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="clientMembership.php" method="POST" style="text-align: center; padding-top:90px;">
  
            <p style="display: inline">Select Client ID Number</p> 
            <select name="selectClient">
                                                           <!--this php code to select the client with its id-->
                                                           <?php 
                                                                //open the db connection
                                                                 include_once ('dbConnect.php');
                                                                $sql = "SELECT id, name FROM client";
                                                                $result = mysqli_query($link, $sql);
                                                                $resultCheck = mysqli_num_rows($result);echo'<br>';
                                                                
                                                                if ($resultCheck < 0){
                                                                    echo'error from clientMembershipHtml.php select client id query';
                                                                }else{
                                                                    while($row = mysqli_fetch_assoc($result)){
//                                                                       foreach($row as $value){
                                                                         echo'<option>'."id: ".$row["id"]." ".$row["name"].'</option>';
//                                                                    }
                                                                }
                                                                }
                                                                ?>
            </select>
            
            <br><br><br>
            <p style="display: inline">Select Membership Type</p> 
            <select name="selectMembership">
                                                                    <!--this php code to select membership type-->
                                                                <?php
                                                                    $membershipTypeSql = "SELECT * FROM membership_types";
                                                                    $result = mysqli_query($link, $membershipTypeSql);
                                                                    $resultCheck = mysqli_num_rows($result);
                                                                
                                                                if ($resultCheck < 0){
                                                                    echo'error from clientMembershipHtml.php select membership type query';
                                                                }else{
                                                                    while($row = mysqli_fetch_assoc($result)){
                                                                        echo'<option>'.$row['membership_Type'].'</option>';
                                                                        
                                                                    }
                                                                }
                                                                ?>
            </select>
            
            <br><br><br>
            <p style="display: inline">Receptionist ID Number</p> 
            <select name="selectReceptionist">
                                                            <!--this php code to select the receptionisr id-->
                                                            <?php
                                                            echo'<option>'.$_SESSION['user'].'</option>';      
                                                            ?>  
            </select>
            
            <br><br><br>
            <input type="submit"   name="subMembership"  value="Confirm">
        </form><br>
        <p style="text-align: center;"><a href="mainPage.php">Main Page</a></p>
    </body>