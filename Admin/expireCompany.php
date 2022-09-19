<?php include '../dbconn.php';

session_start();

$id = $_GET['id'];


$selectQuery = "SELECT * FROM company WHERE companyId = $id";
$squery = mysqli_query($con, $selectQuery);

while (($result = mysqli_fetch_assoc($squery))) {
    $userId  = $result['userId'];
    //echo $userId;
}

$queryX = "update user set userType = '4' where userID = $userId ";
if (mysqli_query($con, $queryX)) {
    $query = "update company set status = 'E' where companyId = $id ";
    if (mysqli_query($con, $query)) {
        echo " <script type='text/javascript'>alert('Company Details Modified Sucessfully');location.href='companyPlatform.php'</script>";
    }
} else {
    echo " <script type='text/javascript'>alert('Error in Company details modification');location.href='companyPlatform.php'</script>";
}
