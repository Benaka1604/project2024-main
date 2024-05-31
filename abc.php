<?php
include "DataBase.php";
include "common.php";
$sql = "SELECT * FROM `details` ORDER BY `InTime` ASC;";
$result = mysqli_query($conn, $sql);
echo $result;
?>