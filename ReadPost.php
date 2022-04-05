<?php
require_once 'db.php';
require_once 'function.php';
require_once './Controller/UserController.php';
isUser($db);

$id = $_POST['id'];
$token = $_POST['token'];


$user = new UserController($db);
$rows = $user->find($id);
if ($user->isEmpty()) {  echo "Invalid id"; exit; }

if ($row['token'] != $token) {
    jsonResponse(['status' => false, 'message' => 'Unauthorize Access']);
}


$result =  $db->query("SELECT * FROM post WHERE user_id = '$id'");
if ($result == null) {
    echo $db->error;
    exit;
}
$length = $result->num_rows;
$response = [];
for ($i = 0; $i < $length; $i++) {
    $data = $result->fetch_assoc();
    $response[$i] = $data;
}
header("content-type:application/json");
echo json_encode($response);
