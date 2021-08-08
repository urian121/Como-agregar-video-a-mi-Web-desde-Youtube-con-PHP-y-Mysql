<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Como-agregar-video-a-mi-Web-desde-Youtube-con-PHP-y-Mysql :: Urian Viera</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="content-type" content="text/html;charset=utf-8"/>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <style type="text/css">
    
.video-responsive {
position: relative;
padding-bottom: 56.25%; /* 16/9 ratio */
padding-top: 30px; /* IE6 workaround*/
height: 0;
overflow: hidden;
}

.video-responsive iframe,
.video-responsive object,
.video-responsive embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}
iframe{
  width: 100%;
  height: 100vh;
}
  </style>
</head>
<body>

  <header id="header">
    <div class="container">
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a class="menu-active" href="index.php">Inicio</a></li>
          <li><a href="#about">servicios</a></li>
          <li><a target="_blank" href="agregarVideo.php">Agregar Video</a></li>
          <li><a href="#pricing">Contacto</a></li>
        </ul>
      </nav>
    </div>
  </header>


<div class="hero" style="position: relative;">
  
  <h1 id="posicionarelementocentrado">
    Bienvenidos a 
      <a style="font-weight: 600; color: #ce3635 !important;" href="" class="typewrite" data-period="2000" data-type='[ "WebDeveloper", "Desarrollo Web - Programación"]'>
        <span class="wrap"></span>
      </a>
    </h1>

  <span id="cafe" role="img">
    <span class="inner">
    </span>
  </span>
</div>

    
 <?php 
 require("config.php");

  $sqlVideo   = ("SELECT * FROM videos ORDER BY id DESC LIMIT 1");
  $queryVideo = mysqli_query($con, $sqlVideo);
  $totalVideo = mysqli_num_rows($queryVideo);
  $DataVideo  = mysqli_fetch_array($queryVideo);
?>

<section class="section-bg">
    <div class="container">
      <h3 class="text-center mt-3" style="color:#F68119; font-weight: 600;">
      Así de Fantástico se vería tu Sitio Web...
     </h3>
      <div class="row text-center">
        <div class="col-6">
          <?php 
          if( $totalVideo >0){ ?>
          <h2><?php echo $DataVideo['nombreVideo']; ?></h2>

          <div class="video-responsive">
            <iframe  src="<?php echo $DataVideo['urlVideo']; ?>"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
          </div>
        <?php }else{ ?>
        <h2>No hay Video</h2>
        <?php } ?>

        </div>

        <div class="col-6 text-center">
          <img class="img-fluid" src="img/work.gif" alt="">
        </div>
      </div>
    </div>
</section>



<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>



  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>


  <script src="js/main.js"></script>


<script type="text/javascript">
var TxtType = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
    }

    setTimeout(function() {
    that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
          new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};

</script>

</body>
</html>
