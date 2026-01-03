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

    <title>Istorija</title>

    <link rel="stylesheet" href="first_style.css">
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
                <h1>Seniausios žinios</h1>  
            </div>
        </div>

        <table class="info-table">
            <tbody>
                <tr>
                    <th class="table-head" colspan="2">Baltų simbolika</th>
                </tr>

                <tr style="margin:auto">
                    <td colspan="2" style="padding: 0.5rem;">
                        <img loading="lazy" src="media/images/char15.jpg" class="img-thumbnail" title="Laiko juosta" alt="Laiko juosta" data-bs-toggle="modal" data-bs-target="#LaikojuostaModal">

                        <div class="modal fade" id="LaikojuostaModal" tabindex="-1" aria-labelledby="LaikojuostaModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="image-container container-fluid d-flex justify-content-center align-items-center">
                                            <img loading="lazy" src="media/images/char15.jpg" class="modalImg img-fluid">
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th class="table-head" colspan="2" style="font-size:100%;">Laiko juosta</th>
                </tr>

                <tr>
                    <td style="width: 50%;">
                        <b>Ankstyvasis neolitas</b>
                    </td>
                    <td style="width: 50%;">
                    5000–2500 m. pr. Kr.
                    </td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <b>Vidurinis ir vėlyvasis neolitas</b>
                    </td>
                    <td>
                    <br>
                    2500–1500 m. pr. Kr.
                    </td>
                </tr>

                <tr>
                    <td>
                    <br>
                        <b>Bronzos amžius</b>
                    </td>
                    <td>
                    <br>
                    1500–500 m. pr. Kr.
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>Geležies amžius</b>
                    </td>
                    <td>
                    500 m. pr. Kr. – 1 m..
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>Romos imperijos laikotarpis</b>
                    </td>
                    <td>
                    1–400 m.
                    </td>
                </tr>

                <tr>
                    <td>
                    <br>
                        <b>Ankstyvieji viduramžiai</b>
                    </td>
                    <td>
                    <br>
                        7400–1000 m.
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>Viduramžiai</b>
                    </td>
                    <td>
                    1000–1500 m.
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>Renesansas ir barokas</b>
                    </td>
                    <td>
                    1500–1800 m.
                    </td>
                </tr>

                <tr>
                    <td>
                    <br>
                        <b>XIX a. tautinis atgimimas</b>
                    </td>
                    <td>
                    <br>
                    1800–1900 m.
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>XX a. – XXI a.</b>
                    </td>
                    <td>
                    1900 m.–dabartis
                    </td>
                </tr>
            </tbody>
        </table>

        <hr class="map-hr"/>
        <h3><strong>Apibūdinimas</strong></h3>
        <hr class="map-hr"/>
        
        <p>Seniausios žinios apie baltų religiją ir mitologiją yra Tacito veikale Germania, kuriame minimi aisčiai (istoriografijoje laikomi baltų gentimi), gyvenantys prie Svebų (Baltijos) jūros, garbinantys dievų motiną, nešiojantys šernų atvaizdus kaip apsaugos priemonę.</p>
        <p>Vulfstanas (9 a.) pateikia žinių apie prūsus ir jų laidojimo papročius. Adomas Brėmenietis (11 a.) rašo, kad prūsai saugo miškus ir šaltinius nuo krikščionių, galinčių juos suteršti. Ipatijaus metraštyje (13 a.) pasakojama apie karaliaus Mindaugo slapta garbintus dievus.</p>
        <p>Jono Malalos kronikos slaviškojo vertimo intarpe (1261) yra liudijimų apie baltų dievus bei Sovijaus mitą. 13–15 a. lietuvių, latvių, prūsų tikėjimus ir papročius aprašė Vokiečių ordino kronikininkai (Oliveris Paderbornietis, Henrikas Latvis, Petras Dusburgietis, Vygandas Marburgietis).</p>
        <p>Manoma, kad su kosmogoniniu mitu buvo susiję kalendorinių švenčių apeigos, dainos, jų vaizdiniai – pasaulio medis, elnias, tiltas, mitinė būtybė Kalėda. Laikas buvo suvokiamas kaip ciklinis procesas. Pagrindinė šventė Naujieji metai (sutapdavę su Kalėdomis) atspindi archajišką laiko, kaip ciklinio proceso, suvokimą. Manoma, kad per Naujuosius metus pasaulis simboliškai atnaujinamas.</p>
        <p>Baltų mitų siužetų žinoma nedaug. Išskirtinas Sovijaus mitas, kuriuo grindžiamas mirusiųjų deginimo paprotys ir pasakojama apie jo kelionę į pragarą. Kosmogoniniai mitai apima etiologines sakmes apie pasaulio kūrimą, su kuriais buvo susijusios kalendorinės šventės ir dainos. Baltų dievai, tokie kaip Perkūnas ir Žemyna, buvo garbinami kartu su kitomis gamtos dievybėmis, o kulto vietos randamos visoje Lietuvoje ir Prūsijoje.</p>

        <hr class="map-hr"/>
        <h3><strong>Bruožai</strong></h3>
        <hr class="map-hr"/>

      <img loading="lazy" src="media/images/char5.jpg" class="img-thumbnail-float" title="Maumukai" alt="Maumukai" data-bs-toggle="modal" data-bs-target="#char5Modal">

    <div class="modal fade" id="char5Modal" tabindex="-1" aria-labelledby="char5ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="image-container container-fluid d-flex justify-content-center align-items-center">
                        <img loading="lazy" src="media/images/char5.jpg" class="modalImg img-fluid">
                    </div>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <p>
    Svarbiausi baltų mitologijos bruožai išryškėja per pagrindines semantines priešpriešas,
    kurias sudaro erdvės, laiko, socialiniai, vertinamieji pasaulio požymiai,
    palankūs ir nepalankūs žmogui. Pagal mitologijos personažų funkcijas, jų individualizacijos laipsnį
    ir svarbą žmogui skiriami keli <i><strong>baltų mitologijos lygmenys:</strong></i>
    <br>
    <ul class="list">
        <li><strong>Lygmuo: </strong>Aukščiausi dievai, kurie susiję su bendru panteonu ir mitiniais siužetais. Jie įtraukia vyriausius dievus, tokius kaip Dievas ir Perkūnas, bei mitinius siužetus, kurie atskleidžia jų savybes ir funkcijas.</li>
        <li><strong>Lygmuo: </strong>Ūkio darbų ciklų dievybės, kurios yra susijusios su žemdirbystės ir gyvulininkystės sezoniniais darbais bei apeigomis. Šio lygmens dievybės padeda reguliuoti ir palankiai nukreipti žemės ūkio veiklą.</li>
        <li><strong>Lygmuo: </strong>Abstrakčios funkcijos ir tautosakos personažai, kurie simbolizuoja tam tikras savybes arba atlieka konkrečias funkcijas. Pavyzdžiui, Laimė kaip sėkmės ir dalių deivė, Giltinė kaip mirties personifikacija.</li>
        <li><strong>Lygmuo: </strong>Mitologizuotos istorinės tradicijos pradininkai, kurie dažnai yra susiję su konkrečiais istoriniais ar mitologiniais įvykiais. Jie gali būti tam tikrų tradicijų įkūrėjai.</li>
        <li><strong>Lygmuo: </strong>Pasakų personažai ir dvasios, kurie dažnai yra susiję su gamtos reiškiniais arba tam tikromis vietomis. Jie gali būti miško, vandens, ugnies šeimininkai arba personifikuoti gamtos elementai.</li>
        <li><strong>Lygmuo: </strong>Neantropomorfizuotos dvasios, kurios dažnai yra neindividualizuotos ir simbolizuoja tam tikras gamtos arba socialines jėgas. Tai gali būti įvairios dvasios, kaip laumės, vilktakiai, arba gamtos motinos, kaip vandens ar miško motinos.</li>
        <li><strong>Lygmuo: </strong>Mitologizuotos žmogaus hipostazės, kurios apima žmogaus sielą, dvasią ir jo dalyvavimą ritualuose bei šventėse. Čia yra įvairių ritualų dalyvių, žynių, vaidilų, taip pat ritualiniai simboliai, daiktai ir šventyklos.</li>
    </ul>
    </p>

    <hr class="map-hr"/>
        <h3><strong>Baltų religijos ir mitologijos liekanos</strong></h3>
    <hr class="map-hr"/>
      
      <img loading="lazy" src="media/images/char12.jpg" class="img-thumbnail-float" title="Baltai ir pasaulio medis" alt="Baltai ir pasaulio medis" data-bs-toggle="modal" data-bs-target="#char12Modal">

    <div class="modal fade" id="char12Modal" tabindex="-1" aria-labelledby="balt0ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="image-container container-fluid d-flex justify-content-center align-items-center">
                        <img loading="lazy" src="media/images/char12.jpg" class="modalImg img-fluid">
                    </div>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <p><i><strong>Istorijos pradžia -</strong></i>
    Vokiečių ordinui apkrikštijus baltų gentis ėmė plisti krikščionybė, tačiau egzistavo ir senųjų tikėjimų liekanos. J. Długoszas (15 a.) mini lietuvių pagarbą miškams, ugniai, žalčiams, gyvatėms, mirusiųjų minėjimą, žynius, aukojimus. M. Strijkovskis, J. Lasickis (16 a.) pateikia duomenų apie ikikrikščioniškus lietuvių svarbiausius dievus ir mitines būtybes. M. Pretorijus (17 a.) veikale Prūsijos įdomybės, arba Prūsijos regykla aprašo senovės prūsų papročius, tikėjimus. Rašytiniai šaltiniai yra vėlyvi, fragmentiški, kartais nepatikimi. Svarbiausias šaltinis baltų religijai ir mitologijai rekonstruoti yra tautosaka (pasakojamoji, smulkioji, dainos), kalba (vardažodžiai, frazeologizmai), etnografija, vaizduojamasis menas, architektūra.
    Daugiau sužinoti galite paspaude <a href="https://www.vle.lt/straipsnis/baltu-religija-ir-mitologija/" target="_blank" class="link1">čia.</a>
    <br>
    <br>
    </p>

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
