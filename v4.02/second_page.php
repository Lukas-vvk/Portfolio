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

    <title>Simboliai</title>

    <link rel="stylesheet" href="second_style.css">
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

        <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ? 'profilis.php' : 'prisijungti.php'; ?>">
                <button class="btn btn-outline-light btn-custom-height ms-2 ps-2 pe-2">
                    <i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
                </button>
        </a>
</nav>

<main class="main_page container mt-5 mb-5" lang="en">
  <div class="row">
    <div class="main col-lg-9 col-md-9 border">
        <div class="row align-items-center mt-3 mb-4">
            <div class="col">
                <h1>Simboliai</h1>  
            </div>
        </div>

        <hr class="map-hr"/>
        <h3><strong>Spalvos</strong></h3>
        <hr class="map-hr"/>
<p>
Senovės baltų spalvų suvokimas atspindėjo gilias jų pasaulėžiūros bei kultūrinių įsitikinimų šaknis. Spalvų naudojimas turėjo svarbų simbolinį ir ritualinį aspektą, siejamas su gamtos reiškiniais, religinėmis ceremonijomis ir mitinėmis įvykių interpretacijomis. Jos ne tik atspindėjo bendruomenės kasdienybę, bet ir buvo naudojamos siekiant pažymėti svarbius gyvenimo etapus bei komunikuoti su dievybėmis.
</p>
<table class="table table-hover custom-table">
  <thead>
    <tr>
      <th scope="col" class="table-head" style="width: 50%;">Spalva</th>
      <th scope="col" class="table-head" style="width: 50%;">Reikšmė</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Geltona</td>
      <td>Siela, saulė, šiluma, ugnis</td>
    </tr>
    <tr>
      <td>Žalia</td>
      <td>Žemė, gyvybė, žmogus</td>
    </tr>
    <tr>
      <td>Raudona</td>
      <td>Požemis, pilnatis, galimybė, kraujas</td>
    </tr>
    <tr>
      <td>Mėlyna</td>
      <td>Dangus, mėnulis, meilė, molis</td>
    </tr>
    <tr>
      <td>Juoda</td>
      <td>Begalybė, tamsa, pavojus, mirtis</td>
    </tr>
    <tr>
      <td>Balta</td>
      <td>Gyvenimas, priešprieša, atvirkščia</td>
    </tr>
  </tbody>
</table>

        <hr class="map-hr"/>
        <h3><strong>Ornamentai</strong></h3>
        <hr class="map-hr"/>


      <img loading="lazy" src="media/images/sim1.jpg" class="img-thumbnail-float" title="Simboliai1" alt="Simboliai1" data-bs-toggle="modal" data-bs-target="#simboliai1Modal">

      <div class="modal fade" id="simboliai1Modal" tabindex="-1" aria-labelledby="simboliai1ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="image-container container-fluid d-flex justify-content-center align-items-center">
                        <img loading="lazy" src="media/images/sim1.jpg" class="modalImg img-fluid">
                    </div>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
      </div>
        <a class="headline_link" href="#"><h4 class="headline ps-2" title="Simboliai1">Baltų ženklai, simboliai ir reikšmės</h4></a>
        <p>Baltų ženklai ir simboliai yra unikalus kultūros paveldas, glaudžiai susijęs su senovės baltų gyvenimo būdu, tikėjimais ir kosmologija. Šie ženklai atspindi tūkstantmečių perduodamas žinias, tradicijas ir vertybes, kurios buvo naudojamos ne tik kaip apsaugos ir sėkmės talismanai, bet ir kaip gyvenimo bei pasaulio tvarkos atspindžiai.</p>
        <p>
        Baltų simbolių pasaulis yra itin platus ir įvairus. Jie galėjo būti naudojami įvairiose srityse: nuo kasdienio gyvenimo iki sakralinių ritualų. Pavyzdžiui, Saulės ratas (saulės kryžius) simbolizavo gyvybės ir pasaulio cikliškumą, o Mėnulio simbolis – laiko tėkmę ir amžiną pasikeitimą.
        </p>
        <p>
        Dažnai baltų simboliai siejami su pagoniška tikėjimų sistema, kurioje svarbų vaidmenį užimdavo gamtos reiškiniai, dangaus kūnai, augalijos bei gyvūnijos pasaulis. Šie simboliai turėjo tiek apotropaicinę (apsaugančią) funkciją, tiek buvo naudojami siekiant palankumo iš aukštesniųjų jėgų.
        </p>
        <br>

        <img loading="lazy" src="media/images/sim5.jpg" class="img-thumbnail-float" title="Simboliai2" alt="Simboliai2" data-bs-toggle="modal" data-bs-target="#simboliai2Modal">

        <div class="modal fade" id="simboliai2Modal" tabindex="-1" aria-labelledby="simboliai2ModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="image-container container-fluid d-flex justify-content-center align-items-center">
                          <img loading="lazy" src="media/images/sim5.jpg" class="modalImg img-fluid">
                      </div>
                  </div>
                  <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
          </div>
        </div>

        <a class="headline_link" href="#"><h4 class="headline ps-2" title="Simboliai2">Ženklų Panaudojimas</h4></a>
        <p>
        Šiandien baltų ženklai ir simboliai išlieka svarbi kultūros dalis, naudojami tiek tradiciniuose amatuose, tiek šiuolaikinėje dizaino ir meno srityse. Jie gali būti matomi ant papuošalų, rūbų, taip pat naudojami interjero dekoro elementuose. Be to, šie simboliai neretai naudojami įvairiose ceremonijose ir šventėse, pavyzdžiui, saulėgrįžos ar velykų šventėse, siekiant pabrėžti ryšį su protėviais ir gamta.
        </p>
        <p>
        Pagoniškos kilmės ženklai senovės baltų tikėjimuose atliko svarbų vaidmenį, simbolizuodami gamtos reiškinius, dangaus kūnus bei augalijos ir gyvūnijos pasaulį. Jie buvo naudojami ne tik kaip apsaugos talismanai, bet ir siekiant palankumo iš aukštesniųjų jėgų, turėdami tiek apotropaicinę (apsaugančią), tiek sakralinę reikšmę.
        </p>
        <br>

      <img loading="lazy" src="media/images/sim2.png" class="img-thumbnail-float" title="Simboliai3" alt="Simboliai3" data-bs-toggle="modal" data-bs-target="#simboliai3Modal">
      <div class="modal fade" id="simboliai3Modal" tabindex="-1" aria-labelledby="simboliai3ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="image-container container-fluid d-flex justify-content-center align-items-center">
                        <img loading="lazy" src="media/images/sim2.png" class="modalImg img-fluid">
                    </div>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
      </div>

        <a class="headline_link" href="#"><h4 class="headline ps-2" title="Simboliai3">Pavidalai plokštumoje ir erdvėje</h4></a>
        <p>
<ul>
  <li><strong>Ratas:</strong> Tai vienovės ir kartu gyvybės simbolis, taip pat individualybės įvaizdis.</li>
  <li><strong>Kryžius:</strong> Dvasios (dangaus) ir materijos (moterijos, žemės, medžiagos) santykis. Tai keturių pasaulio stchijų simbolis, galintis žymėti centro tašką, visatos jėgas.</li>
  <li><strong>Medis:</strong> Tai gyvybės simbolis, tridališkumo suvokimo pavyzdys. Šaknys – požemis reiškiantis materialines stiprybes bei visų žemiškų pavojų šaltinis. Kamienas, kamieno širdis, šaknys ir karnos simbolizuoja sveikatą ir augimą.</li>
  <li><strong>Trikampis:</strong> Stogo ir viršybės simbolis, dažnai atviras į apačią ir žymi vartus (išėjimas – įėjimas). Siejamas su žemiškumu, medžiagiškumu, sujungus visatos stichijas sukuriamas visas medžiaginis pasaulis.</li>
  <li><strong>Ketvirtainis:</strong> Tai dvasinio pasaulio susijungimas su materialistiniu, tai bematės beribės erdvės virtimas į trijų matmenų ribas. Trimatė erdvė, medžiaginis pasaulis atvaizduojamas erdviniu ketvirtainiškumu – kubu.</li>
</ul>
        </p>

        <hr class="map-hr"/>
        <br>

        <div id="carouselExample" class="carousel slide container-fluid pt-3 pb-2">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="media/images/banner-sim.png" class="d-block w-100" alt="Viršelis" title="Maumukas">
          </div>
          <div class="carousel-item">
            <img src="media/images/sim3.png" class="d-block w-100" alt="Ornamentai" title="Ornamentai">
          </div>
          <div class="carousel-item">
            <img src="media/images/sim4.png" class="d-block w-100" alt="Simboliai" title="Simboliai">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        <div id="carouselReadout" class="carousel-readout text-center"></div>
    </div>


</div>

    <div class="side col col-lg-3 col-md-3 border">
        <div class="sticky-top">
            <div class="sticky-wrapper container text-center pt-4">
                <br>
                <br>
                <br>
                <h2>Dažnai lankomi puslapiai</h2>
                <hr class="map-hr"/>
            </div>

            <ul class="popularList">
                <li>
                    <a class="popularList-item" href="gallery.php" title="Galerija">
                        <img class="popular_p_img" src="media/images/char23t.png" alt="Galerija" loading="lazy">
                        Galerija
                    </a>
                </li>
                <li>
                    <a class="popularList-item" href="third_page.php" title="Panteonas">
                        <img class="popular_p_img" src="media/images/char24t.png" alt="Panteonas" loading="lazy">
                        Panteonas
                    </a>
                </li>
                <li>
                    <a class="popularList-item" href="second_page.php" title="Simboliai">
                        <img class="popular_p_img" src="media/images/char25t.png" alt="Simboliai" loading="lazy">
                        Simboliai
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </div>
</main>
<br>


<br><br>

    <footer class="mainend">
        <ul>
            <li><strong>&reg; Lukas Žukauskas</strong></li><br>
            <li>MAUMAS IR BABAUŠIS</li>
        </ul>
    </footer>

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="https://kit.fontawesome.com/6ec9c7cfba.js" crossorigin="anonymous"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
