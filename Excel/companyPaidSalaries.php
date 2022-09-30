<?php
include '../dbconn.php';
include '../Headers/companyHeader.php';

session_start();
error_reporting(0);

if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 2) {
    header("location: ../index.php");
    exit();
}

$userID = $_SESSION['userID'];
$companyID = $_SESSION['companyId'];

if (isset($_POST['submit'])) {
    $_SESSION['employeeName'] = $_POST['employeeName'];
    // $companyID = $result1[0];

}
$employeeName = $_SESSION['employeeName'];

$selectQuery1 = "select employeeId from employee where employeeName = '$employeeName' ";
$squery1  = mysqli_query($con, $selectQuery1);
while (($result1 = mysqli_fetch_assoc($squery1))) {
    $employeeID = implode(array_slice($result1, 0));
}
$today = DATE("Y-m-d");

?>

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


<div class="container">
    <br><br> <br>
    <div class="card">
        <div class="container-fluid">
            <form method="post">
                <label class="form-control-label">Please Select Employee</label>
                <div>
                    <?php
                    $queryX = "SELECT * FROM employee where companyId = $companyID";
                    $result = $con->query($queryX);
                    if ($result->num_rows > 0) {
                        $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    }
                    ?>
                    <select name="employeeName" required>
                        <option>Select Employee</option>
                        <?php
                        foreach ($options as $option) {
                        ?>
                            <option><?php echo $option['employeeName']; ?> <?php echo ' - ' . $option['nic']; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit">
                </div><br>

            </form>

        </div>
    </div>
    <br><br>
    <div class="row mb-2">
        <div class="col-md-9">
            <h1>Paid Salaries - <?php echo $employeeName; ?></h1>
        </div>
    </div>
    <div class="table-responsive">
        <table id="tblUser">
            <thead>
                <tr>
                    <th>Salary Number</th>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Paid Amount</th>
                    <th>Paid Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selectQuery = "select * from salary where salary.employeeId  = $employeeID and paidDate is not null ";
                $squery = mysqli_query($con, $selectQuery);
                while (($result = mysqli_fetch_assoc($squery))) {
                ?>
                    <tr>
                        <td><?php echo $result['salaryNo']; ?></td>
                        <td><?php echo $result['payableAmount']; ?></td>
                        <td><?php echo $result['dueDate']; ?></td>
                        <td><?php echo $result['settledAmount']; ?></td>
                        <td><?php echo $result['paidDate']; ?></td>
                        <td>
                            <a href="brakedown.php?id=<?php echo $result['salaryID']; ?>" class="btn btn-primary btn-sm">View Brakedown</a>
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