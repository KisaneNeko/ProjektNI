<head>
  <title>galeria</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
   <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <link rel="stylesheet" type="text/css" href="style/lightbox.css">
  <script type="text/javascript" src="js/lightbox-2.6.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
        function initialize() {
            var map_canvas = document.getElementById('map_canvas');
            var map_options = {
                center: new google.maps.LatLng(51.2355729123819381, 22.550290000000018),
                zoom: 17,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(map_canvas, map_options)
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.php">SalKonf</a></h1>
          <h2>Rezerwuj online!</h2>
        </div>
      </div>
      <div id="menubar">
          <ul id="menu">
              <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
              <li><a href="index.php">Strona główna</a></li>
              <li><a href="index.php?action=halls">Cennik</a></li>
              <li class="selected"><a href="index.php?action=gallery">Galeria</a></li>
              <li><a href="index.php?action=reservation">Rezerwuj salę</a></li>
              <li><a href="index.php?action=rules">Regulamin</a></li>
          </ul>
      </div>
    </div>
      <div id="site_content">
          <div class="sidebar">
              <!-- insert your sidebar items here -->
              <h3>Aktualnosci:</h3>
              <h4>Dwie nowoczesne sale na 30 osob!</h4>
              <h5>20.12.2013</h5>
              <p>Dumnie ogłaszamy otwarcie dwóch nowoczesnych, klimatyzowanych sal konferencyjnych!<br /><a href="#">Sprawdz ceny!</a></p>
              <p></p>
              <h4>Nowe zasady korzystania z serwisu</h4>
              <h5>10.12.2013</h5>
              <p>W związku z dużym zainteresowaniem naszymi usługami, informujemy iż od dnia 01.01.2014 obowiązuje zasada, iż brak wpłacenia zaliczki na 14 dni przed ustaloną datą konferencji może skutkować utratą rezerwacji, za trudności przepraszamy <br /><a href="index.php?action=rules">Read more</a></p>
              <h3>Strony internetowe partnerów</h3>
              <ul>
                  <li><a href="http://www.g-katering.pl/">współpracująca firma kateringowa</a></li>
                  <li><a href="http://www.polskibus.com/">transport z lotniska</a></li>
              </ul>
              <h3>Znajdź nas na mapie!</h3>
              <div id="map_canvas">
              </div>
          </div>
          <h1>GALERIA</h1>
          <div class="gallery">
                <ul>
                    <li>
                        <a href="pictures/1.jpg" rel="lightbox[gallery]" target="_blank" class="thumb"><img src="pictures/1.jpg" alt=""></a>
                        <a href="" class="title">Sala numer 1</a>
                    </li>
                    <li>
                        <a href="pictures/2.jpg" rel='lightbox[gallery]' target="_blank" class="thumb"><img src="pictures/2.jpg" alt=""></a>
                        <a href="" class="title">Sala numer 2</a>
                    </li>
                    <li>
                        <a href="pictures/3.jpg" rel='lightbox[gallery]' target="_blank" class="thumb"><img src="pictures/3.jpg" alt=""></a>
                        <a href="" class="title">Sala numer 3</a>
                    </li>
                    <li>
                        <a href="pictures/4.jpg" rel='lightbox[gallery]' target="_blank" class="thumb"><img src="pictures/4.jpg" alt=""></a>
                        <a href="" class="title">Sala numer 4</a>
                    </li>
                    <li>
                        <a href="pictures/5.jpg" rel='lightbox[gallery]' target="_blank" class="thumb"><img src="pictures/5.jpg" alt=""></a>
                        <a href="" class="title">Sala numer 5</a>
                    </li>
                    <li>
                        <a href="pictures/6.jpg" rel='lightbox[gallery]' target="_blank" class="thumb"><img src="pictures/6.jpg" alt=""></a>
                        <a href="" class="title">Sala numer 6</a>
                    </li>
                </ul>


          </div>



      </div>
    <div id="footer">
        Copyright  <?php if($_SESSION['logged']==0){ ?><a href="index.php?action=logging">Zaloguj się</a><?php } else { ?><a href="index.php?action=adminPanel">Panel admina</a> <a href="index.php?action=gallery&amp;option=logout"> Wyloguj</a> <?php } ?>
    </div>
  </div>
</body>

