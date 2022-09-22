<?php include '../dbconn.php';
include '../Headers/adminHeader.php';
session_start();
if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 1) {
    header("location: ../index.php");
    exit();
}

$userID = $_SESSION['userID'];

if (isset($_POST['submit'])) {
    $password = MD5($_POST['password']);
    $userName = $_POST['userName'];
    $userType = "1";

    $sql1 = "SELECT * FROM user WHERE userName='$userName'";
    $res1 = mysqli_query($con, $sql1);

    $query =
        "INSERT INTO user(userName,password,userType)
	     VALUES('$userName','$password','$userType')";

    if (mysqli_num_rows($res1) > 0) {
        echo " <script type='text/javascript'>alert('Username Already Registerd');location.href='newCompany.php'</script>";
    } else {
        // $userID = mysqli_insert_id($con);
        if ($query = mysqli_query($con, $query)) {
            echo " <script type='text/javascript'>alert('Admin Added Succesfully');location.href='../Excel/excelUserUpload.php'</script>";
        } else {
        }
        echo " <script type='text/javascript'>alert('User Added Sucessfully');location.href='newCompany.php'</script>";
    }
}
?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylex.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <title>Add New User</title>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        $(function() {
            $('#input1').on('keypress', function(e) {
                if (e.which == 32) {
                    alert('UserName can not include spacers');
                    return false;
                }
            });
        });
    </script>

</head>

<div class="row" style="padding-left: 30%; padding-top: 70px; ">
    <div class="col-lg-7" style="padding: 10%;">
        <div class="card">
            <div class="card-header text-center">
                <h4>Add New Admin</h4>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="form-input py-2" style="padding-left: 20px;  border-radius: 5px;background-color: #f2f2f2;padding: 20px;">
                    <div class="form-group">
                        <label class="form-control-label">Enter UserName</label>
                        <input type="text" name="userName" class="form-control" id="input1" required />
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Enter Password For User</label>
                        <input type="password" name="password" class="form-control" id="password" required />
                        <input type="checkbox" onclick="myFunction()">Show Password
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Add Admin">
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>