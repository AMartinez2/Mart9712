<?php
include("dbConnection.php");
$conn = getDatabaseConnection();
$sql = "DELETE FROM pt_suppliers
        WHERE id = " . $_GET['id'];

$stmt = $conn->prepare($sql);
$stmt->execute();

header("Location: ../archive.php");
?>