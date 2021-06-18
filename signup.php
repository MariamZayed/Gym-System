<?php
session_start();
include_once ('dbConnect.php');
//seesion
//cookie
//set data into a Data BAswe
//direct user to main profile
//chech if the user has indeed an acoount//direct him to login

if(isset($_SESSION['user'])){
     header("location:mainPage.php");
     exit;
}

if(isset($_POST['subSignIn'])){
    //Get values
    $name1     = $_POST['username'];
    $password1 = $_POST['pass'];
    $password2 = $_POST['repeatPass'];
    
    //Validation
    if(empty($name1)|| empty($password1)|| empty($password2)){ 
        echo "Type Your Name Or Password To Sign In";
        echo "<br><a href='signupHtml.php'>Sign In</a>";
        
        /*USER NAME INPUT RANGE MUST BE IN THE THAT PATTERN FIELD*/
        }elseif(!preg_match("/^[a-zA-Z0-9]*$/", $name1)){
            header('location:signup.php?invalidName');
            exit();
        }elseif($password1 != $password2){
            header('location:signup.php?passwordDidntMatch');
            exit();
        }else{
            /* START OF CHECKING IF THERE IS NOT IDENTICAL USERNAME IN THE DB*/
            $sqlUser = "SELECT username , id FROM recepionist WHERE username=?";
            $stmt = mysqli_stmt_init($link);
            if(!mysqli_stmt_prepare($stmt, $sqlUser)){
                header('location:signup.php?erorr=sqlerr');
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"s",$name1);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);//the function gives us the number of rows
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){
                    header('location:signup.php?error=userTakenBefore');
                    exit();
            /* END OF CHECKING IF THERE IS NOT IDENTICAL USERNAME IN THE DB*/
                
            /*INSERTING USERNAME & PASSWORD TO THE DB*/    
                }else{
                    $sql = "INSERT INTO recepionist (username, password) VALUES (?,?)";
                    $stmt = mysqli_stmt_init($link);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header('location:signup.php?erorr=sqlerr');
                        exit();
                    }else{
                        /*HASHING THE PASSWORD*/
                        $hashpassword = password_hash($password1, PASSWORD_DEFAULT);
                        
                        mysqli_stmt_bind_param($stmt,"ss", $name1, $hashpassword);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if($result == false){
                            header('location:signup.php?errorline66');
                            exit();
                        }else{
                            //Create Session
                            $sqlID = "SELECT id FROM recepionist WHERE username = '$name1'";
                            $result = mysqli_query($link, $sqlID);
                            if($result != true){
                                echo"no";
                            }else{
                                while($row = mysqli_fetch_assoc($result)){ //this is an loop for the rows once for mariam row including age height and the other for tema row same age and height etc
                                       $id = $row['id'];
                                       $_SESSION['user'] = $id;
                                       header('location:mainPage.php?Success!');
                                       exit();
                                      }

                                }
                            
                            }
                    }
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($link);
        }    
    }elseif(isset($_POST['logButton'])){
         header("location:loginHtml.php");
         exit();
}
    /*IF THE USER TRIED TO OPEN THIS FILE WITHOUT PRESSING THE SUBMIT BUTTON*/
//    else{
//         header('location:signup.php?youTriedToAccessThisPage');
//         exit();
//    }