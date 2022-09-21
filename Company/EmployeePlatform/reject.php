<?php include '../../dbconn.php';

session_start();
$employeeId = $_SESSION['employeeId'];

$id = $_GET['id'];

$query = "UPDATE employee,bankinfo set employee.status = 'R' , bankinfo.status = 'R' 
    WHERE employee.employeeId = bankinfo.employeeId  and employee.status = 'I' and bankinfo.status = 'I' and employee.employeeId = $id ";
if (mysqli_query($con, $query)) {
    echo " <script type='text/javascript'>alert('User Rejected Sucessfully');location.href='../submitEmployees.php'</script>";
} else {
    echo " <script type='text/javascript'>alert('Error');location.href='../submitEmployees.php'</script>";
}
