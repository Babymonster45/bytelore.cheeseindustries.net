<?php
// Checks if the user tagged remember me
include('remember_me.php');

// Start a session to manage user login state
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Establish a database connection
include('/secure_config/config.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the search form is submitted
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Construct a SQL query to search for titles
    $sql = "SELECT title, id FROM user_pages WHERE title LIKE ? ORDER BY title ASC";
    $stmt = $conn->prepare($sql);

    // Use "%" to allow searching for titles that contain the search term
    $searchTerm = '%' . $searchTerm . '%';

    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pages = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $pages = array();
    }
} else {
    // If no search is performed, show all pages
    $sql = "SELECT title, id FROM user_pages ORDER BY title ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $pages = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $pages = array();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games List</title>
    <link rel="stylesheet" href="/games_list.css">
</head>
<body>
    <header>
        <h1>Games List</h1>
    </header>
    <div class="subheader">
        <?php include('header.php'); ?>
    </div>
    <div class="search-container">
        <form method="get" action="games_list.php">
            <label for="search">Search by title:</label>
            <input type="text" id="search" name="search" placeholder="Search for a game">
            <button type="submit">Search</button>
        </form>
    </div>

    <main>
        <ul>
            <?php foreach ($pages as $page): ?>
              <li><a class="button" href="view_page.php?id=<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
         <?php endforeach; ?>
        </ul>
    </main>
</body>
</html>
