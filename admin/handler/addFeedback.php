<?php
    require_once("../query.php");
    
    $fio = $_POST["FIO"];
    $address = $_POST["Address"];
    $phone = $_POST["Phone"];
    $email = $_POST["Email"];

    $param = [
        "FIO" => $fio,
        "Address" => $address,
        "Phone" => $phone,
        "Email" => $email,
    ];

    addFeedback($param);

    $feedbacks = getAllFeedbacks();

    echo json_encode($feedbacks, JSON_UNESCAPED_UNICODE);
?>