<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo "Norėdami ištrinti komentarą, turite būti prisijungę";
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

$commentId = $_POST['comment_id'];

// Delete the comment itself
$sql = "SELECT user_id FROM user_comments WHERE id = '$commentId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['user_id'] == $userId || $is_admin) {
        $sql_delete_comment = "DELETE FROM user_comments WHERE id = '$commentId'";
        if ($conn->query($sql_delete_comment) === TRUE) {
            echo "Comment deleted successfully";
        } else {
            echo "Error deleting comment: " . $conn->error;
        }
    } else {
        http_response_code(403);
        echo "Norėdami ištrinti komentarą, turite būti prisijungę";
    }
}

// Delete the replies associated with the comment
$sql_delete_replies = "DELETE FROM user_replies WHERE comment_id IN (SELECT id FROM user_comments WHERE id = '$commentId')";
if ($conn->query($sql_delete_replies) === TRUE) {
    
}

$conn->close();
?>
