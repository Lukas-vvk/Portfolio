<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo "Norėdami ištrinti atsakymą, turite būti prisijungę";
    exit();
}

$is_admin = false;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'];

$sql = "SELECT * FROM admins WHERE id = '$userId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $is_admin = true;
}

$replyId = $_POST['reply_id'];

$sql = "SELECT user_id FROM user_replies WHERE id = '$replyId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['user_id'] == $userId || $is_admin) {
        $sql_delete = "DELETE FROM user_replies WHERE id = '$replyId'";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Reply deleted successfully";
        } else {
            echo "Error: " . $sql_delete . "<br>" . $conn->error;
        }
    } else {
        http_response_code(403);
        echo "Norėdami ištrinti atsakymą, turite būti prisijungę";
    }
}

$conn->close();
?>
