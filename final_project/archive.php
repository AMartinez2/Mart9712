<?php
include 'inc/dbConnection.php';
$db = getDatabaseConnection();
function reportOne() {
    $sql = "SELECT SUM(price) as sum
        FROM pt_painting;";
    
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<h4>Total value of inventory: $". $result['sum'] ."</h4>";
}

function reportTwo() {
    $sql = "SELECT AVG(price) as avg
        FROM pt_painting;";
    
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "<h4>Average value of pieces in inventory: $". $result['avg'] ."</h4>";
}

function reportThree() {
    $sql = "SELECT COUNT(*) as count
        FROM pt_suppliers;";
    
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "<h4>Total amount of suppliers: ". $result['count'] ."</h4>";    
}

function printSuppliers() {
    $sql = "SELECT * 
        FROM pt_suppliers
        WHERE 1;";
    
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h2>Our Suppliers (ADMIN EYES ONLY)</h2>";
    echo "<p>Y'know, since having these paintings isn't exactly legal...</p>";
    echo "<a href='addSupplier.php'>Add another supplier</a>";
    foreach ($result as $r) {
        echo "<h4>". $r['name'] ."  | <span><a href='inc/deleteSupp.php?id=". $r['id'] ."'>delete</a></span></h4>";
    }
}

?>
<!DOCTYPE html>
<html>
    <?php include 'inc/header.php'; ?>
    <body>
        <header>
            <?php include 'inc/nav.php'; ?>
        </header>
        <h1>Database Logs</h1>
        <?=reportOne()?>
        <?=reportTwo()?>
        <?=reportThree()?>
        <?=printSuppliers()?>
    </body>
</html>