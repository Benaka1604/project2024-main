<?php
    include('common.php');
    include('DataBase.php');
    if(isset($_POST['register'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $city=$_POST['city'];
        $place=$_POST['place'];
        $c_cou=$_POST['c_count'];
        // $c_cos=$_POST['c_cost'];
        $b_cou=$_POST['b_count'];
        // $b_cos=$_POST['b_cost'];
        // $fed=date('Y-m-d ')
        $cid=rand(10000,99999);
        $regi="INSERT INTO `clients`(`p_id`, `c_name`, `Email`, `c_city`, `c_place`, `b_slots`, `c_slots`, `b_rate`, `c_rate`) VALUES ('$cid','$name','$email','$city','$place','$b_cou','$c_cou','$b_cos','$c_cos');";
        $regi="INSERT INTO `clients`(`p_id`, `c_name`, `Email`, `c_city`, `c_place`, `b_slots`, `c_slots`) VALUES ('$cid','$name','$email','$city','$place','$b_cou','$c_cou');";
        $up1=mysqli_query($conn,$regi);
        $regi2="INSERT INTO `login`(`email`, `pass`, `temp`) VALUES ('$email','$pass',2);";
        $up2=mysqli_query($conn,$regi2);

        $try2="ALTER TABLE `reserve` ADD `$email` VARCHAR(15) NOT NULL DEFAULT 'Available' AFTER `slot`;";
        $try1="ALTER TABLE `reserve` ADD `$cid` VARCHAR(10) NULL DEFAULT NULL AFTER `slot`;";
        $try3="UPDATE `reserve` SET `$email`='Unavailable' WHERE slot=0 or slot>$c_cou;";
        $run1=mysqli_query($conn,$try1);
        $run1=mysqli_query($conn,$try2);
        $run1=mysqli_query($conn,$try3);

        header('Location:c_reg.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Register</title>
    <link rel="stylesheet" href="home.css">
    <!-- <link rel="stylesheet" href="Table.css"> -->
    <link rel="icon" href="prjlogo.jpeg">
    <style>

nav a {
        background-color:#f4f4f4;
        text-decoration: none;
        margin-left: 15px;
        color: #333;
        padding: 10px 20px;
        /* position: fixed; */
    }
    nav a:hover {
        background-color: #ddd;
        transition: background-color 0.6s ease-in-out; 
    }

        button {
            margin-left: 90px;
            margin-bottom: 10px;
            display: block;
            width: 200px;
            padding: 10px;
            background-color: #6a736a;
            color: #080707;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
         .num {
            margin-left: 35px;
            width: 120px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            
        }

        .widget1{
            width: 300px;
            height: 80px;   
            padding: 20px;
            border-radius: 5%;
            padding-left: 12px;
            background-color: aqua;
            /* overflow: hidden; */
            text-align: center;
            
        }

        .widget1:hover{
            
            /* background-color: #ddd; */
            width: 280px;
            height: 60px;   
            padding: 20px;
            border-radius: 5%;
            /* background-image: url(); */
            /* border: 2px solid #545353; */
            transition: background-color 0.6s ease;
        }
        .dashboard1 {
            padding-top: 5px;
            border-radius: 50px;
            /* background-color: yellow; */
            margin-left: 600px;
            /* display: flex; */
            width: 500px;
            height: 500px;
            /* justify-content: space-around; */
            border: 0px solid;
            /* margin-left: -4%; */
            align-items: center;
            margin-bottom: 0%;
            /* margin-top: -50px; */
            /* background-color: aqua; */
        }

        .form1{
            background-color: #bbb;
            /* border: 1.2px solid; */
            width: 400px;
            padding-bottom: 11px;
            padding-left: 15px;
            border-radius: 10px;
        }

        .t_in{
            margin-left: 10px;
            width: 350px;
            padding: 10px;
            border: 0px solid #ccc;
            border-right: 1px solid ;
            border-bottom: 1px solid ;
            border-bottom-right-radius: 5px;
            /* border-radius: 10px; */
            
        }

    </style>
</head>
<body>
    <header>
        <!-- <div class="heddiv"> -->
            <!-- <img src="/bag.jpg" alt="sry" class="img1"> -->
        <!-- </div> -->
        <h1>Client Registration</h1>
        
    </header>
    <nav>
    <a href="/project2024-main/Admin.php">Home</a>
    <a href="/project2024-main/Table.php">History</a>
        <!-- <a href="/project2024-main/Reserve.php">Reservation</a> -->
        <a href="/project2024-main/User.php">Users</a>
        <a href="/project2024-main/c_data.php">Clients</a>
        <a href="/project2024-main/c_reg.php">Client Register</a>
        <!-- <a href="/project2024-main/Entry.php" target="_blank">Vehicle Entry</a>
        <a href="/project2024-main/Exit.php" target="_blank">Vehice Exit</a> -->
        <a href="/project2024-main/Logout.php">Logout</a>
    </nav>


    <div class="dashboard1">
        <form id="register" class="form1"  method="post" action="c_reg.php">

            <p class="p-require">
            </p><br>

            <input type="text" name="name" class="t_in" maxlength="20" placeholder="Enter client name"><br>
            <p class="p-require">
            </p>

            
            <input type="email" name="email" class="t_in" placeholder="Enter client email id" autocomplete="off"><br>
            <p class="p-require">
            </p>
            <input type="password" name="password" class="t_in" placeholder="Enter client password" autocomplete="off">
            <p class="p-require">
            </p>

            <input type="text" name="city" class="t_in" maxlength="25" placeholder="Enter city name">
            <p class="p-require">
            </p>

            <input type="text" name="place" class="t_in" maxlength="25" placeholder="Place Name">
            <p class="p-require">
            </p>

            <!-- <input type="text" name="VNo" class="t_in" maxlength="10" placeholder="Vehicle Number"> -->
            <input type="number" name="c_count" class="num" id="" placeholder="No of cars" value="NULL">
            <!-- <p class="p-require">
            </p> -->

            <!-- <input type="number" name="c_cost" id="" class="num" step="5" placeholder="Cost for 12 Hours" value="0"> -->
            <!-- <p class="p-require"> -->
            </p>

            <input type="number" name="b_count" id="" class="num" placeholder="No of Bikes"  value="NULL">
            <!-- <input type="number" name="b_cost" id="" class="num" step="5" placeholder="Cost for 12 Hours" value=0> -->
            <!-- <p class="p-require"> -->
            </p>


            <div style="align-items: center;">
            <button type="submit" name="register" class="submit-btn" class="num"  onsubmit="self">Register</button>
        </div>
        </form>
    </div>
    
   
    
    
       
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
