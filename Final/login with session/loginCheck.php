<?php
session_start();

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "" || $password == ""){
        echo "null username/password";
    }
    else{
        if($username == $password){
            $_SESSION['status'] = true;
            $_SESSION['username'] = $username;
            header('location: home.php');
        }
        else{
            echo "invalid username/password";
        }
    }
}
    else{
        header('location: login.html');
    }

?>
