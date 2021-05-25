<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Puntos de Recoleccion</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

  <style>
    #map{
      width: 1349px; 
      height: 600px;  
    }
  </style>
  

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Puntos Posconsumo</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Puntos de <br> Recoleccion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post.html">Programas <br> Posconsumo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact_copy.html">Como <br> Contactarnos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/Puntos-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h2>PUNTOS DE RECOLECCION</h2>
            <span class="subheading">Encuentra tu punto de recolección más cercano y ¡Lleva tus Residuos Posconsumo ya!</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!--Google map-->
  
  <div id="map"></div>
  <script>
    function initMap() {
      var centro = { lat: 4.1546398, lng: -73.6197439 };

                
      var lugares = [
        <?php  include ('php/marcadores.php'); ?>
      ]

      var infor=[
        <?php include ('php/info_marcadores.php'); ?>
      ]
                
      var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 15, center: centro}
      );

      var informacion; 

      for(i = 0; i< lugares.length; i++){
        var myLatLng = new google.maps.LatLng(lugares[i][0], lugares[i][1]);
        var marcador = new google.maps.Marker({position: myLatLng, map: map, title: infor[i][0]});  
        (function(i, marcador) { 
          google.maps.event.addListener(marcador,'click',function(){
            if (!informacion) { informacion = new google.maps.InfoWindow()} 
            informacion.setContent(infor[i][0]+'<br>'+infor[i][1]+'<br>'+'Residuo: '+infor[i][2]+'<br>'+'Programa: '+infor[i][3]+'<br>'+
            'Contacto: '+infor[i][4]+'<br>'+'Correo: '+infor[i][5]+'<br>'+'Horario: '+infor[i][6]);
            informacion.open(map, marcador);
          });
        })(i, marcador);

      }
    }
  </script>

  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8pf6ZdFQj5qw7rc_HSGrhUwQKfIe9ICw&callback=initMap">
  </script>


  <hr>

  <!-- Footer  -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="https://twitter.com/MinAmbienteCo">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.facebook.com/CorpPuntoAzul">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Encuentranos en nuestras Redes Sociales</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>
</html>