<!DOCTYPE html>
<html lang="lt">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Baltų Mitologijos svetainė.">
    <meta name="keywords" content="Baltų Mitologija, ">
    <meta name="author" content="Viktorija Lukas Ronaldas">

    <title>Profilis</title>

    <link rel="stylesheet" href="account_style.css">
    <link rel="stylesheet" href="darkmode.css">
    <link rel="stylesheet" href="header_nav_style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">

    <script>
        function confirmDeletion() {
            return confirm('Ar tikrai norite ištrinti savo paskyrą?');
        }
    </script>
</head>

<body>
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

    $sql_admin = "SELECT * FROM admins WHERE id='$user_id'";
    $result_admin = $conn->query($sql_admin);
    if ($result_admin->num_rows == 1) {
        $is_admin = true;
        $row = $result_admin->fetch_assoc();
    } else {
        $sql_user = "SELECT * FROM users WHERE id='$user_id'";
        $result_user = $conn->query($sql_user);
        if ($result_user->num_rows == 1) {
            $row = $result_user->fetch_assoc();
        } else {
            echo "Nepavyko gauti vartotojo duomenų.";
            exit();
        }
    }

    $vardas = $row['vardas'];
    $pavarde = $row['pavarde'];
    $email = $row['email'];
    $useris = $row['useris'];
    ?>

    <nav id="navbar" class="navbar sticky-top navbar-dark navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-logo">
                <img src="media/images/logo.png" alt="Logo" class="logo">
            </div>
            <div class="navbar-brand col-lg-2 col-md-4">
            <h2><a href="index.php" class="title">MAUMAS ir BABAUŠIS</a></h2>
            </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon ms"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="col d-flex justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item pe-2 ps-2">
                        <a class="nav-link active" aria-current="page" href="#">Pradžia</a>
                    </li>
                    <li class="nav-item dropdown pe-2 ps-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mitologija
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="first_page.php">Istorija</a></li>
                        <li><a class="dropdown-item" href="second_page.php">Simboliai</a></li>
                        <li><a class="dropdown-item" href="third_page.php">Panteonas</a></li>
                        <li><a class="dropdown-item" href="fourth_page.php">Kultūra</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pe-2 ps-2">
                        <a class="nav-link" href="gallery.php">Galerija</a>
                    </li>
                    <li class="nav-tem pe-2 ps-2">
                        
                    </li>
                </ul>
            </div>
          </div>

        <button onclick="toggleDarkMode()" class="btn btn-outline-light btn-custom-height ps-2 pe-2">
            <i id="darkModeIcon" class="fas fa-sun fa-lg"></i>
        </button>

        <div class="col col-lg-2 col-md-4 ms-2">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light ps-2 pe-2" type="submit">
                    <i class="fas fa-search fa-lg"></i> 
                </button>
            </form>
        </div>
        <a href="#">
            <button class="btn btn-outline-light btn-custom-height ms-2 ps-2 pe-2">
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
    <h2>Sveiki sugrįžę, <strong><?php echo $vardas . ' ' . $pavarde; ?></strong></h2>
    <p>El. paštas: <?php echo $email; ?></p>
    <p>Useris: <?php echo $useris; ?></p>
        <br><br>

        <button class="btn-new" id="changePasswordBtn">Keisti slaptažodį</button>
        <div class="container mt-3" id="passwordForm" style="display: none;">
            <form action="keisti_slaptazodi.php" method="post">
                <label for="old_password">Dabartinis slaptažodis:</label>
                <input type="password" id="old_password" name="old_password" required><br>

                <label for="new_password">Naujas slaptažodis:</label>
                <input type="password" id="new_password" name="new_password" required minlength="8"><br>

                <label for="confirm_password">Pakartokite naują slaptažodį:</label>
                <input type="password" id="confirm_password" name="confirm_password" required minlength="8"><br>

                <button class="btn-new" type="submit">Keisti slaptažodį</button>
            </form>
        </div>

    </div>
    <form action="atsijungti.php" method="post">
        <button class="btn-new" type="submit">Atsijungti</button>
    </form>
    <form action="istrinti_paskyra.php" method="post" onsubmit="return confirmDeletion();">
        <button class = "btn-new mb-2" type="submit">Ištrinti paskyrą</button>
    </form>
    <?php if ($is_admin): ?>
        <form action="admin_comments.php" method="get">
            <button class = "btn-new mb-2" type="submit">Komentarų administravimas</button>
        </form>
    <?php endif; ?>
    <?php
    $conn->close();
    ?>
</div>
</main>

    <br><br>
    <footer class="mainend">
        <ul>
            <li><strong>&reg; Lukas Žukauskas</strong></li><br>
            <li>MAUMAS IR BABAUŠIS</li>
        </ul>
    </footer>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://kit.fontawesome.com/6ec9c7cfba.js" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
