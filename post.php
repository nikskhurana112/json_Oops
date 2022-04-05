<?php
require_once 'db.php';
require_once 'function.php';
isUser($db);

$title = $_POST['Title'];
$description = $_POST['Description'];
$id = $_POST['id'];


$result = $db->query("INSERT INTO post (Title, Description, user_id) VALUES('$title','$description', '$id')");
if ($result == null) {
    echo $mysqli->error;
} else {
    $response = ['status' => true, 'message' => 'Post Submission Success'];
}
header("content-type:application/json");
echo json_encode($response);
exit;
