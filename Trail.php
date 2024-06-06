<!-- Old Reservation table code -->

<?php 
include('DataBase.php');
include('Common.php');
$ch4='Unavailable';
$e="SELECT `VNo` FROM `basic` WHERE `Email`='$email';";
$e1=mysqli_query($conn,$e);
$vn=mysqli_fetch_assoc($e1);
$vno=$vn['VNo'];

$check1="SELECT `booked` FROM `reserve` WHERE `V_No`='$vno';";
$ch2=mysqli_query($conn,$check1);
$ch3=mysqli_fetch_assoc($ch2);
if(mysqli_num_rows($ch2)==1){
$ch4=$ch3['booked'];}

$aa="SELECT * FROM `reserve`;";
$ab=mysqli_query($conn,$aa);
$r1=mysqli_fetch_array($ab);
$slot=[];
$VNo=[];
$stat=[];
    while ($row = mysqli_fetch_array($ab)) {
        $slot[]=$row['slot'];
        $VNo[]=$row['V_No'];
        $stat[]=$row['booked'];
    }
    // echo $stat[0];


if(isset($_POST['Sub1'])){
    $slots=$_POST['slot'];
    $v_no=$_POST['vno'];
    $mail=$_POST['email'];
    $r1="UPDATE `reserve` SET `V_No`='$v_no',`booked`='Reserved' WHERE `slot`=$slots;";
    $r2=mysqli_query($conn,$r1);
    // echo $slots."-". $v_no. "-". $mail;
    header('Location:Trail.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Lot</title>
    <!-- <link rel="stylesheet" href="dm2.css"> -->
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    /* display: flex; */
    justify-content: center;
    align-items: center;
    /* height: 100vh; */
    margin-left: 35px;
    width: 580px;
    /* margin: 0; */
}

.parking-lot1 {
    margin-top: 50px;
    display: grid;
    grid-template-columns: repeat(10, 120px);
    gap: 10px;
    /* background-color: #2c3e50; */
    padding: 20px;
    border-radius: 10px;
}

.parking-space {
    margin-left:5px;
    width: 120px;
    height: 140px;
    background-color: #ecf0f1;
    border: 2px solid #bdc3c7;
    border-radius: 5px;
    position: relative;
}

.parking-space::before {
    content: attr(id);

    position: absolute;
    top: 5px;
    left: 5px;
    font-size: 16px;
    color: #7f8c8d;
}

#box{
    padding-top:10px;
    width:80px;
    margin-top:10px;
    margin-left:5px;
}

#box1{
    width:80px;
    margin-top:8px;
    margin-left:8px;
}
    </style>
</head>
<body>
    

<div class="parking-lot1">

    <?php $i=0;
    // $k=$i+10;
    while($i<20){?>
        <div class="parking-space" id="<?php print($slot[$i]);?>">
        <form action="Trail.php" method="post">
        <br>    
        <p>
            
            <input type="text" name="slot" id="box" value="<?php print($i+1);?>" hidden></p>
            <p><input type="text" name="email" id="box" value="<?php print($email);?>" hidden></p>
            <p><input type="text" name="vno" id="box" value="<?php print($vno);?>" hidden></p>
            
            <p>
            
            <!-- <input type="text" name="vno" id="box1" value="<?php print($id);?>"> --></p><p>
            <label for="" id="box" style="margin-left:5px;"><?php print($stat[$i]);?></label><br><br>
            <label for="" id="box" style="margin-left:5px;"><?php print($VNo[$i]);?></label>
            <!-- <input type="text" name="id" id="box1" value="<?php print($i);?>"> --></p>
            
            <?php if($stat[$i]=='Available'&(!($ch4=='Parked'|$ch4=='Reserved'))){
                echo<<<a
                <input type="submit" style="margin-left:5px;" value="Reserve" name="Sub1"/>
        a;
        }?>
        </form>
    </div>
    <?php
    $i++;
    }?>


        <!-- <div class="parking-space" id="12"></div>
        <div class="parking-space" id="13"></div>
        <div class="parking-space" id="14"></div>
        <div class="parking-space" id="15"></div>
        <div class="parking-space" id="16"></div>
        <div class="parking-space" id="17"></div>
        <div class="parking-space" id="18"></div>
        <div class="parking-space" id="19"></div>
        <div class="parking-space" id="20"></div> -->
        <!-- <div class="parking-space" id="21"></div>
        <div class="parking-space" id="22"></div>
        <div class="parking-space" id="23"></div>
        <div class="parking-space" id="24"></div>
        <div class="parking-space" id="25"></div> -->
    </div>
    </div>

<?php
if(!($ch4=='Parked'|$ch4=='Reserved'))
{
// echo $ch4;
}
else{
    // echo "Hello";
}
    // echo $vno;
// echo $email;
    // $t1="SELECT `slot` FROM `reserve` WHERE `booked`='Available';";
    // $t2=mysqli_query($conn,$t1);
    // $a1=mysqli_fetch_assoc($t2);
    // $sl= $a1['slot'];
    // echo $sl;
?>

    <div class="parking-lot">
        



        <!-- <div class="parking-space" id="12"></div>
        <div class="parking-space" id="13"></div>
        <div class="parking-space" id="14"></div>
        <div class="parking-space" id="15"></div>
        <div class="parking-space" id="16"></div>
        <div class="parking-space" id="17"></div>
        <div class="parking-space" id="18"></div>
        <div class="parking-space" id="19"></div>
        <div class="parking-space" id="20"></div> -->
        <!-- <div class="parking-space" id="21"></div>
        <div class="parking-space" id="22"></div>
        <div class="parking-space" id="23"></div>
        <div class="parking-space" id="24"></div>
        <div class="parking-space" id="25"></div> -->
    </div>
</body>
</html>


