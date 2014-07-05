<head>
    <title>Pokaż rezerwacje</title>
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
        <?php  $update = isset($_SESSION['update']) ? $_SESSION['update']: '';
                if($update){
        ?>
            <h1>REZERWACJA ZMIENIONA</h1>
        <?php $_SESSION['update']=false;}?>
        <?php  $delete = isset($_SESSION['delete']) ? $_SESSION['delete']: '';
        if($delete){
            ?>
            <h1>REZERWACJA USUNIETA</h1>
        <?php $_SESSION['delete']=false;}?>

        <h1> Wszystkie rezerwacje:</h1>
        <?php if($data){ ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Created At</th>
                    <th>Hall number</th>
                    <th>reserved from</th>
                    <th>reserved to</th>
                    <th>paid</th>
                    <th>show details</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                <?php foreach($data as $rows) { ?>
                <tr>
                    <?php foreach($rows as $key => $val){ ?>
                        <td><?php echo $val ?></td>
                    <?php } ?>
                    <td><a href="index.php?action=adminPanel&amp;id=<?php echo $rows['id'] ?>&amp;subaction=details"><img src="pictures/details.jpg" alt="edit"></a></td>
                    <td><a href="index.php?action=adminPanel&amp;id=<?php echo $rows['id'] ?>&amp;subaction=edit"><img src="pictures/edit.jpg" alt="edit"></a></td>
                    <td><a href="index.php?action=adminPanel&amp;id=<?php echo $rows['id'] ?>&amp;subaction=delete"><img src="pictures/delete.jpg" alt="edit"></a></td>
                </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
        <h1>brak rezerwacji!</h1>
        <?php } ?>

    </div>
    <div id="footer">
        Copyright  <?php if($_SESSION['logged']==0){ ?><a href="index.php?action=logging">Zaloguj się</a><?php } else { ?><a href="index.php?action=adminPanel">Panel admina</a> <a href="index.php?option=logout"> Wyloguj</a> <?php } ?>
    </div>
</div>
</body>

