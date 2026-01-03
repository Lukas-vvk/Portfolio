<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: prisijungti.php');
    exit();
}

if(isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if ($new_password !== $confirm_password) {
        echo "Naujas slaptažodis nesutampa su patvirtinimu.";
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
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($old_password, $row['slaptazodis'])) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_sql = "UPDATE users SET slaptazodis='$hashed_password' WHERE id='$user_id'";
            if ($conn->query($update_sql) === TRUE) {
                echo "Slaptažodis sėkmingai pakeistas.";
            } else {
                echo "Nepavyko pakeisti slaptažodžio: " . $conn->error;
            }
        } else {
            echo "Dabartinis slaptažodis yra neteisingas.";
        }
    } else {
        echo "Nepavyko gauti vartotojo duomenų.";
    }
    $conn->close();
} else {
    echo "Prašome užpildyti visus laukus.";
}
?>
