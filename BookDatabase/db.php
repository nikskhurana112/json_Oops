<?php
$hostname = "localhost";
$username = "newuser";
$password = "password";
$database = "books";
$db = new PDO("mysql:dbname=$database;host=$hostname",$username,$password);
// $db = new mysqli($hostname, $username, $password, $database);

