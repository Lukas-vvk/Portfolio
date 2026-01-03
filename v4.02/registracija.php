<!DOCTYPE html>
<html lang="lt">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Baltų Mitologijos svetainė.">
    <meta name="keywords" content="Baltų Mitologija, ">
    <meta name="author" content="Viktorija Lukas Ronaldas">

    <title>Registracija</title>

    <link rel="stylesheet" href="account_style.css">
    <link rel="stylesheet" href="darkmode.css">
    <link rel="stylesheet" href="header_nav_style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
</head>

<body>
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
                        <a class="nav-link active" aria-current="page" href="index.php">Pradžia</a>
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
<main class="main_page" lang="en">
    <br>
    <div class="login-cont container mt-5" id="signInForm">

        <div class="hello-msg text-center">
                <h1 class="logh1">Sveiki atvykę!</h1>
                <h3 class="sign-in-text mb-4">Galite susikurti naują paskyrą</h3>
                Jau turitę paskyrą?
                <a href="prisijungti.php" id="signUpLink">Prisijunkite</a></span>
        </div>
        <br>
        <form id="registrationForm" action="registracijosbaze.php" method="post">    
            <label for="vardas">Vardas:</label>
            <input type="text" id="vardas" name="vardas" required pattern="[A-Za-z]{3,}">

            <label for="pavarde">Pavardė:</label>
            <input type="text" id="pavarde" name="pavarde" required pattern="[A-Za-z]{3,}">

            <label for="email">E-pašto adresas:</label>
            <input type="email" id="email" name="email" required>

            <label for="slaptazodis">Slaptažodis:</label>
            <input type="password" id="slaptazodis" name="slaptazodis" required minlength="8">
            
            <label for="useris">Jūsų vardas svetainėje:</label>
            <input type="text" id="useris" name="useris" required pattern="[A-Za-z]{3,}">

            <button class="btn-new" type="submit" onclick="Tikrinti()">Sukurti paskyrą</button>

            <p id="CIA"></p>
        </form>
    </div>
</main>

<script>
    function Tikrinti() {
        var vardas = document.getElementById('vardas').value;
        var pavarde = document.getElementById('pavarde').value;
        var email = document.getElementById('email').value;
        var slapt = document.getElementById('slaptazodis').value;
        var useris = document.getElementById('useris').value;
        var resultMessage = document.getElementById('CIA');

        if (vardas.length < 3 || !/^[A-Za-z]+$/.test(vardas)) {
            resultMessage.innerHTML = 'Naudotojo vardas netinkamas.';
} 
             else if (pavarde.length < 3 || !/^[A-Za-z]+$/.test(pavarde)) {
            resultMessage.innerHTML = 'Naudotojo pavardė netinkamas.';
        } 
       
        else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            resultMessage.innerHTML = 'Neteisingas el. pašto adresas.';
        } 
        else if (slapt.length < 8) {
            resultMessage.innerHTML = 'Slaptažodis turi būti bent 8 simbolių.';
        } 
         else if (useris.length < 3 || !/^[A-Za-z]+$/.test(useris)) {
            resultMessage.innerHTML = 'Svetainės vardas netinkamas.';
        } 
        else {
            resultMessage.innerHTML = 'Duomenys įvesti teisingai. Sveikinu prisiregistravus';
        }
    }
    
</script>
<br>
<br>

    <footer class="mainend">
        <ul>
            <li><strong>&reg; Lukas Žukauskas - Viktorija Denisevičiūtė - Ronaldas Laurinėnas</strong></li><br>
            <li>Piešinukai ir Logo - Elzė Svirnelytė</li><br>
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
