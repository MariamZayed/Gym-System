<?php
session_start();
include_once ('dbConnect.php');
//seesion
//set data into a DataBase
//direct user to Measurement Table
if(isset($_POST['subRegisterClient'])){
    //Get values
    $name1 = $_POST['username'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $receptionistID = $_POST['selectReceptionist'];
    //Validation
    if($name1 != null && $mobile != null && $age != null && $height != null && $receptionistID != null){
        
        //Inserting the user data into the database
        $sql = "INSERT INTO client (name, mobile, age, height, recepionist_id ) VALUES (?,?,?,?,?)";
        $stmt = mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location:registerClient.php?erorr=sqlerr');
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"sssss",$name1,$mobile,$age,$height,$receptionistID);
            mysqli_stmt_execute($stmt);            
?>
<div style="padding-top: 90px;">
    <p style="text-align: center;">Done!</p>
    <p style="text-align: center;"><a href="clientMembershipHtml.php">Select Client Membership Type</a></p>
    <p style="text-align: center;"><a href="mainPage.php">Main Page </a></p>
</div>

<?php
        }
    } else {echo "You have to type all the fields to add New client".'<br>'.'<br>';
    ?>
<p style="display: inline;">Go Back to <a href="registerClientHtml.php">Register Client Page</a></p><br>
<p style="display: inline">or Go To </p> <a href="mainPage.php">Main Page</a>
<?php
    }
}