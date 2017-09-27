<?php 
    $backgroundImage = "img/sea.jpg";
    
    // API call goes here
    if ($_GET['keyword'] != "") {
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    else if(isset($_GET['keyword-s']) && $_GET['keyword-s'] != "none"){
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword-s'], $_GET['layout']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    
    }
?>

<html>
    
    <head>
        <title>Image Carousel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    
    <body>
        <br/><br/>
        <!-- HTML form goes here -->
        <form>
            <input type="text" name="keyword" placeholder="keyword">
            <input type="submit" value="Submit" />
            </br>
            <input type="radio" name="layout" value="vertical" checked> Vertical<br>
            <input type="radio" name="layout" value="horizontal"> Horizontal<br>
            </br>
            <select name="keyword-s">
                <option value="none">None</option>
                <option value="waffles">Waffles</option>
                <option value="tacos">Tacos</option>
                <option value="moose">Moose</option>
                <option value="audi">Audi</option>
            </select>
        </form>
        <?php
            if (!isset($imageURLs)) {
                echo "<h2>Type a keyword to display a slideshow <br /> with random images from Pixabay.com </h2>";
            } 
            else 
            {
                // Display Carousel Here
                ?>
                </br></br>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        for($i = 0; $i < 5; $i++){
                            echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                            echo ($i == 0)?" class='active'": "";
                            echo "></li>";
                        }
                        ?>
                    </ol>
                    
                    <!-- Wrapper for Images -->
                    <div class="carousel-inner" role="listbox">
                        <?php 
                            for ($i = 0; $i < 5; $i++) {
                                do {
                                    $randomIndex = rand(0, count($imageURLs));
                                }
                                while (!isset($imageURLs[$randomIndex]));
                                
                                echo "<div class='item ";
                                echo ($i == 0)?"active": "";
                                echo "'>";
                                echo "<img src='" . $imageURLs[$randomIndex]. "'>";
                                echo "</div>";
                                unset($imageURLs[$randomIndex]);
                            }
                        ?>
                    </div>
                    
                    <!-- Control Here -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                    
        <?php
        } // End of else statement
        ?>
           
        
    </body>
</html>