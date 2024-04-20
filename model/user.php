<?php
function checkUser($name, $pass) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM user WHERE name = ? AND password = ?");
    $stmt->bind_param("ss", $name, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
}   
function checkUser1($name, $email) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM user WHERE name = ?  AND email = ?");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
}   
?>