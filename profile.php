<?php
session_start();
if(!isset($_SESSION['userID'])){
    header("Location: login");
}
require 'config.php';

$key =  $_SESSION['userID'];

$sqk = $conn->query("SELECT * FROM login WHERE userid='$key'");
if($sqk->num_rows>0){
    $row = $sqk->fetch_assoc();
    echo $row['id'].'<br> '.$row['dusername'] .'<br> '.$row['dphone'].' <br>'.$row['demail'].'<br> '.$row['dstatus'].'<br> '.$row['ddate'];
}
?>
<p>
    <a href="logout">Logout</a>
</p>