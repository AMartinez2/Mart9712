<?php
$sql = "SELECT price
        FROM pt_painting
        WHERE id = :id";
$namedParameters = array();
$namedParameters[':id'] = $_GET['id'];

include 'dbConnection.php';
$db = getDatabaseConnection();
$stmt = $db->prepare($sql);
$stmt->execute($namedParameters);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);
?>