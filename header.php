<?php
// Includes the authentication script to make sure the user is not logged in
include('not_logged_in_check.php');

// Start a session to manage user login state
session_start();

// Check if the user is already logged in
if (isset($_SESSION["user_id"])) {
    header("Location: /");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ByteLore</title>
    <link rel="stylesheet" href="header.css">
</head>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="games_list.php">Games List</a></li>

            <?php
            // Check if the user is logged in and display appropriate buttons
            if (isset($_SESSION["user_id"])) {
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li><a href="login.php">Login</a></li>';
                echo '<li><a href="signup.php">Sign Up</a></li>';
            }
            ?>
        </ul>
    </nav>
</html>
