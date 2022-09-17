<?php
include '../dbconn.php';
include '../Headers/companyHeader.php';
session_start();
//$name = $_SESSION['userid'];
// echo $name;
if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 2) {
    header("location: ../index.php");
    exit();
}

$userID = $_SESSION['userID'];
$companyID = $_SESSION['companyId'];

$id = $_GET['id'];
$selectQuery1 = "select employeeId from salary where salaryId = $id ";
$squery1  = mysqli_query($con, $selectQuery1);
while (($result1 = mysqli_fetch_assoc($squery1))) {
    $employeeID = implode(array_slice($result1, 0));
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
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
</head>

<body>
    <script>

    </script>
    <div class="container-fluid" style="margin-top:30px !important;">
        <form id="form1">
            <div class="container" id="dvContainer">
                <div class="row mb-2">
                    <div class="col-md-9">
                        <h1>Salary Brakedown</h1>
                        <H4>Emplyee details </H4>
                        <H6>
                            <?php
                            $selectQuery = "select * from employee inner join salary on employee.employeeId = salary.employeeId where salaryId  = $id ";
                            $squery = mysqli_query($con, $selectQuery);
                            while (($result = mysqli_fetch_assoc($squery))) {
                                echo "Employee Name -  " . $result['employeeName'] . "<br>" .
                                    "Employee Nic -  " . $result['nic']  . "<br>" .
                                    "Employee Email -  " .  $result['email'] . "<br>" .
                                    "Salary No -  " .  $result['salaryNo'] . "<br>" .
                                    "Paid Date -  " .  $result['paidDate'] . "<br>";
                            }
                            ?></h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tblUser">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Amount</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selectQuery = "select * from salary_category INNER join ( salary_brakedown inner join company_wise_categories on company_wise_categories.companyWiseCategoriesId = salary_brakedown.companyWiseCategoriesID) 
                                        ON salary_category.code = company_wise_categories.salaryCategoryCode where salaryId = $id ";
                            $squery = mysqli_query($con, $selectQuery);
                            while (($result = mysqli_fetch_assoc($squery))) {
                            ?>
                                <tr>
                                    <td> <?php echo $result['description']; ?></td>
                                    <td> <?php echo $result['type']; ?></td>
                                    <td><?php echo $result['amount']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>

                            <?php
                            $selectQuery = "select * from  salary_category INNER JOIN (employee_vise_categories inner join company_wise_categories on company_wise_categories.companyWiseCategoriesId = employee_vise_categories.companyWiseCategoriesID) ON
                        salary_category.code = company_wise_categories.salaryCategoryCode where employee_vise_categories.employeeId = $employeeID ";
                            $squery = mysqli_query($con, $selectQuery);
                            while (($result = mysqli_fetch_assoc($squery))) {
                            ?>
                                <tr>
                                    <td> <?php echo $result['description']; ?></td>
                                    <td> <?php echo $result['type']; ?></td>
                                    <td><?php echo $result['amount']; ?></td>
                                <tr>
                                <?php
                            }
                                ?>

                                <tr>
                                    <td style="color: red;">TOTAL SALARY</TD>
                                    <TD></TD>
                                    <td style="color: red;">
                                        <?php
                                        $selectQuery1 = "select * from salary  where salaryId = $id ";
                                        $squery1  = mysqli_query($con, $selectQuery1);
                                        while (($result1 = mysqli_fetch_assoc($squery1))) {
                                            echo $result1['payableAmount'];
                                        }
                                        ?></td>
                                </tr>

                                <?php

                                ?></td>
                                </tr>



                        </tbody>
                    </table>

                </div>


            </div>
            <br><br>
            <input type="button" class="btn btn-primary btn-sm" value="Print Pay Slip" id="btnPrint" />
        </form>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function() {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=800,width=1200');
            printWindow.document.write('<html><head><title>Pay Slip -  <?php echo $result['employeeName']; ?> </title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#tblUser').DataTable();
            $("#form-body").hide();

            $("#insert-btn").on('click', function() {
                $("#form-body").toggle(500);
            });

            $("#submit").on('click', function(e) {
                e.preventDefault();

                var name = $('#name').val();
                var email = $('#email').val();

                $.ajax({
                    url: "insert_data.php",
                    type: "POST",
                    data: {
                        name: name,
                        email: email
                    },
                    success: function(data) {
                        alert("Data Inserted Successfully");
                        $("#form-body").hide();
                        location.reload(true);
                    }
                });

            });

        });
    </script>

</body>

</html>