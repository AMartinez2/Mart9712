<?php
$sql = "SELECT * 
        FROM pt_painting
        WHERE id = :id";
$namedParameters[':id'] = $_GET['id'];   

include 'dbConnection.php';
$db = getDatabaseConnection();
$stmt = $db->prepare($sql);
$stmt->execute($namedParameters);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);
?>