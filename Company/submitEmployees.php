<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


require_once('../dbconn.php');
include '../Headers/companyHeader.php';

session_start();
if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 2) {
    header("location: ../index.php");
    exit();
}

$companyID = $_SESSION['companyId'];
//$companyId = $_SESSION['companyId'] 


if (isset($_POST['submit'])) {
    $updateQuery = "UPDATE employee,bankinfo set employee.status = 'A' , bankinfo.status = 'A' 
    WHERE employee.employeeId = bankinfo.employeeId  and employee.status = 'I' and bankinfo.status = 'I' and employee.companyId = $companyID";
    if (mysqli_query($con, $updateQuery)) {
        echo " <script type='text/javascript'>alert('Employee Details Submitted Sucessfully');location.href='viewEmployees.php'</script>";
    } else {
        echo " <script type='text/javascript'>alert('Error In Submitting Details');location.href='submitEmployees.php'</script>";
    }
} else {
}

if (isset($_POST['reject'])) {
    $updateQuery = "UPDATE employee,bankinfo set employee.status = 'R' , bankinfo.status = 'R' 
    WHERE employee.employeeId = bankinfo.employeeId  and employee.status = 'I' and bankinfo.status = 'I' and employee.companyId = $companyID";
    if (mysqli_query($con, $updateQuery)) {
        echo " <script type='text/javascript'>alert('Employee Details Rejected Sucessfully');location.href='viewEmployees.php'</script>";
    } else {
        echo " <script type='text/javascript'>alert('Error In Rejecting Details');location.href='submitEmployees.php'</script>";
    }
} else {
}


?>


<!DOCTYPE html>
<html>

<head>

    <head>
        <title>Customer</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/custom.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="script/custom.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.13/fc-3.2.2/fh-3.1.2/r-2.1.0/sc-1.4.2/datatables.min.css" />
        <script type="text/javascript">
            jQuery(document).ready(function() {
                var table = $('#tblUser').DataTable({
                    scrollY: "400px",
                    scrollX: true,
                    scrollCollapse: false,
                    fixedColumns: {
                        leftColumns: 0,
                        rightColumns: 1,
                    }
                });
                $("#form-body").hide();
            });
        </script>
    </head>
</head>

<body>
    <div class="container-fluid" style="margin-top:30px !important;">
        <div class="container">
            <a href="viewEmployees.php" class="btn btn-primary btn-sm"> Go back</a><br><br>
            <div class="row mb-2">
                <div class="col-md-9">
                    <h1>Uploaded Employees</h1>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tblUser" class="table table-striped stripe row-border order-column">
                    <thead>
                        <tr>

                            <th>
                            <th>Employee Name</th>
                            <th>Join Date</th>
                            <th>Addess</th>
                            <th>NIC</th>
                            <th>DOB</th>
                            <th>Contact No</th>
                            <th>Job Title</th>
                            <th>Email</th>
                            <th>BankDetails</th>
                            <th>Branch Code</th>
                            <th>Account Number</th>
                            <th>Account Holder</th>
                            <th>Initiated Date</th>
                            <th>Action</th>

                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectQuery = "select * from employee where companyId  = $companyID and status = 'I' ";
                        $squery = mysqli_query($con, $selectQuery);
                        while (($result = mysqli_fetch_assoc($squery))) {
                        ?>
                            <tr>
                                <td><?php echo $result['employeeId'];
                                    $empid = $result['employeeId']; ?></td>
                                <td><?php echo $result['employeeName']; ?></td>
                                <td><?php echo $result['joinDate']; ?></td>
                                <td><?php echo $result['address']; ?></td>
                                <td><?php echo $result['nic']; ?></td>
                                <td><?php echo $result['dob']; ?></td>
                                <td><?php echo $result['cantactNo']; ?></td>
                                <td><?php echo $result['jobTitle']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td> <?php
                                        $selectQuery1 = "SELECT * FROM  bankinfo inner join ref_bank on bankinfo.bankCode = ref_bank.bankCode WHERE bankinfo.employeeId = '$empid' ";
                                        $squery1 = mysqli_query($con, $selectQuery1);
                                        while (($result1 = mysqli_fetch_assoc($squery1))) {
                                            echo $result1['bankCode'] . " - " . $result1['bankName'];
                                        }
                                        ?>
                                </td>
                                <td> <?php
                                        $selectQuery1 = "SELECT * FROM  bankinfo WHERE employeeId = '$empid' ";
                                        $squery1 = mysqli_query($con, $selectQuery1);
                                        while (($result1 = mysqli_fetch_assoc($squery1))) {
                                            echo $result1['branchCode'];
                                        }
                                        ?>
                                </td>
                                <td> <?php
                                        $selectQuery1 = "SELECT * FROM  bankinfo WHERE employeeId = '$empid' ";
                                        $squery1 = mysqli_query($con, $selectQuery1);
                                        while (($result1 = mysqli_fetch_assoc($squery1))) {
                                            echo $result1['accountNumber'];
                                        }
                                        ?>
                                </td>
                                <td> <?php
                                        $selectQuery1 = "SELECT * FROM  bankinfo WHERE employeeId = '$empid' ";
                                        $squery1 = mysqli_query($con, $selectQuery1);
                                        while (($result1 = mysqli_fetch_assoc($squery1))) {
                                            echo $result1['accoundHolder'];
                                        }
                                        ?>
                                </td>
                                <td> <?php
                                        $selectQuery1 = "SELECT * FROM  bankinfo WHERE employeeId = '$empid' ";
                                        $squery1 = mysqli_query($con, $selectQuery1);
                                        while (($result1 = mysqli_fetch_assoc($squery1))) {
                                            echo $result1['initiatedDate'];
                                        }
                                        ?>
                                </td>
                                <td>
                                    <a href="EmployeePlatform/submit.php?id=<?php echo $empid; ?>" class="btn btn-primary btn-sm">Approve</a><br>
                                    <a href="EmployeePlatform/reject.php?id=<?php echo $empid; ?>" class="btn btn-danger btn-sm" style="width: 70px;" >Reject</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="submit" class="btnRegister" name="submit" value="Confirm Employees">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnRegister" name="reject" value="Reject Employees">
                    </div>
                </form>

            </div>


        </div>
    </div>


</body>

</html>