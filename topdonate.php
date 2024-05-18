<?php
function getDbConnection() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "donate";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getRecentDonors() {
    $conn = getDbConnection();
    $sql = "SELECT * FROM donors ORDER BY donation_date DESC LIMIT 10";
    $result = $conn->query($sql);
    $donors = [];
    while($row = $result->fetch_assoc()) {
        $donors[] = $row;
    }
    $conn->close();
    return $donors;
}

$donors = getRecentDonors();
?>