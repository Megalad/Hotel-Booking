<?php
    $host="localhost";
    $port=3307;
    $user="root";
    $password="";
    $dbname="hotel";

    $con=new mysqli($host,$user,$password,$dbname,$port);
    if($con->errno)
    {
        echo "Connection Error";
    }
    // else{
    //     echo "success";
    // }
    
?>