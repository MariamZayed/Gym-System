<?php
session_start();
include_once ('dbConnect.php');


if(isset($_POST['subRegisterInstructor'])){
    //Get values
    $name1 = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $managerID = $_POST['selectManager'];
    //Validation
    if($name1 != null && $mobile != null && $address != null && $managerID != null){
        
        //Inserting the user data into the database
        $sql = "INSERT INTO instructor (name, mobile, address, manager_id) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location:registerInstructor.php?erorr=sqlerr');
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"ssss",$name1,$mobile,$address,$managerID);
            mysqli_stmt_execute($stmt);            
?>
<div style="padding-top: 90px;">
    <p style="text-align: center;">Done!</p>
    <p style="text-align: center;"><a href="mainPage.php">Show All Registered Instructor</a></p>
    <p style="text-align: center;"><a href="mainPage.php">Main Page </a></p>
</div>

<?php
        }
    } else {echo "You have to type all the fields to add New Instructor ".'<br>'.'<br>';
    ?>
<p style="display: inline;">Go Back to <a href="registerInstructorHtml.php">Register Instructor Page</a></p><br>
<p style="display: inline">Or Go To </p> <a href="mainPage.php">Main Page</a>
<?php
    }
}