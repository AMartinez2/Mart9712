<?php
    $page = $_SERVER['PHP_SELF'];
    $sec = ".1";

    function getRandomColor() {
        return "rgba(".(rand(0,255)).",".(rand(0,255)).",".(rand(0,255)).",".(rand(0,100)/100).")";
        
    }
?>
<html>
    <head>
        <title> Random Background </title>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
        <style>
            body {
                text-align: center;
                <?php
                    $red = rand(0,255);
                    $blue = rand(0,255);
                    $green = rand(0,255);
                    $alpha = rand(0, 100) / 100;
                    echo "background-color: ".getRandomColor();
                    
                ?>
            }
            h1 {
                <?php
                    echo "color: ".getRandomColor();
                ?>
            }
        </style>
    </head>
    <body>
        <h1>Welcome</h1>
    </body>
</html>