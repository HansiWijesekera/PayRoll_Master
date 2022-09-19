<?php include '../dbconn.php';
include '../Headers/adminHeader.php';
session_start();

if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 1) {
    header("location: ../index.php");
    exit();
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
    <script>

    </script>
    <div class="container-fluid" style="margin-top:30px !important;">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-9">
                    <h1>Registerd Companies</h1>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tblUser">
                    <thead>
                        <tr>
                            <th>Company Id</th>
                            <th>Company Name</th>
                            <th>Salary Date</th>
                            <th>BRI</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectQuery = "select * from company";
                        $squery = mysqli_query($con, $selectQuery);
                        while (($result = mysqli_fetch_assoc($squery))) {
                        ?>
                            <tr>
                                <td><?php echo $result['companyId']; ?></td>
                                <td><?php echo $result['companyName']; ?></td>
                                <td><?php echo $result['salaryDate']; ?></td>
                                <td><?php echo $result['BRI']; ?></td>
                                <td><?php echo $result['status']; ?></td>
                                <td>
                                    <?php if ($result['status'] == "E") {
                                        ?>
                                           <a href="editCompany.php?id=<?php echo $result['companyId']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                        <?php
                                    } else {
                                    ?>
                                        <a href="editCompany.php?id=<?php echo $result['companyId']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="expireCompany.php?id=<?php echo $result['companyId']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        <a href="../Excel/excelUserUploadCompany.php?id=<?php echo $result['companyId']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-user"></i></a>
                                    <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <a href="newCompany.php" class="btn btn-primary btn-sm"> Add New Company</a>
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