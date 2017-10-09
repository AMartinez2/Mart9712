<?php

function googus($location, $size, $heading, $pitch){
    $sizeX = 0;
    $sizeY = 0;
    if ($size == 'small'){
        $sizeX = 300;
        $sizeY = 300;
    }
    else if ($size == 'medium'){
        $sizeX = 500;
        $sizeY = 500;
    }
    else{
        $sizeX = 1000;
        $sizeY = 1000;
    }
    $gKey = 'AIzaSyCf4vmeb2WUebUP6yE1NVxhX92_u1RgjzA';
    echo "<img src='https://maps.googleapis.com/maps/api/streetview?size=".$sizeX."x".$sizeY."&location=".$location."&heading=".$heading."&pitch=".$pitch."&key=".$gKey."'>";
}
?>