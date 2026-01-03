<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prisijungimo forma</title>
    <script src="perkrauti.js"></script>
</head>
<body>
    
</body>
</html>
<?php
session_start();
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'comment';
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Nepavyko prisijungti prie duomenų bazės: " . $conn->connect_error);
    } else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['slaptazodis'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['logged_in'] = true;
                echo '<script>perkrauti();</script>';
                echo "Prisijungimas sėkmingas. Peradresuojama į index.php po 2 sekundžių...";
            } else {
                echo '<script>perkrauti();</script>';
                echo "Netinkamas slaptažodis. Peradresuojama į index.php po 2 sekundžių...";
            }
        } else {
            echo '<script>perkrauti();</script>';
            echo "Vartotojas su įvestu el. paštu nerastas. Peradresuojama į index.php po 2 sekundžių...";
        }
        $conn->close();
    }
} else {
    echo "Prašome įvesti el. paštą ir slaptažodį.";
}

?>
