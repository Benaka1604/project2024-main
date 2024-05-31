<?php
session_start();
$_SESSION['email']='A';
session_destroy();
header('Location: home.php');

?>