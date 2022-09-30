<?php include '../dbconn.php';
include '../Headers/adminHeader.php';
session_start();
if (!isset($_SESSION['userID']) || $_SESSION['userType'] != 1) {
    header("location: ../index.php");
    exit();
}

$userID = $_SESSION['userID'];


if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT * from user WHERE userID= 1");
    $row = mysqli_fetch_array($result);
    if (MD5($_POST["currentPassword"]) == $row["password"]) {
        mysqli_query($con, "UPDATE user set password = '" .  MD5($_POST["newPassword"]) . "' WHERE userId= $userID");
        echo " <script type='text/javascript'>alert('Password Changed');location.href='../index.php'</script>";
    } else
        echo " <script type='text/javascript'>alert('Current Password Incorrect');location.href='changePwd.php'</script>";
}
?>
<html>

<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <script>
        function validatePassword() {
            var currentPassword, newPassword, confirmPassword, output = true;

            currentPassword = document.frmChange.currentPassword;
            newPassword = document.frmChange.newPassword;
            confirmPassword = document.frmChange.confirmPassword;

            if (!currentPassword.value) {
                currentPassword.focus();
                document.getElementById("currentPassword").innerHTML = "required";
                output = false;
            } else if (!newPassword.value) {
                newPassword.focus();
                document.getElementById("newPassword").innerHTML = "required";
                output = false;
            } else if (!confirmPassword.value) {
                confirmPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "required";
                output = false;
            }
            if (newPassword.value != confirmPassword.value) {
                newPassword.value = "";
                confirmPassword.value = "";
                newPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "Password didn't match";
                output = false;
            }
            return output;
        }
    </script>
</head>

<body>



    <div class="row" style="padding-left: 30%; padding-top: 70px; ">
        <div class="col-lg-7" style="padding: 10%;">
            <div class="card" style="width: 450px;">
                <div class="card-header text-center">
                    <h4>Change Password</h4>
                </div>

                <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
                    <div style="width: 500px;">
                        <div class="message"><?php if (isset($message)) {
                                                    echo $message;
                                                } ?></div>
                        <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
                            <tr class="tableheader">
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td width="40%"><label>Current Password</label></td>
                                <td width="60%"><input type="password" name="currentPassword" class="txtField" /><span id="currentPassword" class="required"></span></td>
                            </tr>
                            <tr>
                                <td><label>New Password</label></td>
                                <td><input type="password" name="newPassword" class="txtField" /><span id="newPassword" class="required"></span></td>
                            </tr>
                            <td><label>Confirm Password</label></td>
                            <td><input type="password" name="confirmPassword" class="txtField" /><span id="confirmPassword" class="required"></span></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
                            </tr>
                        </table>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>



</html>