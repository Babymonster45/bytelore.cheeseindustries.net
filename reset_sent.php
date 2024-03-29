<?php
// Start a session to manage user login state
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
    <title>Username/Password Reset Email Sent</title>
    <link rel="stylesheet" href="verification.css">
</head>

<body><br>
    <header>
        <h1>Username/Password Reset Email Sent</h1>
    </header>
    <div>
        <?php include('header.php'); ?>
    </div><br>
    <main>
        <form>
            <h4>
                <p>A Username/Password reset email has been sent to your provided email address.</p>
                <p>Please check your inbox (and spam/junk folder) for the verification email.</p>
                <p>Click the link in the email to verify your account.</p>
            </h4>
        </form>
    </main>
</body>

</html>