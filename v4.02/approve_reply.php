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

    $sql = "UPDATE user_replies SET approved = 1 WHERE id = $reply_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin_comments.php");
        exit();
    } else {
        echo "Error approving record: " . $conn->error;
    }
}
?>
