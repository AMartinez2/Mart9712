<?php
    $host = 'localhost';//cloud 9
    $dbname = 'tcp';
    $username = 'root';
    $password = '';
    
    //using different database variables in Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $named = array();
    $named[':search'] = "'".$_GET['q']."'";
    print_r($named[':search']);
    $sql = "INSERT INTO `tc_search` (`search`, `id`) VALUES (:search, NULL)";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($named);
?>