<head>
  <title>Rezerwacja</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <link rel="stylesheet" type="text/css" href="style/jquery-ui-1.10.31.custom.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.31.custom.min.js"></script>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $("#reservation").validate({
                rules:{
                    hallNumber:{
                        required: true,
                        range: [1, 6]
                    },
                    reserveFrom: 'required',
                    reserveTo: 'required',
                    clientInfo:{
                        required: true,
                        rangelength: [2, 300]
                    },
                    companyInfo: {
                        required: true,
                        rangelength: [2,300]
                    },
                    tableScheme: 'required',
                    catering: 'required',
                    notes: 'range' [0, 300]

                },

                messages:{
                    hallNumber:{
                        required: "wprowadź numer sali",
                        range: "nie ma takiej sali"
                    },
                    reserveFrom: "Wprowadź datę początku rezerwacji",
                    reserveTo: "Wprowadź datę końca rezerwacji",
                    clientInfo: {
                        required: "Wprowadź swoje dane",
                        rangelength: "opis musi zawierać od 2 do 300 znaków"
                    },
                    companyInfo: {
                        required: "Rezerwujemy tylko dla firm",
                        rangelength: "opis musi zawierać od 2 do 300 znaków"
                    },
                    tableScheme: "Wybierz rozstawienie stołów",
                    catering: "Wybierz czy chcesz zamówić katering",
                    notes: 'range' [0, 300]
                }

            })

            $(function(){
            $("#reserveFrom").datepicker({dateFormat:"yy-mm-dd"})
            })

            $(function(){
                $("#reserveTo").datepicker({dateFormat:"yy-mm-dd"})
            })
        })
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
              <li class="selected"><a href="index.php?action=reservation">Rezerwuj salę</a></li>
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
      <div id="content">
        <!-- insert the page content here -->

        <h1>Dodaj rezerwacje</h1>

        <form action="index.php?action=reservation" method="post" id="reservation" class="reservation">
            <div class="form_settings">
            <p><span><label for="hallNumber">Numer sali:</label></span>
                 <select size="1" class="hallNumber" id="hallNumber" name="hallNumber">
                 <option value=""> </option>
                 <?php for($i=0;$i<6;$i++){ ?>
                     <option value=" <?php echo $i+1 ?> "> <?php echo $i+1 ?> </option>
                 <?php } ?>
                 </select></p>

              <p><span><label for="reserveFrom">Rezerwuj od:</label></span>
              <input class="reserveFrom" id='reserveFrom' type="date" name="reserveFrom" value="" /></p>
              <p><span><label for="reserveTo">Rezerwuj do:</label></span>
                <input class="reserveTo" id="reserveTo" type="date" name="reserveTo" value="" /></p>
              <p><span><label for="clientInfo">Dane Rezerwujacego</label></span>
                  <textarea class="clientInfo" id="clientInfo" rows="3" cols="50" name="clientInfo"></textarea></p>
              <p><span><label for="companyInfo">Dane Firmy</label></span>
                  <textarea class="companyInfo" id="companyInfo" rows="3" cols="50" name="companyInfo"></textarea></p>
              <p><span><label for="tableScheme"> Układ Stołów </label></span>
              <select size="1" class="tableScheme" id="tableScheme" name="tableScheme">
                  <option value="szwedzki stół">szwedzki stół</option>
                  <option value='stoły pięcioosobowe'>stoły pięcioosobowe</option>
                  <option value="podkowa">podkowa</option>
              </select></p>
              <p><span><label for="catering">Katering:</label></span>
              <select size="1" class="catering" id="catering" name="catering">
                      <option value=""> </option>
                      <option value="tak">tak</option>
                      <option value='nie'>nie</option>
               </select></p>
              <p><span><label for="notes">Uwagi:</label></span>
                  <textarea class="notes" id="notes" rows="3" cols="50" name="notes"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="Rezerwuj" /></p>
          </div>
        </form>
      </div>
    </div>
    <div id="footer">
        Copyright  <?php if($_SESSION['logged']==0){ ?><a href="index.php?action=logging">Zaloguj się</a><?php } else { ?><a href="index.php?action=adminPanel">Panel admina</a>  <a href="index.php?action=reservation&amp;option=logout"> Wyloguj</a> <?php } ?>
    </div>
  </div>
</body>

