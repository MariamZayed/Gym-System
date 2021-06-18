<?php
session_start();
//setcookie('userCookie',$name, time() - 3600);
session_unset();
session_destroy(); 
session_write_close();
header('Location:loginHtml.php');
exit;