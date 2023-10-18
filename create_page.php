<?php
// Establish a database connection
$conn = new mysqli("localhost", "bytelord", "Chickennuggets#11269", "bytelore");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Insert data into the database
    $sql = "INSERT INTO user_pages (title, content) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        // Get the ID of the newly created page
        $newPageID = $stmt->insert_id;

        // Close the prepared statement
        $stmt->close();

        // Close the database connection
        $conn->close();

        // Redirect the user to their new page
        header("Location: view_page.php?id=$newPageID");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection if an error occurred
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <link rel="stylesheet" href="/create_page.css">
</head>
<body>
    <h1>Create a New Page</h1>
    <form action="create_page.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" placeholder="Megaman" required>
        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="10" cols="50" placeholder="Enter text here.." required></textarea>
        <input type="submit" value="Create Page">
    </form>
    <a href="/">Home Page</a>
</body>
</html>
