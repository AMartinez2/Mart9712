<?php
    function run(){
        // Randomly select font
        $var1 = rand(0, 3);
        echo "<div class='image1'>";
        echo    "<div class='page-title font$var1'>";
        echo    "<h1>CHOOSE YOUR DESTINY</h1>";
        echo    "</div>";
        echo "</div>";
        
        echo "<div class='inside font$var1'>";
        for ($i=1; $i<7; $i++){
            ${"array".$i} = createArrayFromFile("names/names".$i.".txt");
            shuffle(${"array".$i});
        }
        for($i = 0; $i < 3; $i++){
            if($i == 0){
                echo "<h3>YOU ARE:</h3>";
                $var1 = array_rand($array1);
                $var2 = array_rand($array2);
                echo "<h1>".$array1[$var1]." ".$array2[$var2]."</h1>";
            }
            if($i == 1) {
                echo "<h3>THE</h3>";
                $var1 = array_rand($array3);
                $var2 = array_rand($array4);
                echo "<h1>".$array3[$var1]." ".$array4[$var2]."</h1>";
            }
            else if($i == 2) {
                echo "<h3>DESTINED TO</h3>";
                $var1 = array_rand($array5);
                $var2 = array_rand($array6);
                echo "<h1>".$array5[$var1]." ".$array6[$var2]."</h1>";
            }
        }
        echo "</div>";
        echo "</div>";
    }
    
    
    function createArrayFromFile($file) {
        $myfile = fopen($file, "r") or die("Unable to open file!");
        $names = fread($myfile,filesize($file));
        fclose($myfile);
        
        $array = array();
        $array = explode(",", $names);
        return $array;
    }
?>