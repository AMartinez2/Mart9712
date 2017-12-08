<?php
session_start();
include 'dbConnection.php';
$db = getDatabaseConnection();

$namedParameters = array();
$namedParameters[':username'] = $_POST['username'];
$namedParameters[':password'] = sha1($_POST['password']);

$sql = "SELECT * 
        FROM pt_user
        WHERE 1
        AND username = :username
        AND password = :password";

$stmt = $db->prepare($sql);
$stmt->execute($namedParameters);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($result)) {
    $_SESSION['loginStatus'] = "FAILED";
    header("Location: ../login.php");
}
else {
    $_SESSION['loginStatus'] = "SUCCESS";
    $_SESSION['user'] = "admin";
    header("Location: ../index.php");
}
?>