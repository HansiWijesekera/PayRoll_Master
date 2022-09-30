<?php include '../dbconn.php';
include '../Headers/companyHeader.php';

session_start();
if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 2) {
    header("location: ../index.php");
    exit();
}

$companyID = $_SESSION['companyId'];
$userID = $_SESSION['userID'];

?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylex.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <title>Add New User</title>
</head>

<div class="row" style="padding-left: 30%; ">
    <div class="col-lg-7" style="padding: 10%;">
        <div class="card">
            <div class="card-header text-center">
                <h4>Change Company Datails</h4>
            </div>


            <form method="post" enctype="multipart/form-data" id="target">
                <div class="form-input py-2" style="padding-left: 20px;  border-radius: 5px;background-color: #f2f2f2;padding: 20px;">
                    <?php
                    $selectQuery = "SELECT * FROM company WHERE userId= $userID ";
                    $squery = mysqli_query($con, $selectQuery);

                    while (($result = mysqli_fetch_assoc($squery))) {


                        if (isset($_POST['companyName'])) {
                            $companyName = $_POST['companyName'];
                            $salaryDate = $_POST['salaryDate'];
                            $BRI = $_POST['BRI'];

                            $query =
                                "UPDATE company set companyName='" . $companyName . "', salaryDate='" . $salaryDate . "', 
                                BRI='" . $BRI . "' WHERE userId = $userID ";
                            // if (count($_POST) > 0) {
                            //    mysqli_query($con, "UPDATE employee set companyName='" . $companyName . "', salaryDate='" . $salaryDate . "', 
                            //    BRI='" . $BRI . "', status='" . $status . "' WHERE userId = 13");
                            //    $message = "Record Modified Successfully";
                            //   }
                            if (count($_POST) > 0) {
                                if (mysqli_query($con, $query)) {
                                    echo " <script type='text/javascript'>alert('User Details Modified Sucessfully');location.href='changeDet.php'</script>";
                                } else {
                                    echo "Error" . $query . "<br>" . mysqli_error($con);
                                }
                            }
                            mysqli_close($con);
                        }

                    ?>
                        <div class="form-group">
                            <label class="form-control-label">Enter company Name</label>
                            <input type="text" name="companyName" class="form-control" value="<?php echo $result['companyName']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter salary Day</label>
                            <input type="date" name="salaryDate" class="form-control" value="<?php echo $result['salaryDate']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter BRI</label>
                            <input type="text" name="BRI" class="form-control" value="<?php echo $result['BRI']; ?>" required />
                        </div>

                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Update Details">
                    </div>

                </div>
            </form><br>
            <div style="text-align: center;">
                <button type="button" class="btn btn-primary" id="modifyButton">Modify Details</button>
                <button type="button" class="btn btn-primary" id="goback">Go Back</button>
            </div><br>
            <script>
                $("#target :input").prop("disabled", true);
                $("#modifyButton").click(function() {
                    $("#target :input").prop("disabled", false);
                });
                $("#goback").click(function() {
                    $("#target :input").prop("disabled", true);
                });
            </script>
        </div>
    </div>
</div>