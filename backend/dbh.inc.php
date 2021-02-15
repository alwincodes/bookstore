<?php
$servername="localhost";
$dbuname="root";
$dbpassword="";
$dbname="bookstore";
//connectin to the database
$conn = mysqli_connect($servername,$dbuname,$dbpassword,$dbname,3308);
//checking if connection fails
if(!$conn){
    die("Database connection failed".mysqli_connect_error());
} 