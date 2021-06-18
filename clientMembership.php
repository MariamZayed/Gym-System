<?php
session_start();
include_once ('dbConnect.php');

if(isset($_POST['subMembership'])){
    //Get values
    $selectedClient = $_POST['selectClient'];
    $selectedMembership = $_POST['selectMembership'];
    $receptionistID = $_POST['selectReceptionist'];
    
    /*START OF BRINGING CLIENT ID FROM THE SELECTED OPTION TEXT */
      //seperate the string after u find the id: and put it in array $selectClientId
     $speratedTextArr = explode('id: ',$selectedClient);//two index arr
      //print_r($speratedTextArr);echo '<br>'; Array ( [0] => [1] => 2 Maraim Zayed )
     $clientNameId = $speratedTextArr[1]; 
     $ClientIdArr = explode(' ',$clientNameId);//after evey space seperate and give me the first nummber -id-
     $clientId = $ClientIdArr[0];
    /*END OF BRINGING CLIENT ID FROM THE SELECTED OPTION TEXT */
     
     
    //CALCULATING NEXT MONTH DATE EXPIRAYOIN GYM subscribtion
    $today = date("Y-m-d");
    $next_month = date("Y-m-d", strtotime("$today +1 month")); //eror need to fix:If today is January, next month should be February which has 28 or 29 days, but PHP will return March as next month, not February.

    
    /* START OF CONVERTING SELECTED MEMBERSHIP TEXT TO mumbershipID*/
    $membershipIDSql = "SELECT id FROM membership_types WHERE membership_Type='$selectedMembership'";

   $result = mysqli_query($link, $membershipIDSql);
   if ($result == false){
      echo'error from clientMembership.php membershipIDSql query';
   }else{
       while($row = mysqli_fetch_assoc($result)){
       $membershipID = $row['id'];

    /* END OF CONVERTING SELECTED MEMBERSHIP TEXT TO mumbershipID*/
       
       
      //Inserting the user data into the database
      $sql = "INSERT INTO client_membership(membership_type_id ,toDate , client_id, recepionist_id ) VALUES (?,'$next_month',?,?)";
      $stmt = mysqli_stmt_init($link);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header('location:clientMembership.php?erorr=sqlerr');
          exit();
      }else{
          mysqli_stmt_bind_param($stmt,"sss",$membershipID,$clientId,$receptionistID);
          mysqli_stmt_execute($stmt);
?>
<p style="display: inline;">Done!</p><br>
<p style="display: inline;">Go to measurement table <a href="ZindexHtml.php">here</a></p><br>
<p style="display: inline;">Main Page <a href="mainPage.php">here</a></p>
<?php

          }
      }        
  }
}