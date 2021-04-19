<?php

// $conn = new mysqli('localhost', 'root', '', '2021batcha');

$localhost = 'localhost';
$user = 'root';
$pass = '';
$dbname = '2021batcha';

$conn = new mysqli($localhost, $user, $pass, $dbname);



// $userid = date("Ymdhis").rand(100000,999999);

// $sql = $conn->query("SELECT * FROM login WHERE userid IS NULL");
// if($sql->num_rows>0){
//     while($row=$sql->fetch_assoc()){
//         $id = $row['id'];
//         $new = $userid.$id;
//         $conn->query("UPDATE login SET userid='$new' WHERE id='$id' ");
//     }
// }
