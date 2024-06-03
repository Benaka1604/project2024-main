<!-- DashBoard Page -->

<!-- This files has nav link to /Reservation.html, /Services.html, /About.html, /contact.html -->

<?php
// session_start();
include 'DataBase.php';
include 'common.php';
$sql = "SELECT * FROM `basic` where Email='$email '";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="prjlogo.jpeg">
    <style>
        .widget2{
    width: 300px;
    height: 180px;   
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
        <h1>VEHICLE PARKING</h1>
    </header> 
    <nav>
        <a href="/project2024-main/Dash.php">Dashboard</a>
        <?php if($person==3){?>
            <a href="/project2024-main/Reservation.php">Reservation</a>
            <?php }?>
        <a href="/project2024-main/History.php" >History</a>
        <a href="/project2024-main/About.php">About</a>
        <a href="/project2024-main/contact.php" >Contact</a>
        <a href="/project2024-main/Logout.php">Logout</a>
    </nav>
    <?php
// echo $person;
        ?>

    <!-- Displaying details of the user -->
    <Label>User Name              : </Label><?php echo "\t".$row['Name']; ?><br>
    <Label>Vehicle Number    : </Label><?php echo $row['VNo']; ?><br>
    
    <Label>Vehicle Type      : </Label><?php echo $row['VType']; ?>

    <!-- <input type="text" name="" id="" placeholder=""> -->
    <div class="widgbag">
    <div class="dashboard">
        <div class="widget2">
            
        <h2  class="hd" >Timings</h2>
            <p>
                <?php
                
                if($row['Payment']==1){
                    $vn=$row['VNo'];
                    $select = "select * from `details` where VNo = '$vn'";
                    $result1 = mysqli_query($conn, $select);
                    $nrow = mysqli_fetch_assoc($result1);
                    $inti=$nrow['InTime'];
                    $outti=$nrow['OutTime'];
                }
                
                
                
                if($row['Payment']==1){
                    $Vno=$nrow['VNo'];
                
                $c_time=date('Y-m-d G:i:s');
                                               
                    if($inti<$outti){
                        echo "In Time :".$inti."<br>";
                        echo "Out Time :".$c_time."<br>";
                        $run2="UPDATE `details` SET `OutTime` = '$c_time' WHERE VNo = '$Vno'";
                        $update1=mysqli_query($conn, $run2); 
                    } 
                }  
                else
                {
                    echo "In Time : Vehicle yet to enter!<br>";
                    echo "Out Time : Exits after it enters.<br>";
                }
                ?>
            </p>
        </div>
        <div class="widget2">

        <h2 class="hd" >Price for Vehicle parked</h2>
            <p>
                <?php  
                $otp=$row['OTP'];
                
                $a= $row['Payment'];
                    if($a!=0){
                        $start_datetime = new DateTime($inti); 
                        $diff = $start_datetime->diff(new DateTime($c_time)); 
                        $min=($diff->i);
                        $t_hours=($diff->h);
                        $t_days=($diff->d);
                        if($min!=0){
                            echo "Total time parked : ";
                            if($t_days>0){
                                echo $t_days." days ";
                            }
                            if($t_hours>0){
                                echo $t_hours." Hours ";
                            }
                            if($min>0){
                                echo $min." min";
                            }
                            if ($diff->i>0){
                                $t_hour=($diff->days)*24+($diff->h+1);
                            }
                            else{
                                $t_hour=($diff->days)*24+($diff->h);
                            }
                            if($t_hour!=0){
                                $rate=ceil($t_hour/12)*10;
         
                            }
                            echo '<br>Total price is '.$rate.' Rupees<br>';  
                        }
                        
                        
                    }
                    elseif ($row['Payment']==0) {
                        // echo "You have reserved a plot.";
                        echo "Your Vehicle is not Parked.";
                    }
                    else
                    {
                        echo "Your Vehicle is not Parked.";
                    }
                   

                ?>
            </p>
        </div>
        <div class="widget2">
            <h2  class="hd" >OTP to take the vehicle</h2>
            <p>
                <?php
                    if($a==1){
                        echo 'OTP to exit from parking : '.$otp;
                    }
                    else{
                        echo 'Vehicle is not parked';
                    }
                ?>
            </p>
        </div >
    </div >

    
    <!--KEEP HEAD -->
    <!-- <div style="background-color: aquamarine;">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis a asperiores veniam doloribus molestias quaerat vel voluptatum amet! Magni ducimus cumque dicta esse earum quod deserunt, veritatis eligendi neque minima.</p>
    </div> -->
    
       
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
