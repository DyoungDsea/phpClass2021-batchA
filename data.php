<?php
session_start();
require 'config.php' ;

// $sql = $conn->query("SELECT * FROM `register` ");

// if($sql->num_rows>0){
//     while($row = $sql->fetch_assoc()){
//         echo $row['id'].' '.$row['dfullname'].' '.$row['dphone'].'<br>';
//     }
// }

// $name = "Ifem mi";
// $email = "Ifemmi@gmail.com";

// $sql = $conn->query("UPDATE register SET dfullname='$name', demail='$email' WHERE id=1 ");

// if($sql){
//     echo "yes";
// }else{
//     echo "No";
// }

$sql = $conn->query("DELETE FROM register");

if($sql){
    echo "yes";
}else{
    echo "No";
}