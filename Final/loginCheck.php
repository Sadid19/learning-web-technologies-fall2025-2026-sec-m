<?php

session_start();

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    if($username == "" || $password == ""){
        echo "Null submission";
    }
    else{
        if($username==$password){
            echo "Valid user!";
            //setcookie(name, value, expire, path, domain, secure, httponly); 
            setcookie('status', 'true', time()+3600, '/');
            $_SESSION[$username]=$username;
            header('location: home.php');
        }
        else{
            echo "Invalid user!";
        }
    }
}

?>