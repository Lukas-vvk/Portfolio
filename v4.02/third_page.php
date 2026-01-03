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

    <title>Panteonas</title>

    <link rel="stylesheet" href="third_style.css">
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
                <h1>Baltų mitologijos Panteonas</h1>  
            </div>
        </div>

    <hr class="map-hr"/>
    <h3><strong>Dievai</strong></h3>
    <hr class="map-hr"/>

    <p>Baltų mitologijos dievų panteonas gausus ir įvairiapusis, atspindintis senovės baltų pasaulėjautą bei gyvenimo sampratą. Jame susipina gamtos, dangaus ir žemės jėgos, kiekvienas dievas atstovauja tam tikriems gyvenimo aspektams ir reiškia gamtos reiškinius bei žmonių gyvenimo būdą. Panteone galima rasti dievų, valdančių saulę, mėnulį, žemę, miškus ir vandenis, taip pat dievybių, kurios saugo žmonių likimą, ugnį, derlių ar netgi gyvulius. Šie dievai ne tik buvo šventinami ir garbinami per ritualus, bet ir atspindėjo baltų bendruomenių ryšį su gamta bei jų kultūros unikalumą.</p>

        <div class="container list_cont">
          <div class="row">
            <div class="col-lg-5">
              <h5>Viršieji dievai</h5>
              <hr class="map-hr"/>
              <ul class="list1">
                <li class="list_item">Dievas</li>
                <li class="list_item">Lada</li>
                <li class="list_item">Perkūnas</li>
                <li class="list_item">Patrimpas</li>
                <li class="list_item">Pikuolis</li>
                <li class="list_item">Ūkopirmas</li>
                <li class="list_item">Prakūrimas</li>
                <li class="list_item">Praamžius</li>
              </ul>
            </div>
            <div class="col-lg-5">
              <h5>Žemieji dievai</h5>
              <hr class="map-hr"/>
              <ul class="list1">
                <li class="list_item">Dangaus dievai ir deivės</li>
                <li class="list_item">Gimimo ir mirties deivės</li>
                <li class="list_item">Žemės dievai ir deivės</li>
                <li class="list_item">Namų dievai ir deivės</li>
                <li class="list_item">Ugnies dievai ir deivės</li>
                <li class="list_item">Miško dievai ir deivės</li>
                <li class="list_item">Bičių dievai ir deivės</li>
                <li class="list_item">Vandenų dievai ir deivės</li>
                <li class="list_item">Vėjų dievai ir deivės</li>
                <li class="list_item">Žemesnieji dievai</li>
              </ul>
            </div>
          </div>
        </div>

        <hr class="map-hr"/>
        <h3><strong>Dievų trejybė</strong></h3>
        <hr class="map-hr"/>

        <img loading="lazy" src="media/images/char21.jpg" class="img-thumbnail-float" title="char21" alt="char21" data-bs-toggle="modal" data-bs-target="#char21Modal">
    <div class="modal fade" id="char21Modal" tabindex="-1" aria-labelledby="char21ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="image-container container-fluid d-flex justify-content-center align-items-center">
                        <img loading="lazy" src="media/images/char21.jpg" class="modalImg img-fluid">
                    </div>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <img loading="lazy" src="media/images/char22.jpg" class="img-thumbnail-float" title="char22" alt="char22" data-bs-toggle="modal" data-bs-target="#char22Modal">
    <div class="modal fade" id="char22Modal" tabindex="-1" aria-labelledby="char22ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="image-container container-fluid d-flex justify-content-center align-items-center">
                        <img loading="lazy" src="media/images/char22.jpg" class="modalImg img-fluid">
                    </div>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <p></p>
    <p></p>
    <p>
    <i><strong>Perkūnas: </strong></i>atmosferos ir gamtos valdytojas. Jo žinioje neišsenkamos vandens atsargos sukauptos virš akmeninio dangaus skliauto. Šiuo vandeniu pavasarį per pirmąjį griaustinį Perkūnas, besitrankydamas dangaus skliaute, mosuodamas "dievo rykšte" - žaibais, svaidydamas akmeninius kirvukus ar strėles, apvaisina deivę Žemyną, kuri įgauna galią gimdyti vaisius.
    <br>
    <i><strong>Patrimpas: </strong></i>Dievų trejybėje stovėjęs Perkūno dešinėje pusėje, buvęs šilumos ir vaisių dievas, duodavęs pavasarį, laimę, ramybę, brandą, gausumą, globojęs gyvulius, arimą, javus. Patrimpas vaizduojamas žaliais drabužiais, varpų vainiku ant galvos. Jam aukodavę javų pėdus, mirą, gintarą, vašką ir kt.
    <br>
    <i><strong>Pikuolis: </strong></i>trečiasis baltų trejybės dievaitis. Jis susietas su mirusiųjų pasauliu, laidojimo papročiais ir apeigomis. Tai požemių, tamsos, pykčio, nelaimių dievas, buvęs labai bjaurus ir piktas dievas. Užrūstinus jį, permaldauti be kraujo buvę sunku. Vaizduojamas seniu mirtinai išbalusiu veidu, su didele žila barzda, raudonais drabužiais, galvą apsirišęs balta skara.
    <br>
    Šis dievų išdėstymas atitinka ir laiko sandarą - vasarą, rudenį, žiemą, taip pat atskirus žmogaus gyvenimo epizodus - jaunystę, brandą ir senatvę.
    </p>

        <hr class="map-hr"/>
        <h3><strong>Žemieji dievai</strong></h3>
        <hr class="map-hr"/>

    <img loading="lazy" src="media/images/char0.jpg" class="img-thumbnail-float" title="char0" alt="char0" data-bs-toggle="modal" data-bs-target="#char0Modal">
    <div class="modal fade" id="char0Modal" tabindex="-1" aria-labelledby="char0ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="image-container container-fluid d-flex justify-content-center align-items-center">
                        <img loading="lazy" src="media/images/char0.jpg" class="modalImg img-fluid">
                    </div>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <img loading="lazy" src="media/images/char1.jpg" class="img-thumbnail-float" title="char1" alt="char1" data-bs-toggle="modal" data-bs-target="#char1Modal">
    <div class="modal fade" id="char1Modal" tabindex="-1" aria-labelledby="char1ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="image-container container-fluid d-flex justify-content-center align-items-center">
                        <img loading="lazy" src="media/images/char1.jpg" class="modalImg img-fluid">
                    </div>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <p>
    Baltų mitologijoje, žemesnieji dievai ir deivės atliko svarbų vaidmenį baltų bendruomenėse. Šie dievai ir deivės dažnai buvo susiję su kasdienybės aspektais, gamtos reiškiniais ir buitine apsauga.
    <br>
    <ul class="list">
        <li><strong>Dangaus dievai ir deivės: </strong>Mitinis, Kalvis, Saulė, Mėnesis (Mėnulis), Ašvieniai, Žvaigždikis, Aušrinė, Aušra, Vakarinė, Žvorūna, Indraja, Vaivora, Žiezdrė, Sėlija, Pažarinis</li>
        <li><strong>Gimimo ir mirties deivės: </strong>Laimė (Dalia), Giltinė, Veliona, Mėnulė, Deivės valdytojos, Maro deivės</li>
        <li><strong>Žemės dievai ir deivės: </strong>Puškaitis Pergubrė Kaupolė Kaupolius Rasa Vaisgamta Jievaras Laukpatis Lauksargis Javų dvasios</li>
        <li><strong>Namų dievai ir deivės: </strong>Nonadievis, Dimstipatis, Žemyna, Žemėpatis, Pagirnis, Dirvolira, Nosolius, Slenkstinis, Mitiniai sargai, Gabjauja, Beaukuris, Javinė, Jėvulis, Dvargantis.</li>
        <li><strong>Ugnies dievai ir deivės: </strong>Gabija, Jagaubis, Užpelenė, Polengabija, Praurimė.</li>
        <li><strong>Miško dievai ir deivės: </strong>Medeina, Žvėrinė, Miško Motė, Lazdona, Kerpyčius.</li>
        <li><strong>Bičių dievai ir deivės: </strong>Bubilas, Austėja.</li>
        <li><strong>Vandenų dievai ir deivės: </strong>Gyvybės vanduo, Bangpūtys, Varūna, Gardaitis, Upinė, Upinis, Divytis, Ežerinis, Grauduša, Undinė, Jūratė, Jumpyra, Balta Boba.</li>
        <li><strong>Vėjų dievai ir deivės: </strong>Vėjų motė, Bangpūtys, Vėjopatis, Gardaitis, Vėjas, Vajas, Šiaurės Vėjas, Auštrinis Viesulas.</li>
        <li><strong>Žemesnieji dievai: </strong>Andaja, Pilnytis, Kovas, Aušlavis, Ganiklis, Keliukis, Milda, Junda, Krūminė, Nijolė.</li>
    </ul>
    </p>

    <hr class="map-hr"/>
    <br>
    
    <div id="carouselExample" class="carousel slide container-fluid pt-3 pb-2">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="media/images/1virselis.jpg" class="d-block w-100" alt="Viršelis" title="baner">
          </div>
          <div class="carousel-item">
            <img src="media/images/2puskaitis.jpg" class="d-block w-100" alt="Puškaitis" title="Puškaitis">
          </div>
          <div class="carousel-item">
            <img src="media/images/3kaukai.jpg" class="d-block w-100" alt="Kaukai" title="Kaukai">
          </div>
          <div class="carousel-item">
            <img src="media/images/4barzdukai.jpg" class="d-block w-100" alt="Barzdukai" title="Barzdukai">
          </div>
          <div class="carousel-item">
            <img src="media/images/5markopoliai.jpg" class="d-block w-100" alt="Markopoliai" title="Markopoliai">
          </div>
          <div class="carousel-item">
            <img src="media/images/6aitvaras.jpg" class="d-block w-100" alt="Aitvaras" title="Aitvaras">
          </div>
          <div class="carousel-item">
            <img src="media/images/7laume.jpg" class="d-block w-100" alt="Laumė" title="Laumė">
          </div>
          <div class="carousel-item">
            <img src="media/images/8maumas.jpg" class="d-block w-100" alt="Maumas" title="Maumas">
          </div>
          <div class="carousel-item">
            <img src="media/images/9rugutis.jpg" class="d-block w-100" alt="Rūgutis" title="Rūgutis">
          </div>
          <div class="carousel-item">
            <img src="media/images/10bubilas.jpg" class="d-block w-100" alt="Bubilas" title="Bubilas">
          </div>
          <div class="carousel-item">
            <img src="media/images/11prigirditis.jpg" class="d-block w-100" alt="Prigirditis" title="Prigirditis">
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
