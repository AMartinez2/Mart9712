<?php

$deck = range(0,51);  //creates array with values 1 to 52

$suits = array("clubs","spades","hearts","diamonds");

shuffle($deck);

    echo "   <div class='player-field'>";
    $playerTotal = 0;  // total points for each player
    $totalPoints = 0;
    $i= 0; // what player we are on.
    $players = array(0,0,0,0);  // 4 players
    
    //echo " < div>";

foreach ($deck as $card) { // for loop
        
        echo "<img class='image-object' src='../img/".$suits[floor($card / 13)]."/".(($card % 13) + 1).".png' alt='Picture of card'>";
        
        if($playerTotal > 35){
            $players[$i] = $playerTotal;
            $i ++;
            
            echo $playerTotal;
            echo " <br />";
            //echo " </div>";
            //echo " <div> ";
            $playerTotal = 0;
        }
        
        if($i >3){
            break;
        }
        $playerTotal += (($card % 13) + 1); // <!-- keep track of each players --> 
        
        
        $totalPoints += (($card % 13) + 1); //  <!-- Game total points for all players-->
        
}

    $winningIndex = 0;
    $biggerNum = $players[0];
    for($i = 0; $i < 4; $i++){
        if($players[$i] > $biggerNum){
            $biggerNum = $players[$i];
            $winningIndex = $i;
        }
}

    echo "Player " . ($winningIndex + 1) . " wins";

    //echo " </div> ";

?>