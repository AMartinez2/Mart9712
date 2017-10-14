<?php

include 'functions.php';

?>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css"> 
    </head>
    <body class="container">
        <h1>Technology Center: Checkout System</h1> 
        <form>
            Device: <input type="text" name="deviceName" placeholder="Device Name">
            type: 
            <select name="deviceType">
                <option value="none">Select One</option>
                <?=getDeviceTypes()?>
            </select>
            
            <input type="checkbox" name="available" id="available">
            <label for="available"> Available </label>
            
            </br>
            </br>
            Order By: 
            <input type="radio" name="orderBy" id="orderByName" value="deviceName">
                <label for "oderbyName">Name</label>    
            <input type="radio" name="orderBy" id="orderByPrice" value="price">
                <label for "oderbyPrice">Price</label>
            
            <input type="submit" value="Search!" name="submit">
        </form>
        
        <?=displayAllDevices()?>
    
        <iframe name="checkoutHistory" width="600" height="700"></iframe>
    </body> 
</html>