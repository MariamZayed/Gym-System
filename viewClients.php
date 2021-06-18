<?php
session_start();
include_once ('dbConnect.php');

$sql = "SELECT id, name FROM client";
$result = mysqli_query($link, $sql);
if($result != true){
    echo 'wrong sql query from viewClients.php file';
}else {
    while($row = mysqli_fetch_assoc($result)){
        echo '-ID '.$row['id'].' '.$row['name'].'<br>';
    }
}
