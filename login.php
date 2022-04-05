<?php
require_once 'function.php';
require_once './Controller/UserController.php';

$hostname = "localhost";
$username = "newuser";
$password = "password";
$database = "user";
$db = new PDO("mysql:dbname=$database;host=$hostname",$username,$password);


$email = $_POST['email'];
$password = $_POST['password'];

// $stmt = $db->prepare("SELECT * FROM signUps WHERE email = ? AND password = ? ");
// $stmt->execute([$email,$password]);


$stmt = $db->prepare("SELECT * FROM signUps WHERE email = :email AND password = :password ");
$stmt->execute([":email" => $email, ":password" => $password]);
$rows = $stmt->fetch(2);
print_r($rows);


// if( $user->isNotEmpty() ) 
// {
//     $id = $row[0]['id'];
//     $token = bin2hex(random_bytes(60));
//     $result =  $user->query("UPDATE signUps set token = '$token' WHERE id = $id");
//     jsonResponse(['status' => true,'query' => $query , 'message' => 'User login successfully', 'id' => $id , 'token' => $token]);
// } 
// else 
// {
//     jsonResponse(['status' => false, 'query' => $query ,'message' => 'Invalid Username and password']);
// }
