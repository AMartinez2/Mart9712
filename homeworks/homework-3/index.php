<html>
    <head>
        <meta charset="utf-8">
        <title>Thing</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="container">
        <div class="street-view">
            <form>
                <h3>Location</h3>
                <select name="location">
                    <option value="none">None</option>
                    <option value="california">California</option>
                    <option value="new-york">New York</option>
                    <option value="russia">Russia</option>
                    <option value="canada">Canada</option>
                </select>
                
                <h3>Image Size</h3>
                <input type="radio" name="size" value="small" class="rad" checked>Small<br>
                <input type="radio" name="size" value="medium" class="rad">Medium<br>
                <input type="radio" name="size" value="large" class="rad">Large<br>
                
                <h3>Heading</h3>
                <input type="number" name="heading" min="0" max="100" step="10" value="50">
                
                <h3>Pitch</h3>
                <input type="range" name="pitch" min="0" max="10">
                <input type="submit" value="Submit">
            </form>
            <?php 
            include 'inc/fun.php';
            if(isset($_GET['location']) && $_GET['location'] != 'none'){
                googus($_GET['location'], $_GET['size'], $_GET['heading'], $_GET['pitch']);
            }
            ?>
        </div>
    </body>
</html>