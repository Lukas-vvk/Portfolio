<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401); 
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$comment = $_POST['comment'];
$user_id = $_SESSION['user_id']; 

$sql = "INSERT INTO user_comments (comment_text, user_id, approved) VALUES ('$comment', '$user_id', 0)";

if ($conn->query($sql) === TRUE) {
    echo "Comment added successfully";
}
$conn->close();
?>
