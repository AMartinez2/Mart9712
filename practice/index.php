<?php 
    function yearList($startYear, $endYear){
        $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
        $sumYear = 0;
        $count = 0;
        for($i = $startYear; $i < $endYear + 1; $i+=4){
            $sumYear += $i;
            echo "<li> Year $i ";
            if($i % 100 == 0){
                echo "<b>Happy New Century</b>";
            }
            else if ($i == 1776){
                echo "<b>USA INDEPENDENCE</b>";
            }
            if($i >= 1900){
                echo "<img src='zodiac/".$zodiac[$count % 12].".png'>";
                $count++;
            }
            echo "<hr>";
        }
        return $sumYear;
    }
?>
<html>
    <body>
        <?php 
            echo "<h1>Chinese Zodiac List</h1>";
            if(isset($_GET['startYear']) && isset($_GET['endYear'])){
                echo "<h2>Sum Years: " . yearList($_GET['startYear'], $_GET['endYear']) . "</h2>";
            }
            else{
                echo "<h2>Sum Years: " . yearList(1900, 2000) . "</h2>";
            }
            
        ?>
    </body>
</html>