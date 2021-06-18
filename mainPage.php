<?php
session_start();
echo '<h1 style="text-align: center;padding-top: 50px;">Receptionist ID Number: '.$_SESSION['user'].'</h1>';
if(isset($_SESSION['user'])){
?>
<body style="background-color: #efefef;">
<div style="text-align: center;padding-top: 60px; width: 500px;margin: 20px auto;">
    <a href="registerClientHtml.php">Register New Client</a><br><br>
    <a href="clientMembershipHtml.php">Client Membership</a><br><br>
    <a href="viewClientsHtml.php">Show All Registered Clients</a><br><br>
    <a href="ZindexHtml.php">Record New Measurement</a><br><br>
    <a href="beforeClientMeasurementTableHtml.php">Choose Client To Show His Measurement Table</a><br><br>
    <hr>    
    <a href="registerInstructorHtml.php">Register New Instructor</a><br><br>
    <a href="viewInstructorsHtml.php">Show All Registered Instructors</a><br><br>
    <hr>
    <a href="viewManagerHtml.php">Show All Registered Managers</a><br><br>
    <hr>    
    <a href='logout.php'>log out</a>
</div>
 </body>
<?php
}else{
    header('location:loginHtml.php');
    exit;
}
