<?php
function isUser($db)
{
    
    $token = $_POST['token'];
    $id = $_POST['id'];

    $result = $db->query("SELECT * FROM signUps WHERE id = '$id'");
    if ($result == null) {
        echo $db->error;
        exit;
    }
    if ($result->num_rows == 0) {
        echo "Invalid id";
        exit;
    }
    $row = $result->fetch_assoc();
    if ($row['token'] != $token) {
        $response = ['status' => false, 'message' => 'Unauthorize Access'];
        header("content-type:application/json");
        echo json_encode($response);
        exit;
    }

}

function jsonResponse($response)
{
    header("content-type:application/json");
    echo json_encode($response);
    exit;
}