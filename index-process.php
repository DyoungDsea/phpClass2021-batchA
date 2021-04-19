<?php

require 'config.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['save'])){

        //check for error result
        if(empty($_POST['dfname'])){
            $error = "Fullname is required!";
        }else{
            $fname = clean($_POST['dfname']);
        }

        //phone
        if(empty($_POST['phone'])){
            $error = "Phone number is required!";
        }else{
            $phone = clean($_POST['phone']);
        }


        //email
        if(empty($_POST['email'])){
            $error = "Email is required!";
        }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error = "Invalid Email!";
        }else{
            $email = clean($_POST['email']);
            $sql = runQuery("SELECT * FROM dlogin WHERE demail='$email'");
            if($sql->num_rows>0){
                $error = "This $email is already taken!";
            }
            
        }

        //address
        if(empty($_POST['add'])){
            $error = "Address is required!";
        }else{
            $add = clean($_POST['add']);
        }


        //password
        if(empty($_POST['pass'])){
            $error = "Password is required!";
        }else{
            $pass = clean($_POST['pass']);
            if(strlen($pass)<4){
                $error = "Password is too short";
            }elseif(strlen($pass)>10){
                $error = "Password is too long";
            }else{
                $pass = md5($pass);
            }
        }

        //password
        if(empty($_POST['cpass'])){
            $error = "Confrim password is required!";
        }else{
            $cpass = clean($_POST['cpass']);
            if(empty($error)){
                if($pass == $cpass){
                    $error = "Password does not match!" ;
                 }
            }
        }

        $userid = date("Ymdhis");
        if(empty($error)){
            $sql = runQuery("INSERT INTO dlogin SET userid='$userid', dfullname='$fname', dphone='$phone', dpass='$pass', demail='$email', daddress='$add' ");
            if($sql){
                $success = "Record inserted successfully!";
            }else{
                $error = "Oops! try again later";
            }
        }

    }
}


function runQuery($data){
    GLOBAL $conn;
    return $conn->query($data);
}

function clean($data){
    GLOBAL $conn;
    $data = trim($data);
    $data = htmlentities($data);
    $data = strip_tags($data);
    $data = $conn->real_escape_string($data);
    return $data;
}