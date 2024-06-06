<?php
    include('DataBase.php');
    session_start();
    $email='A@gmail.com';
    date_default_timezone_set("Asia/Calcutta")."<br>";
    if(array_key_exists("email",$_SESSION)){
        $email=$_SESSION['email'];
    }   
    $person=0;
    if(array_key_exists("person",$_SESSION)){
        $person=$_SESSION['person'];
    }  
    $t_car=30;
    $t_bike=20;
    $p_id=0;
    if(array_key_exists("p",$_SESSION)){
        $p_id=$_SESSION['p'];
    } 
    if($person==2){
        $pid="SELECT `p_id` FROM `clients` WHERE `Email`='$email';";
        $pid1=mysqli_query($conn,$pid);
        $pid2=mysqli_fetch_assoc($pid1);
        $p_k=$pid2['p_id'];
        $_SESSION['p']=$p_k;
    }

    $re='UDAYAGIRI';
    if(array_key_exists("re",$_SESSION)){
        $re=$_SESSION['re'];
    }

?>