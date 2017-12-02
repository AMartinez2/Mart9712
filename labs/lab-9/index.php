<?php
function fillCar() {
  $files = scandir("img/", 1);
  for ($i = 0; $i < count($files)-2; $i++) { // -2 to account for '..' and '.'
    if ($files[$i] == 'loading.gif') {
      continue;
    }
    if ($i == 0) {
      echo "<div class='carousel-item active'>
      <img class='d-block w-100' src='img/".$files[$i]."' alt='".$files[$i]."'>
      </div>";
    }  
    else {
      echo "<div class='carousel-item'>
      <img class='d-block w-100' src='img/".$files[$i]."' alt='".$files[$i]."'>
      </div>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CSUMB: Pet Shelter</title>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <style>
            body {
                text-align: center;
            }
            #cont {
                width: 500px;
                margin: auto;
                height: 500px;
            }
        </style>
    </head>
    <body>
        <header>
            <?php
                include 'inc/header.php';
            ?>
        </header>
        <div class="jumbotron">
            <h1 class="display-3">CSUMB Animal Shelter</h1>
            <h2 class="lead">The official animal adoption website of csumb</h2>
        </div>  
        <div id="cont">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?=fillCar()?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
        <a href="adoptions.php">
            <button type="button" class="btn btn-outline-primary" href="adoptions.php">Adopt Now</button>
        </a>
    </body>
</html>