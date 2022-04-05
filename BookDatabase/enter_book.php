<?php
require_once "db.php";

$book_name = $_POST['book_name'];
$price = $_POST['price'];
$check = $db->prepare("SELECT * FROM books WHERE book_name = :bookname");
$check->execute([":bookname" => $book_name]);
$rows = $check->fetch(2);
if(count($rows) > 0){
    $response = ['status' => false, 'message' => 'This book is already entered. Please enter another book name'];
    header("content-type:application/json");
    echo json_encode($response);
    exit;
}
$result = $db->query("INSERT INTO books (book_name, price) VALUES('$book_name','$price')");
if ($result == null) {
    echo $db->error;
}
else {
    $response = ['status' => true, 'message' => 'Book name with price is successfully entered into database'];

}
header("content-type:application/json");
echo json_encode($response);