<?php
session_start();
require 'config.php';



if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['save'])){

     
        $pass = md5($conn->real_escape_string($_POST['pass']));
        $email = $conn->real_escape_string($_POST['email']);


        $sql = $conn->query("SELECT * FROM login WHERE demail='$email' AND dpass='$pass' OR dusername='$email' AND dpass='$pass'");
        if($sql->num_rows>0){
            $row = $sql->fetch_assoc();
            $_SESSION['userID'] = $row['userid'];
            // print_r($row);
            header("location: profile");  
        }else{
            $_SESSION['error'] = "Sorry invalid details";
            header("location: login");
        }
        


        


    }


}