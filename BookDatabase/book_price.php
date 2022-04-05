<?php
require_once "db.php";

$book_name = $_POST['book_name'];


$query = "SELECT price FROM books
WHERE book_name = '$book_name'";

$result = $db->query($query);
if ($result == null) {
    echo $db->error;
    exit;
}
if ($result->num_rows > 0) {
    $book = $result->fetch_assoc();
    $price = $book['price'];

    $response = ['status' => true, 'message' => 'The book price is: ' . $price];
} 
else {
    $response = ['status' => false, 'message' => 'This book price is not stored in database'];
}

header("content-type:application/json");
echo json_encode($response);
