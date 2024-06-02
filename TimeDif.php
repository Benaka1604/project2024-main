<!-- New File -->

<!-- Whatever changes made in html or css (Only html and css) in TimeDif.html copy and make same changes to this files as well -->

<?php
    include('common.php');
    include('DataBase.php');
    // $c=$t_car;
    // $b=$t_bike;
    $bike="SELECT COUNT(DISTINCT VNo) as T FROM `basic` WHERE VType='Bike' AND Payment=1;";
    $b1=mysqli_query($conn,$bike);
    $car="SELECT COUNT(DISTINCT VNo) as T FROM `basic` WHERE VType='Car' AND Payment=1;";
    $c1=mysqli_query($conn,$car);
    $b=mysqli_fetch_assoc($b1);
    $c=mysqli_fetch_assoc($c1);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Parking Price calculator</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="prjlogo.jpeg">
    <style>
        input {
            width: calc(100% - 12px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            
        }

        input {
            width: 100%;
        }

        .time{
            
            margin-left:100px;
            width:300px;
            height: 200px;
        }

        .cal{
            margin-left:200px;
            display:flex;
            margin-top:40px;
        }
        .tb1{
            margin-left:200px;
        }
        nav {
        color : #f4f4f4;
        display: flex;
        background-color: #333;
        padding: 10px;
    }
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

    </style>
</head>
<body>
    <header>
        <!-- <div class="heddiv"> -->
            <!-- <img src="/bag.jpg" alt="sry" class="img1"> -->
        <!-- </div> -->
        <h1>VEHICLE PARKING</h1>
        <nav>
        <a href="home.php">Sign in/Register</a>
        <a href="Availability.php">Slots Availability</a>
        </nav>
        
    </header>
    <div class="cal">
    <div class="time">
    <form method="GET" action="TimeDif.php">
        <label for="Input Time">Input Time</label>
        <input type="datetime-local" name="InTime" >
        <br>
        
        <label for="Output Time">Output Time</label>
        <input type="datetime-local" name="OutTime">
        <br><br>
        <button type="submit">Submit</button>
      
    </form>
    </div>
    <div class="time">
    <?php
   
   if(isset($_GET['InTime'])){
       $datetime_1 = $_GET['InTime']; 
       $datetime_2 = $_GET['OutTime']; 
   }
   else{
       $datetime_1 = date("d-m-Y"); 
       $datetime_2 = date("d-m-Y"); 
   }
   $start_datetime = new DateTime($datetime_1); 
   $diff = $start_datetime->diff(new DateTime($datetime_2)); 
   
   if ($diff->i>0){
       $t_hours=($diff->days)*24+($diff->h+1);
   }
   else{
       $t_hours=($diff->days)*24+($diff->h);
   }
   if($t_hours!=0){
       $rate=ceil($t_hours/12)*10;
       echo 'Total Hours vehicle parked is '.$t_hours.' hours <br>';
       echo 'Total price is '.$rate.' Rupees';
       
   }
   ?>
    </div></div>
    

       
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



