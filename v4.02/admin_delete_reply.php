<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $reply_id = $_GET['id'];

    $sql = "DELETE FROM user_replies WHERE id = $reply_id";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the admin comments page
        header("Location: admin_comments.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
