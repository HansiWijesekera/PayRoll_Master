<?php
    include '../dbconn.php';
    include '../Headers/companyHeader.php';

    session_start();

    if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 2) {
        header("location: ../index.php");
        exit();
    }

    $companyID = $_SESSION['companyId'];
    $userID = $_SESSION['userID'];

    $companyQuery = "SELECT * FROM company WHERE company.userId= $userID";
    $corpData = mysqli_query($con, $companyQuery);

    while (($fetchedCompany = mysqli_fetch_assoc($corpData))) {
        $time = strtotime($fetchedCompany['lastUpdateDate']);
        $final = date("Y-m-d", strtotime("+1 month", $time));
    }
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
    </head>
    <body>
        <div class="container-fluid" style="margin-top:30px !important;">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-md-9">
                        <h1>Employee Salaries</h1>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tblUser">
                        <thead>
                            <tr>
                                <th>Emplyee ID</th>
                                <th>Employee Name</th>
                                <th>Salary Date</th>
                                <?php
                                $categoryQuery = "select salary_category.description from salary_category inner join company_wise_categories on company_wise_categories.salaryCategoryCode = salary_category.code where company_wise_categories.companyId  = $companyID AND salary_category.status = 'E'";
                                $cateData = mysqli_query($con, $categoryQuery);

                                while (($fetchedCategory = mysqli_fetch_assoc($cateData))) {
                                    echo "<th>";
                                    echo $fetchedCategory['description'];
                                    echo "</th>";
                                }
                                ?>
                                <?php
                                $categoryQuery = "select salary_category.description from salary_category inner join company_wise_categories on company_wise_categories.salaryCategoryCode = salary_category.code where company_wise_categories.companyId  = $companyID AND salary_category.status <> 'E' order by salary_category.code ";
                                $cateData = mysqli_query($con, $categoryQuery);

                                while (($fetchedCategory = mysqli_fetch_assoc($cateData))) {
                                    echo "<th>";
                                    echo $fetchedCategory['description'];
                                    echo "</th>";
                                }
                                ?>
                                <th>Total Salary</th>
                                <th>Government Payments</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $employeeQuery = "select * from employee where employee.companyId = $companyID";
                            $employeeData = mysqli_query($con, $employeeQuery);
                            while (($fetchedEmp = mysqli_fetch_assoc($employeeData))) {
                                $employeeId = $fetchedEmp['employeeId'];
                                $reqSalary = 0;
                                $totalSalary = 0;
                                $governmentPay = 0;
                            ?>
                                <tr>
                                    <td class="employeeIds">
                                        <?php echo $fetchedEmp['employeeId']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fetchedEmp['employeeName']; ?>
                                    </td>
                                    <td>
                                        <?php echo $final; ?>
                                    </td>
                                    <?php
                                    $categoryQuery = "select salary_category.code, salary_category.type, salary_category.common, salary_category.commonValue, company_wise_categories.status, company_wise_categories.companyWiseCategoriesId from salary_category inner join company_wise_categories on company_wise_categories.salaryCategoryCode = salary_category.code where company_wise_categories.companyId  = $companyID AND salary_category.status = 'E'";
                                    $cateData = mysqli_query($con, $categoryQuery);

                                    while (($fetchedCategory = mysqli_fetch_assoc($cateData))) {
                                        $companyWiseCategoriesId = $fetchedCategory['companyWiseCategoriesId'];

                                        if ($fetchedCategory['commonValue'] == 0) {
                                            $empwisecateQuery = "select amount from employee_vise_categories where employee_vise_categories.employeeId = $employeeId AND employee_vise_categories.companyWiseCategoriesId = $companyWiseCategoriesId ";
                                            $epmwisecateData = mysqli_query($con, $empwisecateQuery);

                                            while (($fetchedEmpWiseCate = mysqli_fetch_assoc($epmwisecateData))) {
                                                $reqSalary += $fetchedEmpWiseCate['amount'];
                                                $totalSalary += $fetchedEmpWiseCate['amount'];

                                                echo "<td>";
                                                echo $fetchedEmpWiseCate['amount'];
                                                echo "</td>";
                                            }
                                        }
                                    }
                                    ?>
                                    <?php
                                    $categoryQuery = "select salary_category.code, salary_category.type, salary_category.common, salary_category.commonValue, company_wise_categories.status, company_wise_categories.companyWiseCategoriesId, salary_category.status as sal_cate_sts from salary_category inner join company_wise_categories on company_wise_categories.salaryCategoryCode = salary_category.code where company_wise_categories.companyId  = $companyID AND salary_category.status <> 'E'";
                                    $cateData = mysqli_query($con, $categoryQuery);

                                    while (($fetchedCategory = mysqli_fetch_assoc($cateData))) {
                                        $companyWiseCategoriesId = $fetchedCategory['companyWiseCategoriesId'];
                                        $cate_wise_salary = 0;

                                        if ($fetchedCategory['commonValue'] == 0) {
                                            $empwisecateQuery = "select amount from employee_vise_categories where employee_vise_categories.employeeId = $employeeId AND employee_vise_categories.companyWiseCategoriesId = $companyWiseCategoriesId ";
                                            $epmwisecateData = mysqli_query($con, $empwisecateQuery);

                                            if (mysqli_num_rows($epmwisecateData) > 0) {
                                                while (($fetchedEmpWiseCate = mysqli_fetch_assoc($epmwisecateData))) {
                                                    $cate_wise_salary += $fetchedEmpWiseCate['amount'];
                                                }
                                            } else {
                                                echo "<td>";
                                            ?>
                                                <input type="number" class="input-value <?php echo $fetchedCategory['code']; ?>" name="<?php echo $fetchedCategory['code'] . $fetchedEmp['employeeId']; ?>" />
                                            <?php
                                                echo "</td>";
                                            }
                                        } else {
                                            if ($fetchedCategory['common'] == 'Rate') {
                                                $cate_wise_salary += ($reqSalary * ($fetchedCategory['commonValue'] / 100));
                                            } elseif ($fetchedCategory['common'] == 'Amount') {
                                                $cate_wise_salary += $fetchedCategory['commonValue'];
                                            }
                                            ?>
                                    <?php
                                        }

                                        if($cate_wise_salary != 0){
                                            echo "<td>";
                                            echo $cate_wise_salary;
                                            echo "</td>";
                                        }

                                        if ($fetchedCategory['type'] == 'Addition') {
                                            $totalSalary += $cate_wise_salary;
                                        } elseif ($fetchedCategory['type'] == 'Deduction') {
                                            $totalSalary -= $cate_wise_salary;
                                        } elseif ($fetchedCategory['type'] == 'Company') {
                                        }

                                        if ($fetchedCategory['sal_cate_sts'] == 'G') {
                                            $governmentPay += $cate_wise_salary;
                                        }
                                    }

                                    echo "<td>";
                                    echo $totalSalary;
                                    echo "</td>";

                                    echo "<td>";
                                    echo $governmentPay;
                                    echo "</td>";

                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <input type="submit" class="btnRegister" name="submit" value="Add Salary">
                    </div>
                </div>
            </div>
        </div>
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