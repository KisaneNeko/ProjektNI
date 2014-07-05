<head>
    <title>Panel Administratora</title>
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
                <li><a href="index.php?action=gallery">Galeria</a></li>
                <li><a href="index.php?action=reservation">Rezerwuj salę</a></li>
                <li><a href="index.php?action=rules">Regulamin</a></li>
            </ul>
        </div>
    </div>
    <div id="site_content">
        <h1> Panel Admina: </h1>
        <p><span><a href="index.php?action=adminPanel&amp;subaction=show"> Pokaż rezerwacje </a></span></p>

    </div>
    <div id="footer">
        Copyright  <?php if($_SESSION['logged']==0){ ?><a href="index.php?action=logging">Zaloguj się</a><?php } else { ?><a href="index.php?action=adminPanel">Panel admina</a> <a href="index.php?option=logout"> Wyloguj</a> <?php } ?>
    </div>
</div>
</body>

