<!-- May be not in use -->

<?php
// session_start();
include "DataBase.php";
include "common.php";
$sql = "SELECT `Email`,`VNo` FROM `basic` WHERE`Payment`IS null order by 'VNo';";
$result = mysqli_query($conn, $sql);
$V_No=mysqli_fetch_assoc($result);
// if ($_SESSION['admin_id'] != 1) {
//     header('Location: home.php');
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Panel</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="prjlogo.jpeg">
    <style>

             /* Newly added by channakeshava */
    .widget11{
        width: 300px;
        height: 140px;   
        padding: 20px;
        border-radius: 5%;
        padding-left: 12px;
        /* overflow: hidden; */
        /* text-align: center; */   
        /* background-color: yellow; */
    }

    /* .widgbag1{
    background-color: yellow;
} */

    /* Newly added by channakeshava */
    .dashboardn{
        display: flex;
        justify-content: space-around;
        /* margin-left: -4%; */
        align-items: center;
        margin-top: 50px;
        
    }
        #select {
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
        <h1>VEHICLE PARKING ADMIN PAGE</h1>
        
    </header>
    <nav>
    <a href="/project2024-main/Admin.php">Home</a>
    <?php
    if($p_id==0){?>
    <a href="/project2024-main/Table.php">History</a>
    <a href="/project2024-main/User.php">Users</a>
    <?php
}
else{?>
    <a href="/project2024-main/Table1.php">History</a>
<?php
}?>
        <!-- <a href="/project2024-main/Reserve.php">Reservation</a> -->
        <!-- <a href="/project2024-main/User.php">Users</a> -->
        <a href="/project2024-main/Entry-c.php" target="_blank">Vehicle Entry</a>
        <a href="/project2024-main/Exit.php" target="_blank">Vehice Exit</a>
        <a href="/project2024-main/Logout.php">Logout</a>
    </nav>
    

    <?php
        $array=[];
        while ($row = mysqli_fetch_array($result)) {
            $array[]=$row['VNo'];
        }
        
    ?>
       <div class="widgbag1">
    <div class="dashboardn">
        
        <div class="widget11">
        <?php
        if(isset($_GET['abc'])){
            $c=$_GET['abc'];
            if($c==1){
                echo "Vechicle Number is not registered.";
            }
            elseif($c==2){
                echo "Vechicle is already in parking lot.";
            }
        }
    ?>
    <form action="Entry1.php" method="post">
        <label for=""><h3>Select Vehicle Number to enter</h3></label><br>
    <input type="text" name="v_no" id="select" autofocus><br><br>
    <input type="submit" name="Submit">
    </form>
    



<!--     
       <h1>Admin Page</h1>
       <table border 1px white class="tbl">
            <th class="hd">Sl No</th>
            <th class="hd">Vehicle Number</th>
            <th class="hd">E-mail</th>

        </table> -->



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