<?php
function printPaintings() {
    $namedParameters = array();
    $sql = "SELECT * 
            FROM pt_painting
            WHERE 1";
            
    if(isset($_GET['submit'])) {
        if(!empty($_GET['title-search'])) {
            $sql .= " AND title LIKE :title";
            $namedParameters[':title'] = "%" . $_GET['title-search'] . "%";
        }
        if (!empty($_GET['artist-search'])) {
            $sql .= " AND artist LIKE :artist";
            $namedParameters[':artist'] = "%" . $_GET['artist-search'] . "%";
        }
    }
    include 'dbConnection.php';
    $db = getDatabaseConnection();
    $stmt = $db->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchall(PDO::FETCH_ASSOC);
    
    echo "<div id='theGrid'>";
    foreach ($records as $record) {
        echo "<div class='image-grid'>";
        echo    "<a href='item-select.php?id=". $record['id'] ."'>";
        echo        "<img src='img/". $record['img_location'] ."'>";
        echo    "</a>";
        echo "</div>";
    }
    echo "</div>";
}
?>