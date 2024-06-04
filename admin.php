<?php
// session_start();
include "DataBase.php";
include "common.php";
$sql = "SELECT * FROM `details`;";
$result = mysqli_query($conn, $sql);
// if ($_SESSION['admin_id'] != 1) {
//     header('Location: home.php');
// }

$date1=date('Y-m-d 00:00:00');
// echo $date1.'<br>';
$date=date('d');
$d=$date+1;
$y=date('Y-m');
$date2=$y.'-'.$d.' 00:00:00';
// echo $date2;
// echo $person;
// echo $email;
if($person==2){
    $pid="SELECT `p_id` FROM `clients` WHERE `Email`='$email';";
    $pid1=mysqli_query($conn,$pid);
    $pid2=mysqli_fetch_assoc($pid1);
    $p_id=$pid2['p_id'];
    // echo $p_id;
    $incount="SELECT COUNT(Email) as Incount FROM `details` WHERE `InTime`>'$date1' AND `InTime`<'$date2' AND `p_id`=$p_id;";
    $outcount="SELECT COUNT(Email) as Outcount FROM `details` WHERE `OutTime`>'$date1' AND `OutTime`<'$date2' AND`Payment`=1 AND `p_id`=$p_id;";
    $sum="SELECT SUM(Price) as income FROM `details` WHERE `OutTime`>'$date1' AND `OutTime`<'$date2' AND `Payment`=1 AND `p_id`=$p_id;";
    $vec="SELECT COUNT(Email) as Vech FROM `details` WHERE `Payment`=0 AND `p_id`=$p_id;";
}
elseif($person==3){
    // echo $p_id;
    $incount="SELECT COUNT(Email) as Incount FROM `details` WHERE `InTime`>'$date1' AND `InTime`<'$date2' ;";
    $outcount="SELECT COUNT(Email) as Outcount FROM `details` WHERE `OutTime`>'$date1' AND `OutTime`<'$date2' AND`Payment`=1;";
    $sum="SELECT SUM(Price) as income FROM `details` WHERE `OutTime`>'$date1' AND `OutTime`<'$date2' AND `Payment`=1;";
    $vec="SELECT COUNT(Email) as Vech FROM `details` WHERE `Payment`=0";
}

// $incount="SELECT COUNT(Email) as Incount FROM `details` WHERE `InTime`>'$date1' AND `InTime`<'$date2';";
$up=mysqli_query($conn,$incount);
$row=mysqli_fetch_array($up);
// $outcount="SELECT COUNT(Email) as Outcount FROM `details` WHERE `OutTime`>'$date1' AND `OutTime`<'$date2' AND`Payment`=1;";
$up1=mysqli_query($conn,$outcount);
$row1=mysqli_fetch_array($up1);
// $sum="SELECT SUM(Price) as income FROM `details` WHERE `OutTime`>'$date1' AND `OutTime`<'$date2' AND `Payment`=1;";
$sum1=mysqli_query($conn,$sum);
$row2=mysqli_fetch_array($sum1);
$in=$row['Incount'];
$out=$row1['Outcount'];
$sum3=$row2['income'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="prjlogo.jpeg">
    <style>
        .widget2{
    width: 320px;
    height: 280px;   
    padding: 20px;
    border-radius: 5%;
    padding-left: 12px;
    overflow: hidden;
    /* text-align: center; */
    
}
    </style>
</head>
<body>
    <header>
        <!-- <div class="heddiv"> -->
            <!-- <img src="/bag.jpg" alt="sry" class="img1"> -->
        <!-- </div> -->
        <h1>VEHICLE PARKING HOME PAGE</h1>
        
    </header>
    <nav>
        <a href="/project2024-main/Admin.php">Home</a>
<?php
if($p_id==0){?>
    <a href="/project2024-main/Table.php">History</a>
    <a href="/project2024-main/User.php">Users</a>
    <a href="/project2024-main/c_data.php">Clients</a>
    <a href="/project2024-main/c_reg.php">Client Register</a>
    <?php
}
else{?>
    <a href="/project2024-main/Table1.php">History</a>
    <a href="/project2024-main/Entry-c.php" target="_blank">Vehicle Entry</a>
        <a href="/project2024-main/Exit.php" target="_blank">Vehice Exit</a>
<?php
}?>

        
        <!-- <a href="/project2024-main/Reserve.php">Reservation</a> -->
        

        <a href="/project2024-main/Logout.php">Logout</a>
    </nav>



    
    
    
       <h1 style="text-align:center;">Home Page</h1>

       <div class="widgbag">
    <div class="dashboard">
        <div class="widget2">
            <h2 class="hd" >Number of vehicle Entered </h2>
            <p>
               <?php
                    echo $in;
               ?>
            </p>
            <h2  class="hd" >Number of vehicles Exited</h2>
            <p>
            <?php
                    echo $out;
                    
               ?>
            </p>
        </div>
        <div class="widget2">
        <h2  class="hd" >Total Amount collected today...!</h2>
            <p>
                <?php
                    echo $sum3;
               ?> 
            </p>
        </div>
        <div class="widget2">
        <h2  class="hd" >Number of vehicles in parking...!</h2>
            <p>
                <?php
                    // $vec="SELECT COUNT(Email) as Vech FROM `details` WHERE `Payment`=0";
                    $up2=mysqli_query($conn,$vec);
                    $row3=mysqli_fetch_array($up2);
                    echo $row3['Vech'];
               ?> 
            </p>
        </div >
    </div >
    <!-- <div class="widgbag">
    <div class="dashboard">
        <div class="widget1">
            <h2 class="hd" >Widget 1</h2>
            <p>This is the content of widget 1.</p>
        </div>
        <div class="widget1">
            <h2  class="hd" >Widget 2</h2>
            <p>This is the content of widget 2.</p>
        </div>
        <div class="widget1">
            <h2  class="hd" >Widget 3</h2>
            <p>This is the content of widget 3.  </p>
        </div >
    </div > -->
      




<footer>
    <div class="social-icons">
        
        <a href="https://www.facebook.com/yourpage"><img src="/fblogo.jpeg" alt="Facebook" class="socialic"></a>
        
        <a href="https://www.instagram.com/yourpage"><img src="/instalogo.jpeg" alt="Instagram" class="socialic"></a>
        <a href="https://twitter.com/yourpage"><img src="/xlogo.jpeg" alt="Twitter X" class="socialic"></a>
    </div>
    <p>&copy; 2024 Vehicle Parking. All rights reserved.</p>
</footer>
</body>
</html>
