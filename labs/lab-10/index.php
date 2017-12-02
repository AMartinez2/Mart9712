<?php
    // print_r($_FILES);
    // echo $_FILES['fileName']['size'];
    if ($_FILES['fileName']['size'] < 1000000){
        move_uploaded_file($_FILES['fileName']['tmp_name'], "gallery/".$_FILES['fileName']['name']);
    }
    else {
        echo "<p>Cannot upload image over 1mb</p>";
    }
    $files = scandir("gallery/", 1);
    for ($i = 0; $i < count($files)-2; $i++) { // -2 to account for '..' and '.'
        echo "<img class='gal' id='".$files[$i]."' src='gallery/".$files[$i]."' width='90'>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="tf-8">
        <title> Lab 10: Photo Gallery </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            document.querySelector('body').addEventListener('click', function(event) {
              if (event.target.tagName.toLowerCase() === 'img') {
                $('#big').html("<img src='" + event.target.src + "'>");
              }
            });
        </script>
        <style>
            body {
                background-color: grey;
                text-align: center;
                min-width: 500px;
            }
            form {
                padding-top: 10px;
                position: relative;
                top: 0;
                float: center;
            }
            img {
                padding: 10px;
                border: none;
            }
            .gal {
                border-radius: 100px;
            }
            .gal:hover {
                width: 110px;
                transition: 1s;
            }
            #big {
                padding: 10px;   
            }
        </style>
       
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="fileName">
            <input type="submit" value="Upload File!">
        </form>
        
        <div id="big"></div>
    </body>
</html>