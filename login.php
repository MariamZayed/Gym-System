<?php
session_start();
include_once ('dbConnect.php');

if(isset($_SESSION['user'])){
     header("location:mainPage.php");
     exit;
     
}


/* Start Of Validation*/
if(isset($_POST['sub'])){//القوس ده قفلته تحت خالص نهاية الملف
    
    //Get values.
    $name = $_POST['btngan'];
    $pass = $_POST['pass'];  
    
    //FILTER THE INPUT
    filter_var($name, FILTER_SANITIZE_STRING);
    
    //if the user inserted text in both boxes
    if($name != null && $pass != null){
        
/*START OF SQL CODE*/
        
        $sql = "SELECT * FROM recepionist WHERE username =? AND password=?;";
        $stmt = mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($stmt,$sql)){
           header('location:login.php?erorr=sqlerr');
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $name, $pass);//انا شيلت ال؟ وحطيت ال فاريبلز الي اليوزر مدخله
            mysqli_stmt_execute($stmt);//بعد كل ده انا هنا معرفش هل فعلا المدخلات الي جابها فعلا بتساوي الي موجوده ف الداتا بيز
            $result = mysqli_stmt_get_result($stmt);//it's just a raw data we got from the DB
            
            if($row = mysqli_fetch_assoc($result)){//put it in a assoctive array and if it has a value then it's true
                $id = $row['id'];
                //Create Session
                $_SESSION['user'] = $id;
/*END OF SQL CODE*/
                header("location:mainPage.php");
            }else{
                //php?erorr=noUserMatchesTheDataInTheDB//if the user tried to log in but he is not regsitred or wrong password/username//message error pop out //click the link to go to the sign up page
                echo "Wrong User Name Or Password,";
                ?><a href="loginHtml.php">Try Again</a> <br><?php                   
                 echo 'Sign In here';
                 ?> <a href="signupHtml.php">Sign Up</a><?php
            }
        }       
    }
    
    /*the user didn't fill the box and hit the submit button*/
    else{
         echo 'Type Your Name Or Password';
         ?><br><a href="loginHtml.php">Log In</a><?php            
    }
/* End Of Validation*/
}elseif(isset($_POST['newAccButton'])){
    header("location:signupHtml.php");
}