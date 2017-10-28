<?php
session_start();
// print_r($_POST);

include '../../dbConnection.php';
$conn = getDatabaseConnection();

// print_r($conn);

$username = $_POST['username'];
$password = sha1($_POST['password']);
// Use named parameters instead
// $sql = "SELECT *
//         FROM tc_admin
//         WHERE username = '$username'
//         AND password = '$password'";
$sql = "SELECT *
        FROM tc_admin
        WHERE username = :username
        AND password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);



if (empty($record)) {
    $_SESSION['loginError'] = true;
    header("Location: index.php"); // redirect to login portal
} else {
     $_SESSION['loginError'] = false;
    $_SESSION['username'] = $record['userName'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    header("Location: admin.php"); // redirect to admin portal
    
}

?>