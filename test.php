
<?php
 include_once ('dbConnect.php');

//if ($result = mysqli_query($link, "SELECT * FROM systemusers")) {
//    //print_r($result);mysqli_result Object ( [current_field] => 0 [field_count] => 3 [lengths] => [num_rows] => 1 [type] => 0 )
//    echo "Returned rows are: " . mysqli_num_rows($result);//[num_rows] => 1  // output =1
//    
//    echo '<br>';
//    print_r(mysqli_fetch_assoc($result));//fetch= bring the first row in the table for ex *cause it cant hold more than 1 aasoc arr* and put it in a associative arr
////                                         Array ( [id] => 1 [username] => Mariam Zayed [password] => mmmm )
 
 
// $name="Fatema";
// $pass="nnnnn";
//        $sql = "SELECT * FROM systemusers WHERE username ='$name' AND password='$pass';";
//        $result = mysqli_query($link, $sql);
//        $resultCheck = mysqli_num_rows($result);
//        if (!$resultCheck > 0){
//            echo"no";
//        }else{
//        while($row = mysqli_fetch_assoc($result)){ //this is an loop for the rows once for mariam row including age height and the other for tema row same age and height etc
//               print_r ($row);
//              }
//              
          //// or i can do that
          //$result = mysqli_query($link, $sql);
//        if ($result == ture){// yes I can do that it will pop pan error so that's why we dont user it so i can remove true no eror will pop out
//            while($row = mysqli_fetch_assoc($result)){
//                print_r ($row);
//            }
//        }
            
// $username ="Mariam Zayed";
// $password ='mmmm';
// $loginRes = selectQuery("systemusers","id","username='$username' AND password='$password'");
//        if($loginRes == false){
//            echo "Wrong username or password.";
//        }

 
 
//كنت عابزه اعرف اوت بوت الرزيلت بتاعت السليكت ايه لو كانت فيلد واحد لكولوم واحد مش كولوم كامل
// $sqlDateTime =" SELECT date FROM measurements ORDER BY id=2 DESC LIMIT 1 ";//هات اخر واحده متضافه
//        $result2 = mysqli_query($link, $sqlDateTime);
//        
//        if($result2 != true){// yes I can do that
//             echo 'Wrong query from var sqlDateTime in inner condition if';//هات قيمة واحده بالظبط
//        }else{
////            print_r($result2);//mysqli_result Object ( [current_field] => 0 [field_count] => 1 [lengths] => [num_rows] => 1 [type] => 0 )
//            while($row = mysqli_fetch_assoc($result2)){
//                echo $row['date'];
//            }
//            
//        }


//         $sql1 = "insert into manager (username, password) values('manager8','123123')";
//        $result = mysqli_query($link, $sql1);
//        print_r ($result);// output:1 means tyre  
//        if ($result){// yes I can do that
//           echo'cool';
//            }else{
//                echo'no';
//            }  
 
 
// -----------------GLOBAL VARIABLES-------------------
//    $x = 5; // Global scope
//
//    function myTest()
//    {
//        $y = 10; // Local scope
//        $x = 23;
//
//        echo "<p>Test variables inside the function:<p>";
//        echo "Variable x in global scope is: " . $GLOBALS['x'];
//        echo "<br>Variable x in local scope is: $x";
//        echo "<br>";
//        echo "Variable y is: $y";
//    }
//
//    myTest();
//
//    echo "<p>Test variables outside the function:<p>";
//    echo "Variable x is: $x";
//    echo "<br>";
//    echo "Variable y is: $y";


//$x = 5; // Global scope
//
//function myTest() {
//    $y = 10; // Local scope
//    $x = 6;
//    global $x;
//
//    echo "<p>Test variables inside the function:<p>";
//    echo "Variable x in global scope is: $x";
//    echo "<br>";
//    echo "Variable y is: $y";
//}
//
//myTest();
//
//echo "<p>Test variables outside the function:<p>";
//echo "Variable x is: $x";
//echo "<br>";
//echo "Variable y is: $y";

 //-----------------------------------------
// $x = 1;
// $x_value = 'one';
// echo '<table>';
// echo '<tr>'.'<td>'.'<table>'.'<tr>'.'<td>'.$x.'</td>'.'</tr>'.'</table>'.'</td>'.'<td>'.'<table>'.'<tr>'.'<td>'.$x_value.'</td>'.'</tr>'.'</table>'.'</td>';
// echo '<tr>'.'<td>'.'<table>'.'<tr>'.'<td>'.$x.'</td>'.'</tr>'.'</table>'.'</td>'.'<td>'.'<table>'.'<tr>'.'<td>'.$x_value.'</td>'.'</tr>'.'</table>'.'</td>';
// echo '</table>';
