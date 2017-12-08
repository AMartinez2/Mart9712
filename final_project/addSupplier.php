<?php
if (isset($_GET['addSup'])){
    include("inc/dbConnection.php");
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO pt_suppliers
            (name)
            VALUES
            (:name)";
            
    $namedParameters[':name'] = $_GET['enter-name'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    header("Location: archive.php");
}
?>
<?php include 'inc/mainPage.php'; ?>
<!DOCTYPE html>
<html>
    <?php include 'inc/header.php'; ?>
    <body>
        <header>
            <?php include 'inc/nav.php'; ?>
        </header>
        <form>
            Enter a name: <input type="text" name="enter-name" placeholder="Name">
            <input type="submit" value="addSup" name="addSup">
        </form>
    </body>
</html>