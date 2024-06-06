<?php
// session_start();
include "DataBase.php";
include "common.php";
$sql = "SELECT `Email`,`VNo` FROM `details` WHERE `Payment`=0 and `p_id`=$p_id order by 'VNo';";
$result = mysqli_query($conn, $sql);
// if ($_SESSION['admin_id'] != 1) {
//     header('Location: home.php');
// }
$_SESSION['V_no']='A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exit Panel</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="prjlogo.jpeg">
    <style>
        /* Newly added by channakeshava */
    .widget11{
        width: 300px;
        height: 80px;   
        padding: 20px;
        border-radius: 5%;
        padding-left: 12px;
        /* overflow: hidden; */
        /* text-align: center; */   
    }
    /* Newly added by channakeshava */
    .dashboardn{
        display: flex;
        justify-content: space-around;
        /* margin-left: -4%; */
        align-items: center;
        margin-top: 50px;
        
    }

    select {
            width: calc(100% - 12px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            
        }

        select {
            width: 100%;
        }

        

    </style>
</head>
<body>
    <header>
        <!-- <div class="heddiv"> -->
            <!-- <img src="/bag.jpg" alt="sry" class="img1"> -->
        <!-- </div> -->
        <h1>VEHICLE PARKING PAGE</h1>
        
    </header>
    <nav>
        <a href="/project2024-main/Admin.php">Home</a>
        <a href="/project2024-main/Table1.php">History</a>
        <!-- <a href="/project2024-main/Reserve.php">Reservation</a> -->
        <!-- <a href="/project2024-main/User.php">Users</a> -->
        <a href="/project2024-main/Recharge.php" target="_blank">Recharge</a>
        <a href="/project2024-main/Entry-c.php" target="_blank">Vehicle Entry</a>
        <a href="/project2024-main/Exit.php" target="_blank">Vehice Exit</a>
        <a href="/project2024-main/Logout.php">Logout</a>
    </nav>

    <div class="widgbag1">
    <div class="dashboardn">
        <div class="widget11">
            
        

    
    
    
       <h3>Select the exiting Vehicle number</h3>
    <?php
        
        $array=[];
        while ($row = mysqli_fetch_array($result)) {
            $array[]=strtoupper($row['VNo']);
            
        }
    ?>
    <form action="Exit.php" method="get">
    <select name="v_no" id="" placeholder="Vehicle Type">
        <?php
            foreach($array as $arr){?>
                <option value="<?php print($arr) ?>">
                    <?php 
                    print($arr);?>
                </option><?php
            }?>
        
    </select><br><br>
    <input type="submit" value="Submit" ><br><br>
    </form>

    <?php
        if(isset($_GET['v_no'])){
            
            $v_no=$_GET['v_no'];
            $_SESSION['V_no']=$v_no;
            $c_time=date('Y-m-d G:i:s');
            if(isset($_GET['try'])){
            $a=$_GET['try'];
            if($a=='Fail'){
                echo 'OTP is invalid';
            }}
           ?>
            <form action="Exit1.php" method="post">
                <h3>Enter the OTP</h3>
                <input type="text" name="otp" id="" autofocus>
                <input type="submit" name="otp_val" value="Submit" >
            </form>
            <?php
           
        } 


        
    
        if(isset($_GET['vno'])){
            $v_no=$_GET['vno'];
            $em="SELECT * FROM `details` WHERE`VNo`='$v_no';";
            $result=mysqli_query($conn,$em);
            $row = mysqli_fetch_assoc($result);

            $inti=$row['InTime'];
            $outti=$row['OutTime'];
            $start_datetime = new DateTime($inti); 
            $diff = $start_datetime->diff(new DateTime($outti)); 
            $hour=ceil(((($diff->d)*1440)+(($diff->h)*60)+($diff->i))/60);
            $price=(ceil(((($diff->d)*1440)+(($diff->h)*60)+($diff->i))/720)*10);
            if($row['Payment']==0){
                $run2="UPDATE `details` SET `Price` = '$price' WHERE VNo = '$v_no'";
                $update1=mysqli_query($conn, $run2);  
                $run3="UPDATE `details` SET `Totalhrs` = '$hour' WHERE VNo = '$v_no'"; 
                $update1=mysqli_query($conn, $run3);    
                   
                if($update1){
                    $em="SELECT * FROM `basic` WHERE`VNo`='$v_no';";
                    $resu=mysqli_query($conn,$em);
                    // $az=mysqli_num_rows($resu);
                    $nrow = mysqli_fetch_assoc($resu);
                    $price1= $row['Price'];
                    $point1= $nrow['points'];
                
                ?>
        
                    <form action="Exit1.php" method="post">
                        <input type="text" name="ve_no" id="" hidden value="<?php print($row['Email']) ?>">
                    Vehicle Number &nbsp&nbsp&nbsp : <?php echo $v_no;?><br>
                    Total parkes hours : <?php echo $row['Totalhrs'];?> <br>
                    Total cost &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <?php echo $row['Price']; ?><br>
                    Balance Available&nbsp&nbsp : <?php echo ($point1-$price1);?> <br><br>
                    <?php
                    if($price1>$point1){
                        echo "<br>**Points are not enough** <br> **Kindly recharge the wallet.**";
                    }
                    elseif($price1==$point1|($point1-$price1)<=40){
                        echo "<br>**Points is less than the min balance** <br> **Kindly recharge the wallet.**";
                    }
                    else{
                        ?>
                        <input type="text" name="pr1" id="" hidden value="<?php print($price1) ?>">
                        <input type="text" name="po1" id="" hidden value="<?php print($point1) ?>">
                        <input type="submit" name="Submit" value="Yes" autofocus >
                    <?php    }
                        // echo $v_no;
                    ?>
                    </form> 
                    <?php                  
            }  }
        }
         
           
            
        

    ?>

</div>
        
        </div >
    </div >
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
