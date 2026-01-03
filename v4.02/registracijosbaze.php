<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'comment';
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Prisijungimo klaida: " . $conn->connect_error);
}

$vardas = isset($_POST['vardas']) ? $_POST['vardas'] : '';
$pavarde = isset($_POST['pavarde']) ? $_POST['pavarde'] : '';
if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    echo "El. pašto adresas nebuvo gautas.";
}

if (isset($_POST['slaptazodis'])) {
    $slaptazodis = password_hash($_POST['slaptazodis'], PASSWORD_BCRYPT);

} else {
    echo "Slaptažodis nebuvo gautas.";
}
$useris = isset($_POST['useris']) ? $_POST['useris'] : '';

$stmt = $conn->prepare("INSERT INTO users (vardas, pavarde, email, slaptazodis, useris) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $vardas, $pavarde, $email, $slaptazodis, $useris);

if ($stmt->execute()) {
    header("Location: registracijapavyko.php");
    exit;
} else {
    header("Location: registracijanepavyko.html");
    exit;
}

$stmt->close();
$conn->close();
?>