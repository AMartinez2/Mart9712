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

if (isset($_GET['addUserForm'])){
    // the administrator clicked on the "Add User" button
    global $conn;
    
    $namedParameters = array();
    $namedParameters[':firstName'] = $_GET['firstName'];
    $namedParameters[':lastName'] = $_GET['lastName'];
    $namedParameters[':email'] = $_GET['email'];
    $namedParameters[':universityId'] = $_GET['universityId'];
    $namedParameters[':phone'] = $_GET['phone'];
    $namedParameters[':gender'] = $_GET['gender'];
    $namedParameters[':role'] = $_GET['role'];
    $namedParameters[':deptId'] = $_GET['deptId'];
    
    $sql = "INSERT INTO tc_user
            (firstName, lastName, email, universityId, gender, phone, role, deptid)
            VALUES
            (:firstName, :lastName, :email, :universityId, :gender, :phone, :role, :deptId)";
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    header("Location: admin.php");

}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <fieldset>
            <legend> Add New User </legend>
            <form>
                
                First Name: <input type="text" name="firstName"/> <br>
                Last Name: <input type="text" name="lastName"/> <br>
                Email: <input type="text" name="email"/> <br>
                University Id: <input type="text" name="universityId"/> <br>
                Phone: <input type="text" name="phone"/> <br>
                Gender: <input type="radio" name="gender" value="F" id="genderF"/> 
                        <label for="genderF">Female</label>
                        <input type="radio" name="gender" value="M" id="genderM"/> 
                        <label for="genderM">Male</label><br>
                Role:   <select name="role">
                            <option value=""> Select One </option>
                            <option>Faculty</option>
                            <option>Student</option>
                            <option>Staff</option>
                        </select>
                <br />
                Department: <select name="deptId">
                            <option value=""> Select One </option>
                            
                            <?php
                            
                                $departments = getDepartmentInfo();
                                foreach ($departments as $record) {
                                    echo "<option value='".$record['departmentId']."'>".$record['deptName']."</option>";
                                }
                            
                            ?>
                            
                        </select>
                        <br />
                <input type="submit" name="addUserForm" value="Add User!">
            </form>
        </fieldset>
    </body>
</html>