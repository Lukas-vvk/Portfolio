<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $comment_id = $_GET['id'];

    $sql = "DELETE FROM user_comments WHERE id = $comment_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin_comments.php");
        exit();
    }
} 
?>
