<?php include 'inc/mainPage.php'; 
session_start();
if (!$_SESSION['user']) {
    header ("Location: login.php");
    exit;
}
if (isset($_GET['submit'])) {
    $sql = "UPDATE pt_painting
            SET price = :price
            WHERE id = :id";
    $namedParameters = array();
    $namedParameters[':price'] = $_GET['price'];
    $namedParameters[':id'] = $_GET['id'];
    include 'inc/dbConnection.php';
    $db = getDatabaseConnection();
    $stmt = $db->prepare($sql);
    $stmt->execute($namedParameters);
    header ("Location: item-select.php?id=".$_GET['id']);
}
?>
<!DOCTYPE html>
<html>
    <?php include 'inc/header.php'; ?>
    <body>
        <header>
            <?php include 'inc/nav.php'; ?>
        </header>
        <form>
            <input class='hide' id="hid" type="text" name="id" placeholder="0">
            Price $: <input id="price" type="text" name="price" placeholder="0">
            <input type="submit" value="Update" name="submit">
        </form>
        <script>
            let url = new URL(window.location.href);
            let c = url.searchParams.get("id");
            $.ajax({
              type: "GET",
              url: 'https://mart9712-cst336.herokuapp.com/final_project/inc/getPrice.php',
              dataType: "json",
              data: { "id": c },
              success: function(data, status) {
                console.log(data['price']);
                $("#price").val(data['price']);
                $("#hid").val(c);
              },
              complete: function(data, status) {
              }
            });
        </script>
    </body>
</html>