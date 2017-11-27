<!--http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php?zip=93955-->
<!--http://itcdland.csumb.edu/~milara/ajax/countyList.php?state=ca-->
<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>AJAX: Sign Up Page</title>
        <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet"> 
        <style type="text/css" id="diigolet-chrome-css">
            body {
                background-color: #eee;
                min-width: 700px;
                font-family: 'Spectral SC', serif;
            }
            h1 {
                text-align: center;
            }
            .container {
                width: 30%;
                margin: auto;
            }
            .green {
                color: green;
            }
            .red {
                color: red;
            }
            .alert {
                border-color: red;
            }
            #submit {
                position: relative;
                top: 10px;
                background-color: #798A55;
                border: none;
                color: white;
                padding: 7px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            
            function getCity() {
                var $zip = $('#zip');
                            
                $.ajax({
                    type: "GET",
                    url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                    dataType: "json",
                    data: { "zip": $zip.val() },
                    success: function(data,status) {
                        if(data.length == 0){
                            $('#city').html("Could not retrieve data");
                            $('#lat').html("Could not retrieve data");
                            $('#lng').html("Could not retrieve data");
                        } else {
                            $('#city').html(data.city);
                            $('#lat').html(data.latitude);
                            $('#lng').html(data.longitude);
                        }
                        //alert(data);
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                        // console.log(status);
                        // console.log(data);
                        // $('#city').html(data.responseJSON[1]);
                        // $('#lat').html(data.responseJSON['latitude']);
                        // $('#lng').html(data.responseJSON['longitude']);
                    }
                });//ajax            
            }
            
            function getCounty() {
                var $state = $('#state-select');
                // console.log($state.find(":selected").val());
                
                $.ajax({
                    type: "GET",
                    url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
                    dataType: "json",
                    data: { "state": $state.find(":selected").val() },
                    success: function(data,status) {
                        console.log("State status: " + status);
                        console.log(data);
                    },
                    complete: function(data,status) {
                        var dat = data.responseJSON;
                        for (var i = 0; i < dat.length; i++) {
                            $('#county-select').append($('<option>', {
                                value: dat[i][0].replace(/\s/g, '-'),
                                text: dat[i][0]
                            }));
                        }
                    }
                });
            }
            
            function checkFill(id) {
                var value=$.trim($("#"+id).val());
                if(value.length == 0)
                {
                    $("#"+id).addClass("alert"); 
                    return false;
                }     
                return true;
            }
            
            $(document).ready(function() {
                $('#zip').change(function() { 
                    // alert('change');
                    getCity(); 
                });    
                
                $('#state-select').change(function() { 
                    getCounty(); 
                });
                $('#username').change(function() {
                    $.ajax({
                           type: "GET",
                           url: 'http://cst336-amartinez2.c9users.io/Mart9712/labs/lab-8/checkUsername.php',
                           dataType: "json",
                           data: { "userName": $("#userName").val() },
                           success: function(data, status) {
                               if (!data) {
                                    // alert("append");
                                    $('#available').addClass("green");
                                    $('#available').html(" Username available");
                               } 
                               else {
                                    $('#available').addClass("red");
                                    $('#available').html(" Username unavailable");
                               }
                           },
                           complete: function(data, status) {
                                console.log(status);            
                           }
                       });
                });
                $('form').submit(function(e) {
                    var bool = true;
                    bool = checkFill("firstname");
                    bool = checkFill("lastname");
                    bool = checkFill("email");
                    bool = checkFill("phone");
                    bool = checkFill("zip");
                    bool = checkFill("username");
                    bool = checkFill("password");
                    bool = checkFill("pw-check");
                    if(!bool) {
                        alert("Please fill out all forms");
                        e.preventDefault();
                    }else if ($('#pw').val() != $('#pw-check').val()) {
                       alert("Passwords do not match.");
                       e.preventDefault();
                   } else {
                        alert("Success");
                   }
                });
            });
            
            
        </script>
    </head>

<body id="dummybodyid">
<div class="container">
   <h1> Sign Up Form </h1>

    <form>
        <fieldset>
           <legend>Sign Up</legend>
            First Name:  <input id="firstname" type="text"><br> 
            Last Name:   <input id="lastname" type="text"><br> 
            Email:       <input id="email" type="text"><br> 
            Phone Number:<input id="phone" type="text"><br><br>
            Zip Code:    <input type="text" id="zip"><br>
            City: <span id="city"></span>
            <br>
            Latitude: <span id="lat"></span>
            <br>
            Longitude: <span id="lng"></span>
            <br><br>
            State: <select id="state-select">
                <option value="">Select One</option>
                <option value="ca" id="option-ca">California</option>  
                <option value="ny" id="option-ny">New York</option> 
                <option value="nv" id="option-nv">Nevada</option> 
                <option value="tx" id="option-tx">Texas</option> 
                </select></br>
            Select a County: <select id="county-select">
                <option value="">Select One</option>
            </select><br>
            
            Desired Username: <input id="username" type="text"><span id="available"></span><br>
            Password: <input id="pw" type="password"><br>
            Type Password Again: <input id="pw-check" type="password"><br>
            <input type="submit" id="submit" value="Sign up!">
        </fieldset>
    </form>




</div>
</body>
</html>