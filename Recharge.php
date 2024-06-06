<?php
// session_start();
include "DataBase.php";
include "common.php";
// $sql = "SELECT `Email`,`VNo` FROM `details` WHERE `Payment`=0 and `p_id`=$p_id order by 'VNo';";
// $result = mysqli_query($conn, $sql);
// if ($_SESSION['admin_id'] != 1) {
//     header('Location: home.php');
// }
$_SESSION['V_no']='A';
if(!empty($_POST['Sub1'])){
    if(empty($_POST['v_no'])){
        header('Location:Recharge.php?r=1');
    }
    else{
        $vno=$_POST['v_no'];
        $sql = "SELECT * FROM `basic` where VNo='$vno '";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=1){
            header('Location:Recharge.php?r=2');
        }
    }
}
if(isset($_POST['Sub2'])){
    $v_no=$_POST['v_no'];
    $amt1=$_POST['amt'];
    $add="UPDATE `basic` SET `points`=`points`+$amt1 WHERE `VNo`='$v_no';";
    $add1=mysqli_query($conn,$add);
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recharge Panel</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="prjlogo.jpeg">
    <style>
        /* Newly added by channakeshava */
    .widget11{
        width: 300px;
        height: 60px;   
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
        /* align-items: center; */
        margin-top: 20px;
        
    }

    #select {
            /* width: (100% - 12px); */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            
        }

        #select {
            width: 80%;
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
<?php
if($p_id==0){?>
    <a href="/project2024-main/Table.php">History</a>
    <a href="/project2024-main/Recharge.php">Recharge</a>
    <a href="/project2024-main/User.php">Users</a>
    <a href="/project2024-main/c_data.php">Clients</a>
    <a href="/project2024-main/c_reg.php">Client Register</a>
    <?php
}
else{?>
    <a href="/project2024-main/Table1.php">History</a>
    <a href="/project2024-main/Recharge.php">Recharge</a>
    <a href="/project2024-main/Entry-c.php" target="_blank">Vehicle Entry</a>
        <a href="/project2024-main/Exit.php" target="_blank">Vehice Exit</a>
<?php
}?>
        <a href="/project2024-main/Logout.php">Logout</a>
    </nav>
<!-- 
    <div class="widgbag1">-->
    <div class="dashboardn">
        <div class="widget11"> 
        <?php
            if((!empty($_POST['Sub1']))| (!empty($_POST['Sub1'])))
            {
                $vno=$_POST['v_no'];
                $sql = "SELECT * FROM `basic` where VNo='$vno '";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $a=ucwords($row['Name']);
                ?>

                <Label>User name      &nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp </Label><?php echo "\t".$a; ?><br>
                <Label>Vehicle Number  &nbsp  :&nbsp </Label><?php echo $row['VNo']; ?><br>
                <Label>Vehicle Type  &nbsp &nbsp&nbsp&nbsp   :&nbsp </Label><?php echo $row['VType']; ?><br>
                <Label>Points Available  &nbsp    :&nbsp </Label><?php echo $row['points']; ?>
            <?php
            }
        ?>
       
       <?php 
       if(isset($_GET['r'])){
        $r=$_GET['r'];
        if($r==1){
            echo 'Enter the vehicle number';
        }
        elseif($r==2){
            echo 'Enter Valid vehicle number';
        }
       }
       if(empty($_POST['Sub1'])){
        ?>
        <h3>Enter the Vehicle number</h3>
       <form action="Recharge.php" method="post">
            <input type="text" name="v_no" id="select" autofocus><br><br>
            <input type="submit" name="Sub1" id="select">
        </form>
<?php } 
if(!empty($_POST['Sub1'])){
            ?>
            
                <h3>Enter the amount</h3>
                <form action="Recharge.php" method="post">
                    <input type="text" name="v_no" id="" value="<?php print($vno) ?>" hidden>
                    <input type="number" name="amt" step=10 id="select" autofocus><br><br>
                    <input type="submit" name="Sub2" id="select">
                 </form>
            <?php
            }

                
            
        
?>
    
</div>
        
        </div >
    <!-- </div > -->
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
