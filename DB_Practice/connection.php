<?php
$hostName = "127.0.0.1";
$userName = "root";
$password = NULL;
$dbName = "practiceDB";

$con = mysqli_connect($hostName, $userName, $password, $dbName);

if($con){
    echo "Connection Successful";
}
else{
    echo "Connection failed!";
    die(mysql_connect_error());
}

?>
