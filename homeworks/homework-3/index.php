<?php
    include 'inc/fun.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Thing</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <h1>StreetView Selector</h1>
        </header>
        <div class="upper container">
            <form>
                <h3>Location</h3>
                <select name="location">
                    <option value="none"        <?php if($_GET['location'] == 'none'){echo "selected";} ?>      >None</option>
                    <option value="california"  <?php if($_GET['location'] == 'california'){echo "selected";} ?>>California</option>
                    <option value="new-york"    <?php if($_GET['location'] == 'new-york'){echo "selected";} ?>  >New York</option>
                    <option value="russia"      <?php if($_GET['location'] == 'russia'){echo "selected";} ?>    >Russia</option>
                    <option value="canada"      <?php if($_GET['location'] == 'canada'){echo "selected";} ?>    >Canada</option>
                </select>
                <h3>Image Size</h3>
                
                <input 
                    type="radio" 
                    name="size" 
                    value="small" 
                    class="rad" 
                    <?php if($_GET['size'] == 'small'){echo " checked";} ?>
                >Small<br>
                
                <input 
                    type="radio"
                    name="size" 
                    value="medium" 
                    class="rad" 
                    <?php if($_GET['size'] == 'medium'){echo " checked";} ?>
                >Medium<br>
                
                <input 
                    type="radio" 
                    name="size" 
                    value="large" 
                    class="rad" 
                    <?php if($_GET['size'] == 'large'){echo " checked";} ?>
                >Large<br>
                
                <h3>Heading</h3>
                <input 
                    type="number" 
                    name="heading" 
                    min="0" 
                    max="100" 
                    step="10" 
                    value=
                        <?php 
                            if(isset($_GET['heading'])){
                                echo $_GET['heading'];
                            } else {
                                echo '50';
                            }
                        ?>
                >
                
                <h3>Pitch</h3>
                <input type="range" name="pitch" min="0" max="10">
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="street-view container">
            <?php 
            if(isset($_GET['location']) && $_GET['location'] != 'none'){
                googus($_GET['location'], $_GET['size'], $_GET['heading'], $_GET['pitch']);
            }
            ?>
        </div>
    </body>
</html>