<!DOCTYPE html>
<html>
    <?php include 'inc/header.php'; ?>
    <body>
        <header>
            <?php include 'inc/nav.php'; ?>
        </header>
        <?php
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                include 'inc/item.php';
                getItemInfo($_GET['id']);
            }
            else {
                header('Location: index.php');
                exit;
            }
        ?>
    </body>
</html>