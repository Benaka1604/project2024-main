<?php
    include('DataBase.php');
    include('common.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="prjlogo.jpeg">
    <style>
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

.hd{
    margin-top: -9px;
}
.widget1:hover{
    
    background-color: #ddd;
    width: 280px;
    height: 60px;   
    padding: 20px;
    border-radius: 5%;
    /* background-image: url(); */
    /* border: 2px solid #545353; */
    transition: background-color 0.6s ease;
}
.dashboard1 {
    display: flex;
    justify-content: space-around;
    /* margin-left: -4%; */
    align-items: center;
    margin-top: 50px;
    /* background-color: aqua; */
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
    <div class="dashboard1">
        <div class="widget2">
            
        <h2  class="hd" >Contact</h2>
        <!-- <h1></h1> -->
        <h3>Phone No : </h3> <p>+1234567890</p>
        <h3>Email: </h3> <p>parkurvehicle@gmail.com</p>
        <h3>Address : </h3> <p>573201 Udaygiri, Hassan, India</p>
        </div>
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
