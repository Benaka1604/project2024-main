<?php
// session_start();
include "DataBase.php";
include "common.php";
$sql = "SELECT `Email`,`VNo` FROM `details` WHERE`Payment`=0 order by 'VNo';";
$result = mysqli_query($conn, $sql);
// if ($_SESSION['admin_id'] != 1) {
//     header('Location: home.php');
// }

if(isset($_POST['Submit'])){
    $email1=$_POST['ve_no'];




    $v_no = mysqli_query($conn, $sql);
    $nrow = mysqli_fetch_assoc($v_no);
    $veno=$nrow['VNo'];
    $cha="UPDATE `basic` SET `Payment`=NULL WHERE `Email`='$email1';";
    $cha1=mysqli_query($conn,$cha);
    $cha2="UPDATE `details` SET `Payment`=1 ,`VNo`=NULL WHERE Email='$email1';";
    $cha3=mysqli_query($conn,$cha2);
    if($cha3){
        header('Location: Exit.php');
    }
}
if(isset($_POST['otp_val'])){
    $v_no=$_SESSION['V_no'];
    $OTp=$_POST['otp'];
    
    $em1="SELECT OTP FROM `basic` WHERE`VNo`='$v_no';";
    $result1=mysqli_query($conn,$em1);
    $row1 = mysqli_fetch_array($result1);
    
    // echo $OTp;
    // echo $row1['OTP'];
    if($OTp==$row1['OTP']){
        // echo $OTp;
        $c_time=date('Y-m-d G:i:s');
        $v_no=$_SESSION['V_no'];
        $run2="UPDATE `details` SET `OutTime` = '$c_time' WHERE VNo = '$v_no'";
        $update1=mysqli_query($conn, $run2);  
        $ve_no="SELECT 'VType' FROM `details` WHERE `VNo`='$v_no';";
        $v_no1 = mysqli_query($conn, $ve_no);
        $ow = mysqli_fetch_assoc($v_no1);
        if($ow=="Car"){
            $add2="UPDATE `reserve` SET `V_No`=NULL,`$email`='Available' WHERE`$p_id`='$v_no';";
            $r1=mysqli_query($conn,$add2);
        }
        header("Location:Exit.php?vno=$v_no");
    }
    else{
        $fail='Fail';
        header("Location:Exit.php?v_no=$v_no&try=$fail");
    } 
}

if(isset($_POST['Unsubmit'])){
        header('Location: Exit.php');
}
?>