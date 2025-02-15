<?php include '../dbconn.php';
include '../Headers/companyHeader.php';
session_start();

if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 2) {
    header("location: ../index.php");
    exit();
}

$companyID = $_SESSION['companyId'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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

<body>

    <div class="container-fluid" style="margin-top:30px !important;">
        <div class="container">
            <div class="row 2">
                <div class="col-8">
                    <h1>Company Employees</h1>
                </div>
                <div class="col-4" style="text-align: center;">
                    <a href="newUser.php" class="btn btn-primary btn-sm"> Add New Employee</a>
                    <a href="submitEmployees.php" class="btn btn-primary btn-sm"> Approve Employees</a><br><br>
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
                            <th>Modify Employee Datails</th>

                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectQuery = "select * from employee where companyId  = $companyID and status = 'A' ";
                        $squery = mysqli_query($con, $selectQuery);
                        while (($result = mysqli_fetch_assoc($squery))) {
                        ?>
                            <tr>
                                <td><?php echo $result['employeeId'];
                                    $empid = $result['employeeId'];
                                    $_SESSION['employeeId'] = $result['employeeId']; ?></td>
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
                                    <a href="changeEmpDetails.php?id=<?php echo $result['employeeId']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="expireEmployees.php?id=<?php echo $result['employeeId']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>


        </div>
    </div>