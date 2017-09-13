<?php
    function run(){
        for ($i=1; $i<5; $i++){
            ${"array".$i} = createArrayFromFile("names/names".$i.".txt");
            shuffle(${"array".$i});
        }
        for($i = 0; $i < 2; $i++){
            if($i == 0){
                echo "<h1>YOU ARE</h1>";
                $var1 = array_rand($array1);
                $var2 = array_rand($array2);
                echo "<h2>".$array1[$var1]." the ".$array2[$var2]."</h2>";
            }
            else {
                echo "<h1>DESTINED TO</h1>";
                $var1 = array_rand($array3);
                $var2 = array_rand($array4);
                echo "<h2>".$array3[$var1]." the ".$array4[$var2]."</h2>";
            }
        }
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