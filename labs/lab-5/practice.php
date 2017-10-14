<?php
$host = 'localhost'; // Cloud9
$dbname = "tcp";
$username = "root";
$paddword = "";

// Create database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Display database related errors
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function usersWithanA(){
    global $dbConn;
    $sql = "SELECT firstName, lastName, email FROM tc_user WHERE firstName LIKE 'A%'";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    foreach ($records as $record){
        echo $record['firstName'] . " " . $record['lastName'] . " " . $record['email'] . "</br>";
    }
}

function displayDevices(){
    global $dbConn;
    $sql = "SELECT deviceName, price FROM tc_device WHERE price > 300 AND price < 1000 ORDER BY price";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($results as $result){
        echo $result['deviceName'] . " $" . $result['price'] . "</br>";
    }
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>User that start with an 'A'</h1>
        <?=usersWithanA()?>
        <h1>Dervices of a certain price</h1>
        <?=displayDevices()?>
    </body>
</html>