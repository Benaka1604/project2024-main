<?php
        include "DataBase.php";
        include "common.php";
        if(isset($_POST['Submit'])){
            $v_no=$_POST['v_no'];
            $em="SELECT * FROM `basic` WHERE`VNo`='$v_no';";
            $email=mysqli_query($conn,$em);
            $mrow=mysqli_fetch_assoc($email);
            $emailid=$mrow['Email'];
            $vtp=$mrow['VType'];
        if($vtp=='Bike'){
            $add="INSERT INTO `details` (`sl`, `Email`,`v_no`, `VNo`,`VType`, `InTime`, `OutTime`, `Totalhrs`, `Price`, `Payment`,`p_id`) VALUES  (NULL, '$emailid', '$v_no','$v_no','$vtp', current_timestamp(), current_timestamp(), NULL, NULL, 1,'$p_id');";
        }
        else{
            $add="INSERT INTO `details` (`sl`, `Email`,`v_no`, `VNo`,`VType`, `InTime`, `OutTime`, `Totalhrs`, `Price`, `Payment`,`p_id`) VALUES  (NULL, '$emailid', '$v_no','$v_no','$vtp', current_timestamp(), current_timestamp(), NULL, NULL, 1,'$p_id');";
            $t1="SELECT `slot` FROM `reserve` WHERE `booked`='Available';";
            $t2=mysqli_query($conn,$t1);
            $a1=mysqli_fetch_assoc($t2);
            $sl= $a1['slot'];
         
            $add2="UPDATE `reserve` SET `V_No`='$v_no',`booked`='Parked' WHERE`slot`=$sl;";
            $r1=mysqli_query($conn,$add2);
        }
            $result=mysqli_query($conn,$add);
            if($result){
                $otp=rand(1000,9999);
                $cha="UPDATE `basic` SET `Payment`=1,`OTP`=$otp WHERE `VNo`='$v_no';";
                $cha1=mysqli_query($conn,$cha);
                $cha2="UPDATE `details` SET `Payment`=0 WHERE `VNo`='$v_no';";
                $cha3=mysqli_query($conn,$cha2);
                if($cha3&&$cha1)
                    header('Location: Entry.php');
            }
        }
        
    ?>