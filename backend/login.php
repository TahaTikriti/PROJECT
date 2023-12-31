<?php
include('connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (
    isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['password']) && !empty($_POST['password'])
) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on user role
        if ($_SESSION['role'] === 'admin') {
            header("Location: admin/dashboard.php");
        } elseif ($_SESSION['role'] === 'student') {
            header("Location:../frontend/index.html");
        } else {
            // Handle other roles or redirect to a default location
            header("Location: ../frontend/index.html");
        }
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
