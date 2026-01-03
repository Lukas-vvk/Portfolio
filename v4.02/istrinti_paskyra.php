<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: prisijungti.php');
    exit();
}

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'comment';
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Nepavyko prisijungti prie duomenų bazės: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$is_admin = false;

$sql_admin = "DELETE FROM admins WHERE id='$user_id'";
$result_admin = $conn->query($sql_admin);
if ($conn->affected_rows > 0) {
    $is_admin = true;
} else {
    $sql_user = "DELETE FROM users WHERE id='$user_id'";
    $result_user = $conn->query($sql_user);
    if ($conn->affected_rows == 0) {
        echo "Nepavyko ištrinti vartotojo paskyros.";
        exit();
    }
}

$conn->close();
session_destroy();
header('Location: prisijungti.php');
exit();
?>
