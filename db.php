<?php
$hostname = "localhost";
$username = "newuser";
$password = "password";
$database = "user";
$db = new mysqli($hostname, $username, $password, $database);
// $db = new PDO("mysql:dbname=$db;host=$hostname",$username,$password);
