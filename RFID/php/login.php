<?php
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once 'db_connect.php';

   
    $userId = $_POST['userId'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    
    $sql = "SELECT * FROM users WHERE (userId = '$userId' OR username = '$username') AND password = '$password' AND role = '$role'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // User authenticated, set session variables
        $_SESSION['userId'] = $userId;
        $_SESSION['role'] = $role;

        // Redirect to dashboard page
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials, redirect back to login page with error message
        $_SESSION['login_error'] = "Invalid username, password, or role.";
        header("Location: login.html");
        exit();
    }
} else {
    // If accessed directly, redirect to login page
    header("Location: login.html");
    exit();
}
?>
