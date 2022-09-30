<?php include '../dbconn.php';
include '../Headers/adminHeader.php';

session_start();

if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 1) {
    header("location: ../index.php");
    exit();
}

if (isset($_POST['code'])) {
    $code = $_POST['code'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $common = $_POST['common'];
    $commonValue = $_POST['commonValue'];
    $status = $_POST['status'];

    $sql1 = "SELECT * FROM salary_category WHERE code='$code'";
    $res1 = mysqli_query($con, $sql1);

    $query =
        "INSERT INTO salary_category(code,description,type,common,commonValue,status)
	     VALUES('$code','$description','$type','$common','$commonValue','$status')";

    if (mysqli_num_rows($res1) > 0) {
        echo "<script type='text/javascript'>alert('Existing Code!');location.href='addSaleryCategories.php'</script>";
    } else {
        $query = mysqli_query($con, $query);
        $userId = mysqli_insert_id($con);
        echo "<script type='text/javascript'>alert('Code Added Sucessfully');location.href='addSaleryCategories.php'</script>";
    }
}
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

<body>
    <div class="container-fluid" style="margin-top:30px !important;">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-9">
                    <h1>Current Salary Catrgories</h1>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tblUser">
                    <thead>
                        <tr>
                            <th>Category Code</th>
                            <th>Category Description</th>
                            <th>Category Type</th>
                            <th>Common</th>
                            <th>Common Value</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectQuery = "select * from salary_category ";
                        $squery = mysqli_query($con, $selectQuery);
                        while (($result = mysqli_fetch_assoc($squery))) {
                        ?>
                            <tr>
                                <td><?php echo $result['code']; ?></td>
                                <td><?php echo $result['description']; ?></td>
                                <td><?php echo $result['type']; ?></td>
                                <td><?php echo $result['common']; ?></td>
                                <td><?php echo $result['commonValue']; ?></td>
                                <td><?php echo $result['status']; ?></td>
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


    <div class="row" style="padding-left: 30%; ">
        <div class="col-lg-7" style="padding: 10%;">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Add New Salery Category</h4>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="form-input py-2" style="padding-left: 20px;  border-radius: 5px;background-color: #f2f2f2;padding: 20px;">
                        <div class="form-group">
                            <label class="form-control-label">Enter Salary Code</label>
                            <input type="text" name="code" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter description</label>
                            <input type="text" name="description" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter type</label>
                            <input type="text" name="type" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter common</label>
                            <input type="text" name="common" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter common value</label>
                            <input type="text" name="commonValue" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Select Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="Active">Active</option>
                                <option value="Non-Active">Non-Active</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <input type="submit" class="btnRegister" name="submit" value="Add Salary Category">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>