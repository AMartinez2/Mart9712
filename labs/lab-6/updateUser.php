<?php
session_start();

if(!$_SESSION['username']){
    header ("Location: index.php");
    exit();
}

include '../../dbConnection.php';
$conn = getDatabaseConnection();

function getDepartmentInfo(){
    global $conn;
    
    $sql = "SELECT deptName, departmentId
            FROM tc_department
            ORDER BY deptName";
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchall();
    
    return $record;
}

function getUserInfo($userId){
    global $conn;
    
    $sql = "SELECT * 
            FROM tc_user
            WHERE userId = $userId";
            
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    
    return $record;
}

if(isset($_GET['updateUserForm'])) { // Admin has submitted form to update user
    $sql = "UPDATE tc_user
            SET firstName = :firstName,
                lastName = :lastName
                WHERE userId = :userId";
    
    $namedParameters = array();
    $namedParameters[':firstName'] = $_GET['firstName'];
    $namedParameters[':lastName'] = $_GET['lastName'];
    $namedParameters['userId'] = $_GET['userId'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    header("Location: admin.php");
}

if (isset($_GET['userId'])) {
    $userInfo = getUserInfo($_GET['userId']);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <script>
            function notify() {
                confirm("User Has Been Updated");
                return window.location = "admin.php";
            }
        </script>
        <fieldset>
            <legend> Update a User </legend>
            <form>
                
                <input type="hidden" name="userId" value="<?=$userInfo['userId']?>" />
                First Name: <input type="text" name="firstName" required value="<?=$userInfo['firstName']?>" /> <br>
                Last Name: <input type="text" name="lastName" required value="<?=$userInfo['lastName']?>"/> <br>
                Email: <input type="text" name="email" required value="<?=$userInfo['email']?>"/> <br>
                University Id: <input type="text" name="universityId" required value="<?=$userInfo['universityId']?>"/> <br>
                Phone: <input type="text" name="phone" required value="<?=$userInfo['phone']?>"/> <br>
                Gender: <input type="radio" name="gender" value="F" id="genderF"  <?=($userInfo['gender']=='F')?"checked":"" ?> /> 
                        <label for="genderF">Female</label>
                        <input type="radio" name="gender" value="M" id="genderM"  <?=($userInfo['gender']=='M')?"checked":"" ?> /> 
                        <label for="genderM">Male</label><br>
                Role:   <select name="role">
                            <option value=""> Select One </option>
                            <option <?=($userInfo['role']=='Faculty' || $userInfo['role']=='faculty')?"selected":"" ?> >Faculty</option>
                            <option <?=($userInfo['role']=='Student' || $userInfo['role']=='student')?"selected":"" ?> >Student</option>
                            <option <?=($userInfo['role']=='Staff' || $userInfo['role']=='staff')?"selected":"" ?> >Staff</option>
                        </select>
                <br />
                Department: <select name="deptId">
                            <option value=""> Select One </option>
                            <?php
                            
                                $departments = getDepartmentInfo();
                                foreach ($departments as $record) {
                                    if ($userInfo['deptId'] == $record['departmentId']){
                                        echo "<option value='".$record['departmentId']."' selected>".$record['deptName']."</option>"; // Pre select the proper department
                                    }
                                    else {
                                        echo "<option value='".$record['departmentId']."'>".$record['deptName']."</option>";
                                    }
                                }
                            
                            ?>
                            
                        </select>
                        <br />
                <input type="submit" name="updateUserForm" value="Update User!"/>
            </form>
        </fieldset>
    </body>
</html>