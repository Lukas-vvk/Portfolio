<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: account.php");
    exit;
}

if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    header("Location: account.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_name'])) {
    // Get the new display name from the form
    $new_display_name = trim($_POST['new_display_name']);

    // Server-side validation
    $conn = mysqli_connect("localhost", "itech032", "vYwqL%qr4khg", "itech032");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $error = validateDisplayName($new_display_name,$conn);

    // If there are no validation errors, proceed with updating the display name
    if (empty($error)) {
        $user_id = $_SESSION['user_id'];
        $sql = "UPDATE users SET display_name = ? WHERE user_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "si", $new_display_name, $user_id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Update the display name in the session
            $_SESSION['display_name'] = $new_display_name;

            // Provide feedback to the user
            $message = "Display name updated successfully!";
        } else {
            $error = "Failed to update display name.";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}

function validateDisplayName($display_name, $conn) {
    $error = null;

    // Check if the display name is empty or too long/short
    if (empty($display_name)) {
        $error = "Display name cannot be empty.";
    } elseif (strlen($display_name) < 3 || strlen($display_name) > 20) {
        $error = "Display name must be between 3 and 20 characters.";
    } elseif (preg_match('/\s/', $display_name)) {
        $error = "Display name cannot contain whitespace.";
    } else {
        // Check if the display name already exists in the database
        $sql = "SELECT * FROM users WHERE display_name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $display_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $error = "Display name already exists. Please choose a different one.";
        }
    }
    return $error;
}


if (isset($_POST['change_password'])) {
    // Connect to the database 
    $conn = mysqli_connect("localhost", "itech032", "vYwqL%qr4khg", "itech032"); 
    if (!$conn) { 
        die("Connection failed: " . mysqli_connect_error()); 
    } 
    
    // Prepare and bind the SQL statement to retrieve the current password
    $stmt = mysqli_prepare($conn, "SELECT password FROM users WHERE user_id = ?"); 
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']); 
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $current_password);
    mysqli_stmt_fetch($stmt);
    
    // Close the statement
    mysqli_stmt_close($stmt);

    // Verify the old password against the one retrieved from the database
    if (password_verify($_POST['old_psw'], $current_password)) {
        // New password validation
        $new_password = $_POST['psw'];
        
        $error = validatePassword($new_password, $conn);
        if (empty($error)) {
                    // Update the password in the database
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            
            $user_id = $_SESSION['user_id'];
            $sql = "UPDATE users SET password = ? WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            
            if (!$stmt) {
                die("Prepare failed: " . mysqli_error($conn));
            }

            mysqli_stmt_bind_param($stmt, "si", $new_password_hash, $user_id);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                // Provide feedback to the user
                $message = "Password updated successfully!";
            } else {
                $error = "Failed to update password: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        }
    } 
    else {
        // Old password is incorrect, set an error message
        $error = 'Incorrect old password';
    }

    mysqli_close($conn);
}

function validatePassword($password, $conn){
    $error = null;
    
    if (empty($password)) {
        $error = "Password cannot be empty.";
    } elseif (strlen($password) < 3 || strlen($password) > 30) {
        $error = "Password must be between 3 and 30 characters.";
    } elseif (preg_match('/\s/', $password)) {
        $error = "Password cannot contain whitespace.";
    }
    if (strpos($password, '\\') !== false) {
        $error = "Password cannot contain '\\'.";
    }
    return $error;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="The unofficial wiki of Fistful of Frags - multiplayer first-person shooter game set in the American Wild West during the late 19th century">
    <meta name="keywords" content="Fistful of Frags, FPS, game, steam, first person, shooter, cow-boy, western, revolvers, blackpowder, american wild west, late 19th century">
    <meta name="author" content="Karolis Stasiulionis">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Account | Fistful Of Frags Wiki</title>
    <link rel="icon" type="image/x-icon" href="media/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="account.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <nav id="navbar" class="navbar sticky-top navbar-dark navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand col-lg-2 col-md-4">
                <img src="media/logo1.png" alt="Logo" class="logo">
                <a href="index.html" class="title">Fistful Of Frags</a>
            </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon ms"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="col d-flex justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item pe-2 ps-2">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item dropdown pe-2 ps-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Guns
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="weapons.php">Weapons</a></li>
                        <li><a class="dropdown-item" href="pistols.php">Pistols</a></li>
                        <li><a class="dropdown-item" href="#">Rifles</a></li>
                        <li><a class="dropdown-item" href="#">Shotguns</a></li>
                        <li><a class="dropdown-item" href="#">Meele</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pe-2 ps-2">
                        <a class="nav-link" href="maps.php">Maps</a>
                    </li>
                    <li class="nav-item pe-2 ps-2">
                        <a class="nav-link" href="#">Game Modes</a>
                    </li>
                    <li class="nav-tem pe-2 ps-2">
                        
                    </li>
                </ul>
            </div>
          </div>

        <button onclick="toggleDarkMode()" class="btn btn-outline-light ps-2 pe-2">
            <i id="darkModeIcon" class="fas fa-sun fa-lg"></i>
        </button>

        <div class="col col-lg-2 col-md-4 ms-2">
            <form class="d-flex" onsubmit="event.preventDefault(); search()">
                <input class="form-control me-2" type="search" placeholder="Search" id="searchInput" aria-label="Search">
                <button class="btn btn-outline-light ps-2 pe-2" type="submit">
                    <i class="fas fa-search fa-lg"></i> 
                </button>
            </form>
        </div>

        <script async src="https://cse.google.com/cse.js?cx=840396f951f874363">
        </script>

        <!-- <div class="col col-lg-2 col-md-4 ms-2">
                <div class="gcse-search"></div>
        </div> -->

        <a href="#" class="active" aria-current="page">
            <button class="btn btn-outline-light ms-2 ps-2 pe-2">
                <i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
            </button>
        </a>

        
        
</nav>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<main class="main_page" lang="en">
    <br>
    <div class="login-cont container mt-5" id="myAccountForm">
    <div class="hello-msg text-center">
        <h2>Welcome Back, <strong><?php echo isset($_SESSION['display_name']) ? $_SESSION['display_name'] : ''; ?></strong></h2>
        <br><br>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php elseif (isset($message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <button class="btn-new" id="changeNameBtn">Change Display Name</button>

        <!-- Change Display Name Form -->
        <div class="container mt-3" id="nameForm" style="display: none;">
            <form action="" method="post">
                <label for="new_display_name">New Display Name:</label>
                <input type="text" placeholder="Enter new display name" id="new_display_name" name="new_display_name" required>
                <br>
                <button class="btn-new" type="submit" name="change_name" style="background-color: rgb(200,10,10) !important;" >Save</button>
            </form>
        </div>

        <button class="btn-new" id="changePasswordBtn">Update password</button>
        <!-- Update password Form -->
        <div class="container mt-3" id="passwordForm" style="display: none;">
            <form action="" method="post">
                <label for="old_password">Old password:</label>
                <input type="password" placeholder="Enter your old password" id="old_password" name="old_psw" required>
                <br>
                <label for="psw">New password:</label>
                <input type="password" placeholder="Enter new password" id="password" name="psw" required>
                <label for="psw">Confirm password:</label>
                <input type="password" placeholder="Repeat new password" id="confirm_password" name="psw" required>
                <br>
                <button class="btn-new" type="submit" name="change_password" style="background-color: rgb(200,10,10) !important;" >Save</button>
            </form>
        </div>

    </div>
    <form method="post">
        <button class="btn-new" type="submit" name="logout">Log out</button>
    </form>

    <form action="deleteAccount.php" method="post">
        <button class = "btn-new mb-2" type="submit" name="delete_account" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">Delete Account</button>
    </form>

</div>

<div class="modal fade" id="searchResultsModal" tabindex="-1" aria-labelledby="searchResultsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchResultsModalLabel">Search Results</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="searchDetails" class="modal-footer">
                    <!-- Search details will be displayed here -->
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Search results will be displayed here -->
                </div>
            </div>
        </div>
    </div>

    
    <br><br>

</main>

<br>
<br>

<footer class="foot1 container-fluid">
    <div class="row text-center pt-3">
        <p>The unofficial Fistful Of Frags wiki</p>
        <p>Karolis Stasiulionis</p>
    </div>
</footer>

    <script src="script.js"></script>

    <script src="https://kit.fontawesome.com/6ec9c7cfba.js" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
