<?php
session_start();
header('Content-Type: application/json');

include 'connection.php';

if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    echo json_encode([]);
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT c.* FROM courses c JOIN enrollments e ON c.course_id = e.course_id WHERE e.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$courses = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($courses);

$stmt->close();
$conn->close();
