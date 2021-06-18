<?php //this file so the to select client tomshow him all his measurement data
session_start();
include_once ('dbConnect.php');


if(isset($_POST['subClient'])){
    
    $selectClient = $_POST['selectClient'];//passing the value from option tag from html code
     
    //bringing the selected option from the measurements page in $clientIdArr
    //seperate the string after u find the id: and put it in array $selectClientId
    $speratedTextArr = explode('id: ',$selectClient);//two index arr
    //print_r($speratedTextArr);echo '<br>'; Array ( [0] => [1] => 2 Maraim Zayed )
    $clientNameId = $speratedTextArr[1]; 
    $ClientIdArr = explode(' ',$clientNameId);//after evey space seperate and give me the first nummber -id-
    $clientId = $ClientIdArr[0];

    //now we search foe the client id in the table to bring his measurements dat=-
    $sql = "SELECT * FROM measurements WHERE client_id ='$clientId'";
    $result = mysqli_query($link, $sql);
        
        if($result != true){// yes I can do that
             echo 'Wrong query from var sql in clientMeasurementTable.php ';
        }else{
            $numOfRows = mysqli_num_rows($result);//عدد الصفوف من وجهة نظر  البرواز  والصف فيه اكتر من فيلد وكل فيلد بانديكس ف الاراي الي هتطبع
            if($numOfRows == 0){
?>
<p style="display: inline">This Client didn't Take His Measurements yet Before! Go to measurements table <a href="ZindexHtml.php">here</a></p> <br><br>
<p style="display: inline">Go back to main page <a href="mainPage.php">here</a></p> <br>
<p style="display: inline">choose another client to show his measurement table <a href="beforeClientMeasurementTableHtml.php">here</a></p>

<?php
            }else{      
?>
<table width=“100%” >
<?php
                while($clientMeasurementsRow = mysqli_fetch_assoc($result)){;//هو انا قلت صف من وجهة نظر البراوز يعني
                    //المفروض هنا بقه اخليه يعملي عدد من الاعمده بناءا على عدد الجداول وديه جايه من الوايل
                    // وجوا هنا بناءا علد عدد المتغيرات الي جوا الاراي هيعملي عدد الصفوف
                    foreach($clientMeasurementsRow as $x => $x_value) {
                              echo "<tr>" . '<td>' .$x. ': ' . '</td>' . '<td>' .$x_value. ' '. '</td>' . '</tr>';
                    }
                    echo '<tr><td>----------------------</td><td>--------------------------------------<td><tr>';
                }
?>
</table>
<p style="display: inline">Choose Another Client To Show His Measurement Table <a href="beforeClientMeasurementTableHtml.php">here</a></p><br>
<p style="display: inline">Show All Registered Clients <a href="registerClientHtml.php">here</a></p> <br>
<p style="display: inline">Or Go To </p> <a href="mainPage.php">Main Page</a>
<?php
        }
      }

}