<?php
function getItemInfo($itemId) {
    $namedParameters = array();
    
    $sql = "SELECT * 
            FROM pt_painting
            WHERE id = :id";
    $namedParameters[':id'] = $itemId;   
    
    include 'dbConnection.php';
    $db = getDatabaseConnection();
    $stmt = $db->prepare($sql);
    $stmt->execute($namedParameters);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo '<div class="card" style="width: 30rem;">';
    echo    '<img class="card-img-top" src="img/'.$result['img_location'].'" alt="Card image cap">';    
    echo    '<ul class="list-group list-group-flush">';
    echo        '<li class="list-group-item">'. $result['title'] .'</li>';
    echo        '<li class="list-group-item">Artist: '. $result['artist'] .'</li>';
    echo        '<li class="list-group-item">Date: '. $result['date'] .'</li>';
    echo        '<li class="list-group-item">Location: '. $result['location'] .'</li>';
    echo        '<li class="list-group-item">Price: $'. $result['price'] .'</li>';
    echo    '</ul>';
    
    session_start();
    if($_SESSION['user']) {
        echo    '<div class="card-block">';
        echo        '<a href="changePrice.php?id='. $namedParameters[':id'] .'" class="card-link">Change Price</a>';
        echo    '</div>';
    }
    
    echo '</div>';
}
?>