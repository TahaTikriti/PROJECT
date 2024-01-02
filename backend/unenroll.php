
<?php
session_start();

include 'connection.php'; // Your database connection script

if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
exit;
}

$user_id = $_SESSION['user_id'];
$course_id = $_POST['course_id']; // Get course_id from POST data

$sql = "DELETE FROM enrollments WHERE course_id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $course_id, $user_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
echo json_encode(['status' => 'success']);
} else {
echo json_encode(['status' => 'error', 'message' => 'Unenrollment failed']);
}

$stmt->close();
$conn->close();