<?php

$serverName = "localhost" ;
$dbUsername = "root" ;
$dbPassword = "braa123" ;
$dbName = "php_project" ;

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName) ;

if (!$conn) {
    die("connection failed: ". mysqli_connect_error()) ;
}

