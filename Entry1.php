<?php
        include "DataBase.php";
        include "common.php";
        if(isset($_POST['Submit'])){
            $v_no1=$_POST['v_no'];
            $v_no=strtoupper($v_no1);
            $em="SELECT * FROM `basic` WHERE`VNo`='$v_no' ;";
            $em1="SELECT * FROM `basic` WHERE`VNo`='$v_no' and Payment is NULL;";
            $email2=mysqli_query($conn,$em);
            $email1=mysqli_query($conn,$em1);
            $a1=mysqli_num_rows($email2);  
            $a2=mysqli_num_rows($email1);  
            echo $a1;
            echo $a2;
            if($a1==1){
                if($a2==1){
                    $mrow=mysqli_fetch_assoc($email2);
                    $emailid=$mrow['Email'];
                    $vtp=$mrow['VType'];
                    if($vtp=='Bike'){
                        $add="INSERT INTO `details` (`sl`, `Email`,`v_no`, `VNo`,`VType`, `InTime`, `OutTime`, `Totalhrs`, `Price`, `Payment`,`p_id`) VALUES  (NULL, '$emailid', '$v_no','$v_no','$vtp', current_timestamp(), current_timestamp(), NULL, NULL, 1,'$p_id');";
                    }
                    else{
                        $add="INSERT INTO `details` (`sl`, `Email`,`v_no`, `VNo`,`VType`, `InTime`, `OutTime`, `Totalhrs`, `Price`, `Payment`,`p_id`) VALUES  (NULL, '$emailid', '$v_no','$v_no','$vtp', current_timestamp(), current_timestamp(), NULL, NULL, 1,'$p_id');";
                        $t1="SELECT `slot` FROM `reserve` WHERE `$email`='Available';";
                        $t2=mysqli_query($conn,$t1);
                        $a1=mysqli_fetch_assoc($t2);
                        $sl= $a1['slot'];
                    
                        $add2="UPDATE `reserve` SET `$p_id`='$v_no',`$email`='Parked' WHERE`slot`=$sl;";
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
                            header('Location: Entry-c.php');
                            // echo $v_no;
                    }
                }
                else{
                    header('Location: Entry-c.php?abc=2');
                    // echo $v_no;
                }
            }
            else
            {
                // echo $v_no;
                header('Location: Entry-c.php?abc=1');
            }
        }
    
        
    ?>