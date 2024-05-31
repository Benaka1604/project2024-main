<?php
// session is started
session_start();
include 'DataBase.php';

// here we check the admin is logged in or not

if ($_SESSION['admin_id'] != 1) {
    header('Location: home.php');
}

// To delete data from table
if (isset($_GET['deleteVNo'])) {
    $id = $_GET['deleteVNo'];
    $delete = "delete from `basic` where VNo = '$id'";
    $result = mysqli_query($conn,$delete);
    if ($result) {
        header("Location: admin.php");
    } else {
        echo " Something went wrong!!";
    }
}

?>