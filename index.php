<?php
$student = [
    "first_name" => "Kirat",
    "age" => 21,
    "phones" => [
        "715632763726",
        "798437987983"
    ]
];
echo json_encode($student);
$str = '{"first_name":"Kirat","age":21,"phones":["715632763726","798437987983"]}';
$data = json_decode($str, true);
echo $data['first_name'];
