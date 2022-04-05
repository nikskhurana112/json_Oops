<?php
// require_once 'db.php';
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
// $phone = $_POST['phone'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $check = $db->query("SELECT * FROM signUps WHERE email = '$email' ");
// if($check->num_rows >= 1){
//     $response = ['status' => false, 'message' => 'You are already signed in. Please LogIn'];
//     header("content-type:application/json");
//     echo json_encode($response);
//     exit;
// }
// $result = $db->query("INSERT INTO signUps (first_name, last_name, phone, email, password) VALUES('$first_name','$last_name', '$phone', '$email', '$password' )");
// if ($result == null) {
//     echo $db->error;
// }
// else {
//     $response = ['status' => true, 'message' => 'User SignUp successfully. Please Login'];
// }
// header("content-type:application/json");
// echo json_encode($response);


require_once 'db.php';
require_once 'function.php';
require_once './Controller/UserController.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$user = new UserController($db);

if( $user->isExists('email',$_POST['email']) ){
    jsonResponse([
        'status' => false, 
        'message' => 'You are already signed in. Please LogIn'
    ]);
}


$result = $db->query("INSERT INTO signUps (first_name, last_name, phone, email, password) VALUES('$first_name','$last_name', '$phone', '$email', '$password' )");
if ($result == null) {
    echo $mysqli->error;
}
else {
    $response = ['status' => true, 'message' => 'User SignUp successfully. Please Login'];
}
header("content-type:application/json");
echo json_encode($response);
 ?>