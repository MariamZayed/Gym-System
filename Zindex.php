<?php
session_start();
include_once('dbConnect.php');
//الجداول بتاعة الريسبشن هتبقى هنا انه بيدخل اسم الي مشترك وبيانه وتحت منه جدول تاني 
// هيدخل مقساته وبعدين هيسلكت الاشتراكة بتاعه وتم الدفع
// جدول الورك اوت بتاعت الاسبوع ده هيبقى بيجنرز الاسبوع الاول الاسبوع التاني وهكذا
//اتفرج على داني اول حاجه
//اعمل اتش تي ام ال جداول تخيلا
//وبعدين اعمل جزء الباك بتاعه



if(isset($_POST['subMeasurementstbl'])){
     
    $selectClient = $_POST['selectClient'];//passing the value from option tag from html code
    $receptionistID = $_POST['selectReceptionist'];//passing the value from option tag from html code
     
     //bringing the selected option from the measurements page in $clientIdArr
     //seperate the string after u find the id: and put it in array $selectClientId
     $speratedTextArr = explode('id: ',$selectClient);//two index arr
     //print_r($speratedTextArr);echo '<br>'; Array ( [0] => [1] => 2 Maraim Zayed )
     $clientNameId = $speratedTextArr[1]; 
     $ClientIdArr = explode(' ',$clientNameId);//after evey space seperate and give me the first nummber -id-
     $clientId = $ClientIdArr[0];

     
     $weight1 = $_POST['weight1'];
//     $weight2 =null;
//     $weight3 =null;
//     $weight2 = $_POST['weight2'];
//     $weight3 = $_POST['weight3'];
     
     //
     $fat1 = $_POST['fat1'];
//     $fat2 = null;
//     $fat3 = null;
//     $fat2 = $_POST['fat2'];
//     $fat3 = $_POST['fat3'];
     //
     $nick1 = $_POST['nick1'];
//     $nick2 = null;
//     $nick3 = null;
//     $nick2 = $_POST['nick2'];
//     $nick3 = $_POST['nick3'];
     //
      $shoulders1 = $_POST['shoulders1']; 
//      $shoulders2 = null; 
//      $shoulders3 = null; 
//      $shoulders2 = $_POST['shoulders2'];
//      $shoulders3 = $_POST['shoulders3'];
      //
      $chest1 = $_POST['chest1'];
//      $chest2 = null;
//      $chest3 = null;
//      $chest2 = $_POST['chest2'];
//      $chest3 = $_POST['chest3'];
      //
      $waist1 = $_POST['waist1'];
//      $waist2 = null;
//      $waist3 = null;
//      $waist2 = $_POST['waist2'];
//      $waist3 = $_POST['waist3'];
      //
     $upAbs1 = $_POST['upAbs1'];
//     $upAbs2 = null;
//     $upAbs3 = null;
//     $upAbs2 = $_POST['upAbs2'];
//     $upAbs3 = $_POST['upAbs3'];
      //
      $lowAbs1 = $_POST['lowAbs1'];
//      $lowAbs2 = null;
//      $lowAbs3 = null;
//      $lowAbs2 = $_POST['lowAbs2'];
//      $lowAbs3 = $_POST['lowAbs3'];
      //
      $upthighs1 = $_POST['upthighs1'];
//      $upthighs2 = null;
//      $upthighs3 = null;
//      $upthighs2 = $_POST['upthighs2'];
//      $upthighs3 = $_POST['upthighs3'];
      //
      $lowthighs1 = $_POST['lowthighs1'];
//      $lowthighs2 = null;
//      $lowthighs3 = null;
//      $lowthighs2 = $_POST['lowthighs2'];
//      $lowthighs3 = $_POST['lowthighs3'];
      //
      $calf1 = $_POST['calf1'];
//      $calf2 = null;
//      $calf3 = null;
//      $calf2 = $_POST['calf2'];
//      $calf3 = $_POST['calf3'];
      
      if($clientId != null && $weight1 != null && $fat1 != null && $nick1 != null && $shoulders1 != null && $chest1 != null && $waist1 != null && $upAbs1 != null && $lowAbs1 != null && $upthighs1 != null && $lowthighs1 != null && $calf1 != null && $receptionistID != null){
        $sql = "INSERT INTO measurements (client_id, weight, body_fat, nick, shoulders, chest, waist, upper_abs, lower_abs, upper_thighs, lower_thighs, calf, recepionist_id)
            VALUES ('$clientId', '$weight1', '$fat1', '$nick1', '$shoulders1', '$chest1', '$waist1', '$upAbs1', '$lowAbs1', '$upthighs1', '$lowthighs1', '$calf1', '$receptionistID');";
        $result1 = mysqli_query($link, $sql);

        if ($result1 == false){// yes I can do that
            echo 'Wrong query from var $sql in outer condition if'."<br><br>";
    ?>
    <p style="display: inline">Go back to the measurements table </p> <a href="ZindexHtml.php">here</a> 
    <?php
        }else {

            $sqlDateTime =" SELECT date FROM measurements ORDER BY id=2 DESC LIMIT 1 ";//هات اخر واحده متضافه للجدول بالي دي ده
            $result2 = mysqli_query($link, $sqlDateTime);

            if($result2 != true){// yes I can do that
                 echo 'Wrong query from var sqlDateTime in inner condition if';//هات قيمة واحده بالظبط
            }else{
                while($row = mysqli_fetch_assoc($result2)){
                    echo 'Done!'.'<br>'.'Ctreated on ' .$row['date'].'<br>';
                }
            }
    ?>
    <p style="display: inline">See Client Whole Measurements Table</p> <a href="beforeClientMeasurementTableHtml.php">here</a><br>
    <p style="display: inline">Or Go To </p> <a href="mainPage.php">Main Page</a>
    <?php
        }   

        
                }else{
                    echo 'You have to Fill all the blank fileds'.'<br>'.'<br>';
                    ?>
    
    <p style="display: inline">Go back to the measurements table </p> <a href="ZindexHtml.php">here</a> <br>
    <p style="display: inline">Or Go To </p> <a href="mainPage.php">Main Page</a>
    <?php
                }
}
