<?php
include '../../dbConnection.php';
$dbConn = getDatabaseConnection();
    
    

// SELECT deviceName, checkoutDate FROM tc_checkout c NATURAL JOIN tc_device d WHERE checkoutDate > '2017-10-10'
// SELECT * FROM tc_user LEFT JOIN tc_department ON tc_user.deptID = tc_department.departmentId WHERE deptName IS NULL
// SELECt deptName FROM tc_user RIGHT JOIN tc_department ON tc_user.deptID = tc_department.departmentId WHERE userId IS NULL
// $sql = "SELECT firstName, lastName, deptId, deptName 
//          FROM tc_user u 
//          INNER JOIN tc_department d 
//          ON u.deptId=d.departmentId 
//          ORDER BY lastName";



function getDeviceTypes(){
    global $dbConn;
    $sql = "SELECT DISTINCT(deviceType)
            FROM tc_device
            ORDER BY deviceType";
            
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $r){
            echo "<option value='".$r['deviceType']."'>".$r['deviceType']."</option>";
    }
}


function displayAllDevices(){
    global $dbConn;
    
    $sql = "SELECT * FROM tc_device WHERE 1 ";
    
    if (isset($_GET['submit'])){
        
        $namedParameters = array();
        
        if(!empty($_GET['deviceName'])){ // Remember to add space to the statement
            // The following query allows sql injection due to the single quotes
            // $sql .= " AND deviceName LIKE '%".$_GET['deviceName']."%'";
            // Location does not matter as it has yet to be used as of this line
            $sql .= " AND deviceName LIKE :deviceName"; //using named parameters
            $namedParameters[':deviceName'] = "%".$_GET['deviceName']."%";
        }
        if(!empty($_GET['deviceType']) && $_GET['deviceType'] != 'none'){
            $sql .= " AND deviceType = :deviceType";
            $namedParameters[':deviceType'] = $_GET['deviceType'];
        }
        if(isset($_GET['available'])){
            $sql .= " AND status = 'A'";
        }
        if(isset($_GET['orderBy'])){
            $sql .= " ORDER BY ".$_GET['orderBy'];
        }else{
            $sql .= " ORDER BY deviceName";
        }
    }else{
        $sql .= " ORDER BY deviceName";
    }

    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $r){
            echo $r['deviceName'] . " | " . $r['deviceType'] . " | $" 
            . $r['price'] . " |  " . $r['status'] . " | " .
            "<a target='checkoutHistory' href='checkoutHistory.php?deviceId=".$r['deviceId']."'>Checkout History</a></br>";
    }
}


function checkoutHistory(){
    global $dbConn;
    if(!empty($_GET['deviceId'])){
        $sql = "SELECT * FROM tc_checkout 
                NATURAL JOIN tc_user
                NATURAL JOIN tc_device
                WHERE deviceId = :deviceId";
        $namedParameters = array(":deviceId"=>$_GET['deviceId']);
    }            
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($records as $r){
        echo $r['firstName'] . " " . $r['lastName'] . " | checked out:" . $r['checkoutDate'] . "| returned:" . $r['dueDate'] .  "</br>";
    }
}

?>