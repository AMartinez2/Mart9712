<?php include 'inc/mainPage.php'; ?>
<!DOCTYPE html>
<html>
    <?php include 'inc/header.php'; ?>
    <body>
        <header>
            <?php include 'inc/nav.php'; ?>
        </header>
        <form>
            Search by title: <input type="text" name="title-search" placeholder="Title">
            Search by artist: <input type="text" name="artist-search" placeholder="Artist Name">
            <input type="submit" value="Filter" name="submit">
        </form>
        <?=printPaintings()?>
    </body>
</html>