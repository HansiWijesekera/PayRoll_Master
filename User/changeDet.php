<?php include '../dbconn.php';
include '../Headers/userHeader.php';
//$userID = $_SESSION['userID'];
session_start();


if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 3) {
    header("location: ../index.php");
    exit();
}

$userID = $_SESSION['userID'];
$employeeID = $_SESSION['employeeId'];

?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylex.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <title>Add New User</title>
</head>

<div class="row" style="padding-left: 30%;">
    <div class="col-lg-7" style="padding: 10%;">
        <div class="card">
            <div class="card-header text-center">
                <h4>Change User Datails</h4>
            </div>

            <form method="post" enctype="multipart/form-data" id="target">
                <div class="form-input py-2" style="padding-left: 20px;  border-radius: 5px;background-color: #f2f2f2;padding: 20px;">
                    <?php
                    $selectQuery = "SELECT * FROM employee WHERE userId= $userID";
                    $squery = mysqli_query($con, $selectQuery);

                    while (($result = mysqli_fetch_assoc($squery))) {
                        $employeeId  = $result['employeeId'];

                        if (isset($_POST['employeeName'])) {

                            $employeeName = $_POST['employeeName'];
                            $joinDate = $_POST['joinDate'];
                            $address = $_POST['address'];
                            $nic = $_POST['nic'];
                            $dob = $_POST['dob'];
                            $cantactNo = $_POST['cantactNo'];
                            $jobTitle = $_POST['jobTitle'];
                            $email = $_POST['email'];

                            $query =
                                "UPDATE employee set employeeName='" . $employeeName . "', joinDate='" . $joinDate . "', 
                                 address='" . $address . "', nic='" . $nic . "',
                                 dob='" . $dob . "', cantactNo='" . $cantactNo . "', 
                                 jobTitle='" . $jobTitle . "', email='" . $email . "' WHERE userId = $userID";
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
                        }

                    ?>
                        <div class="form-group">
                            <label class="form-control-label">Enter Emoplyee Name</label>
                            <input type="text" name="employeeName" class="form-control" value="<?php echo $result['employeeName']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter Joined Date</label>
                            <input type="date" name="joinDate" class="form-control" value="<?php echo $result['joinDate']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $result['address']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter NIC</label>
                            <input type="text" name="nic" id="nic" class="form-control" minlength="10" maxlength="12" value="<?php echo $result['nic']; ?>" required />
                            <script>
                                $(document).ready(function() {
                                    $('#nic').change(function(e) {
                                        const nic = $(this).val();
                                        // should be requred
                                        if (nic == '') {
                                            alert('Nic requred');
                                        }
                                        // if length 10 
                                        else if (nic.length == 10) {
                                            // last letter should be X or V
                                            const lastLetter = nic[nic.length - 1];
                                            const numbers = nic.slice(0, nic.length - 1);
                                            console.log(numbers, !isNaN(numbers))
                                            if ((lastLetter === 'V' || lastLetter === 'X') && !isNaN(numbers)) {

                                            } else {
                                                alert('This is not a valid old nic number', (lastLetter === 'V' || lastLetter === 'X'), isNaN(numbers));
                                                document.getElementById('nic').value = "";
                                            }
                                        }
                                        // if length 13
                                        else if (nic.length == 12) {
                                            // only digits
                                            if (!isNaN(nic)) {} else {
                                                alert('This is not a valid new nic number', nic);
                                                document.getElementById('nic').value = "";
                                            }
                                        } else {
                                            alert('Please Enter Valid Nic');
                                            document.getElementById('nic').value = "";
                                            $('nic').show();
                                        }

                                    })
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter Date Of Birth</label>
                            <input type="date" name="dob" class="form-control" value="<?php echo $result['dob']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter Contact No</label>
                            <input type="tel" name="cantactNo" maxlength="10" minlength="10" value="<?php echo $result['cantactNo']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter Job Title</label>
                            <input type="text" name="jobTitle" class="form-control" required value="<?php echo $result['jobTitle']; ?>" />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter Email</label>
                            <input type="email" name="email" class="form-control" required value="<?php echo $result['email']; ?>" />
                        </div>

                    <?php
                    }

                    $selectQuery1 = "SELECT * FROM bankinfo WHERE employeeId ='" . $employeeId . "' ";
                    $squery1 = mysqli_query($con, $selectQuery1);

                    while (($resultx = mysqli_fetch_assoc($squery1))) {

                        if (isset($_POST['bankCode'])) {
                            $bankCode = substr($_POST['bankCode'], 0, 4);
                            $branchCode = $_POST['branchCode'];
                            $accountNumber = $_POST['accountNumber'];
                            $accoundHolder = $_POST['accoundHolder'];

                            $query1 =
                                "UPDATE bankinfo set bankCode='" . $bankCode . "', branchCode='" . $branchCode . "',  accountNumber='" . $accountNumber . "', accoundHolder='" . $accoundHolder . "' WHERE employeeId ='" . $employeeId . "'  ";
                            // if (count($_POST) > 0) {
                            //    mysqli_query($con, "UPDATE employee set companyName='" . $companyName . "', salaryDate='" . $salaryDate . "', 
                            //    BRI='" . $BRI . "', status='" . $status . "' WHERE userId = 13");
                            //    $message = "Record Modified Successfully";
                            //   }
                            if (count($_POST) > 0) {
                                if (mysqli_query($con, $query1)) {
                                    echo " <script type='text/javascript'>alert('User bank Details Modified Sucessfully');location.href='changeDet.php'</script>";
                                } else {
                                    echo "Error" . $query . "<br>" . mysqli_error($con);
                                }
                            }
                        }

                    ?>
                        <div class="form-group">
                            <label class="form-control-label">Enter Bank Code</label>
                            <div>
                                <?php
                                $queryX = "SELECT * FROM ref_bank";
                                $result = $con->query($queryX);
                                if ($result->num_rows > 0) {
                                    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                }
                                ?>
                                <select name="bankCode" value="" style="width:101%; height: 200%;" required>
                                    <option><?php echo $resultx['bankCode']; ?></option>
                                    <?php
                                    foreach ($options as $option) {
                                    ?>
                                        <option><?php echo $option['bankCode']; ?> <?php echo ' - ' . $option['bankName']; ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter Branch code</label>
                            <input type="number" name="branchCode" class="form-control" min="0" max="999" value="<?php echo $resultx['branchCode']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter Account Number</label>
                            <input type="text" name="accountNumber" class="form-control" value="<?php echo $resultx['accountNumber']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Enter Account Holder</label>
                            <input type="text" name="accoundHolder" class="form-control" value="<?php echo $resultx['accoundHolder']; ?>" required />
                        </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Update Details">
                    </div>
                </div>
            </form><br>
            <div style="text-align: center;">
                <button type="button" class="btn btn-primary" id="modifyButton">Modify Details</button>
                <button type="button" class="btn btn-primary" id="goback">Go back</button>
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