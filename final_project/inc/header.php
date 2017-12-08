<head>
    <meta charset="utf-8">
    <title>Buy Some Paintings</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <style>
        body {
            text-align: center;
            max-width: 1920px;
            margin: auto;
        }
        
        form {
            padding-top: 20px;
        }
        
        #image-select {
            padding-top: 80px;
            padding-left: 100px;
            width: 58%;
            margin-left: auto;
            margin-right: auto;
            overflow: hidden;
            text-align: left; 
        }
        
        #theGrid {
            padding-top: 20px;
            width: 86%;
            margin: auto;
        }
        
        .card {
            margin: auto;
            margin-top: 20px;
            float: none;
        }
        
        .image-grid {
            overflow: hidden;
            float: left;
            width: 300px;
            height: 300px;
        }
        
        .image-grid img {
            position: relative;
            top: -100px;
            left: -100px;
        }
        
        .select-inner {
            float: left;
            height: 100%;
        }
        
        .select-inner img {
            width: 400px;
            margin: auto;
        }
        
        .detail {
            padding-left: 20px;
        }
        
        .hide {
            display: none;
        }
    </style>
</head>