<?php
include_once ('dbConnect.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register Instructor Page</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h4>Register Instructor </h4>
        <form action="registerInstructor.php" method="POST">
            <input type="text"     name="name" placeholder="Full Name"> <br><br>
            <input type="text" name="mobile" placeholder="Phone Number"><br><br>
            <input type="text" name="address" placeholder="address" ><br><br>
            
             <p style="display: inline">Manager ID Number</p> 
            <select name="selectManager">
                                                                          <!--this php code to select the manager id-->
                                                                        <?php
                                                                             $sql = "SELECT id FROM manager";
                                                                            $result = mysqli_query($link, $sql);
                                                                            $resultCheck = mysqli_num_rows($result);
                                                                       
                                                                            if ($resultCheck < 0){
                                                                                echo'error from registerInstructorHtml.php select receptioist query';
                                                                            }else{
                                                                            while($row = mysqli_fetch_assoc($result))
                                                                             foreach($row as $value){
                                                                                     echo'<option value="'.$value.'">'.$value.'</option>';
                                                                    }
                                                                }
                                                                        ?>
            </select>
             
            <br><br>
            <input type="submit"   name="subRegisterInstructor"  value="Register Instructor"><br><br>
        </form>
        
        <p style="display: inline"><a href="viewInstructorsHtml.php">Show All Registered Instructors </a></p> <br>
        <p style="display: inline;"><a href="mainPage.php">Go To The Main Page</a></p><br>
        
        
    </body>
</html>
