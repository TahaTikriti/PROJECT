<?php
session_start();

if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header('Location: ../frontend/login.html');
    exit;
}

include 'connection.php';

$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM enrollments WHERE course_id = ? AND user_id = ?");
$stmt->bind_param("ii", $course_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User is already enrolled in the course
    $_SESSION['message'] = 'You are already enrolled in this course.';
    header('Location: ../frontend/courses.php');
    exit;
}

$stmt = $conn->prepare("INSERT INTO enrollments (course_id, user_id, enrollment_date) VALUES (?, ?, NOW())");
$stmt->bind_param("ii", $course_id, $user_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $_SESSION['message'] = 'Enrollment successful.';
    header('Location: ../frontend/courses.php');
} else {
    $_SESSION['message'] = 'Enrollment failed.';
    header('Location: ../frontend/courses.php');
}

$stmt->close();
