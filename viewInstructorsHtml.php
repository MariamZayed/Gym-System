<?php
session_start();
?>
<html>
    <head>
       <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </head>
    <body>
        <h3 id="instructorView"></h3>
        <br><br>
        <p style="display: inline;">Register New Instructor <a href="registerInstructorHtml.php">here</a></p><br>
        <p style="display: inline">Or Go To </p> <a href="mainPage.php">Main Page</a>
    </body>
    
    <script>
        function timerViewClients(){
            $.post("viewInstructors.php",{},function(returnedClientsData){
              document.getElementById("instructorView").innerHTML = returnedClientsData;
            });
           };
           
            $(document).ready(function(){setInterval("timerViewClients()",2000);});
    </script>
</html>
