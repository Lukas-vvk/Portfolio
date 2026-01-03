<?php
session_start();
echo "User ID: " . $_SESSION['user_id'];
$neveiklumo_laikas = 1800; // 30 min
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $neveiklumo_laikas) {
    session_unset();
    session_destroy();
}

$_SESSION['last_activity'] = time();
?>
<!DOCTYPE html>
<html lang="lt">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Baltų Mitologijos svetainė.">
    <meta name="keywords" content="Baltų Mitologija, ">
    <meta name="author" content="Viktorija Lukas Ronaldas">

    <title>Maumukas Baubukas</title>

    <link rel="stylesheet" href="index_style.css">
    <link rel="stylesheet" href="comments.css">
    <link rel="stylesheet" href="darkmode.css">
    <link rel="stylesheet" href="header_nav_style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
</head>

<body data-user-id="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
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

        <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ? 'profilis.php' : 'prisijungti.php'; ?>">
                <button class="btn btn-outline-light btn-custom-height ms-2 ps-2 pe-2">
                    <i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
                </button>
        </a>
</nav>

<div class="background"></div>  
    <section class="introduction">
        <h2>Sveiki atvykę į neoficialią Baltų mitologijos wiki</h2>
        <br>
        <p>Sveiki gyvi! Patekote į mūsų Maumukų ir Baubukų pasaulį!</p>
        <p> Čia mes kuriame ir dalinamės įdomia informacija apie įvairius baltų mitologijos padarėlius, būtybęs, legendas, meną ir kultūrą.
            Galite ne tik daug sužinoti, bet ir pasidalinti mintimis su kitais susikūrus paskyrą.
            Galėsite komentuoti bei pradėti arba prisidėti prie diskusijų.</p>
        <br>

    </section>    
    <section class="baneris1">
        <h1>MAUMAS ir BABAUŠIS</h1>
        <p>Padarėlių dizainai iš "Kaukučiai ir Varinis Šernas" ir "Kaukų šeimynėlė" knygų</p>
        <p><img src="media/images/animacija.gif" width="1000" alt="AnimuotasBaneris"></p>
        <a href="gallery.php" class="baneris-m">Keliaukite į padarėlių galeriją</a>
    </section>

    <div class="main1 col-lg-5 col-md-6">
        <h3><b>Populiarūs puslapiai</b></h3>
    </div>
    <br>

    <div class="container-fluid">
        <div class="categor row text-center d-flex align-items-center">
            <div class="col">
                <a href="gallery.php" class="button-link">
                    <div class="cat-container">
                        <img src="media/images/char14.jpg" alt="Galerija">
                        <div class="text-overlay">Galerija</div>
                    </div>
                </a>
            </div>
            <div class="col">
                <div class="cat-container">
                    <a href="third_page.php" class="button-link">
                        <img src="media/images/char0.jpg" alt="Panteonas">
                        <div class="text-overlay">Panteonas</div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="cat-container">
                    <a href="second_page.php" class="button-link">
                        <img src="media/images/char13.jpg" alt="Simboliai">
                        <div class="text-overlay">Simboliai</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <br>
    <br>
    <div class="main2 col-lg-5 col-md-6 col-sm-12 offset-lg-7 offset-md-6">
        <h3><b>Komentarai</b></h3>
    </div>
    <br>

    <div class="container-com">
    <form id="comment-form">
    <input type="hidden" id="page-identifier" name="page_identifier" value="page_2" title="page2">
        <textarea id="comment-text" placeholder="Parašyk savo komentarą"></textarea>
        <button type="submit" class="comment-btn">Komentuoti</button>
    </form>
    <div id="comments-container">
        <!-- Comments will be displayed here -->
    </div>
</div>

    <br>
    <br>
    <br>

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