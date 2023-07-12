<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "loan_system";

$conn = mysqli_connect($servername, $username, $password, $database);