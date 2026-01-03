<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401); 
    echo "Norėdami komentuoti, turite būti prisijungę";
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

$reply_text = $_POST['reply_text'];
$comment_id = $_POST['comment_id'];
$user_id = $_SESSION['user_id']; 

$sql = "INSERT INTO user_replies (reply_text, comment_id, user_id, approved) VALUES ('$reply_text', '$comment_id', '$user_id', 0)";

if ($conn->query($sql) === TRUE) {
    echo "Reply added successfully";
}

$conn->close();
?>
