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
    $delete = "delete from `login` where email = '$id'";
    $del="UPDATE `details` SET `T_hrs`=1 WHERE Email = '$id' ;";
    $res=mysqli_query($conn,$del);
    $result = mysqli_query($conn,$delete);
    if ($result) {
        header("Location: User.php");
    } else {
        echo " Something went wrong!!";
    }
}
// To delete data from table
if (isset($_GET['delemail'])) {
    $id = $_GET['delemail'];
    $delete = "delete from `login` WHERE email = '$id';";
    $del="UPDATE `clients` SET `Temp`=1 WHERE email = '$id' ;";
    $res=mysqli_query($conn,$del);
    $result = mysqli_query($conn,$delete);
    if ($result) {
        header("Location: c_data.php");
    } else {
        echo " Something went wrong!!";
    }
}
?>