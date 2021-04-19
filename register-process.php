<?php

include 'config.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['save'])){

        //username validation
        if(empty($_POST['username'])){
            $error = "Username is Empty";
        }else if(strlen($_POST['username']) < 3){
            $error = "Username is too short";
        }else{
            $username = $conn->real_escape_string($_POST['username']);
        }

        //Phone Validation
        if(empty($_POST['phone'])){
            $error = "Phone is Empty";
        }else if(!is_numeric($_POST['phone'])){
            $error = "Enter valid phone number";
        }else{
            $phone = $conn->real_escape_string($_POST['phone']);
        }

        //validate Email
        if(empty($_POST['email'])){
            $error = "Email is Empty";
        }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error = "Enter valid email";
        }else{
            $email = $conn->real_escape_string($_POST['email']);
            $sql = $conn->query("SELECT * FROM login WHERE demail='$email'");
            if($sql->num_rows>0){
                $error = 'Email already taken!';
            }
        }

        //pass validation
        if(empty($_POST['pass'])){
            $error = "Password is Empty";
        }else if(strlen($_POST['pass']) < 4){
            $error = "Password is too short";
        }else{
            $pass = $conn->real_escape_string($_POST['pass']);
            $cpass = $conn->real_escape_string($_POST['cpass']);
            if($pass != $cpass){
                $error = "Password doesn't match";
            }else{
                $pass = md5($pass);
                // $pass = password_hash($pass, PASSWORD_DEFAULT);
            }
        }

        if(empty($error)){
            // echo "$username $phone $email $pass" ; 
            
            $sql = $conn->query("INSERT INTO login SET userid = '$userid', dphone='$phone', dusername = '$username', demail = '$email', dpass = '$pass' ");
            if($sql){
                // mail();
                $success = "Your account has been created successfully!";
            }else{
                $error = "Oops!, try again later";
            }
        }





    }


}