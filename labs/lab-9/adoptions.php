<!DOCTYPE html>
<html>

    <head>
        <title>CSUMB: Pet Shelter</title>
        <meta charset="utf-8">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('.petLink').click(function() {
                    $('#petModal').modal("show");
                    $.ajax({
                        type: "GET",
                        url: "https://cst336-amartinez2.c9users.io/Mart9712/labs/lab-9/api/getPetInfo.php",
                        dataType: "json",
                        data: { "id": $(this).attr('id') },
                        complete: function(data,status) {
                        },
                        success: function(data,status) {
                            $("#petInfo").empty();
                            $("#petInfo").html("Age: " + data.age + "<br>" + 
                                        "<img src='img/" + data.pictureURL + "'><br><hr>" + 
                                        data.description);
                            $('#petModal').modal("show");
                            $('#petNameModalLabel').html(data.name);
                            $('#petModal').modal("show");
                        },
                        
                    });
                }); // petLink.click
            }); // Document.ready
        </script>
        <style>
            body {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <header>
            <?php
                include 'inc/header.php';
            ?>
        </header>
        <div class="jumbotron">
            <h1 class="display-3">CSUMB Animal Shelter</h1>
            <h2 class="lead">The official animal adoption website of csumb</h2>
        </div>  
            
            <?php
                include 'inc/getPetList.php';
                $pets = getPetList();
                foreach($pets as $pet) {
                    echo "Name: ";
                    echo "<a href='#' class='petLink' id='".$pet['id']."'>".$pet['name']."</a><br>";
                    echo "Type: " . $pet['type'] . "<hr> ";
                }
            ?>
        <!-- Modal -->
        <div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="petNameModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id='petInfo'><img src='img/loading.gif'></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>