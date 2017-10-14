<?php
function getDatabaseConnection() {
    
    //using different database variables in Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        // $dbname = substr($url["path"], 1);
        $dbname = 'heroku_7a3de33b4ce1274';
        $username = $url["user"];
        $password = $url["pass"];
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } else {
        $host = 'localhost'; // C9 host
        $dbname = 'tcp';
        $username = 'root';
        $password = '';
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    return $dbConn;
}
?>