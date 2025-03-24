<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "dbshool";
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn)
{
    die();
}

?>