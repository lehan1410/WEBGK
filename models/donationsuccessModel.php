<?php
function getDonation($email) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM donation WHERE email = ? ORDER BY donation_id DESC LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $donation = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
    return $donation;
}
function getRecentDonations($limit = 10) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT *, date(created_at) as dateDo FROM donation ORDER BY created_at DESC LIMIT ?");
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $donations = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
    return $donations;
}
function getDonationSummaryByEmail() {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT email, COUNT(*) AS donation_count, SUM(donation_total) AS total_amount FROM donation GROUP BY email");
    $stmt->execute();
    $result = $stmt->get_result();
    $summaries = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
    return $summaries ?: [];
}
?>