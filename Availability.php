<!-- New File -->

<!-- Whatever changes made in html or css (Only html and css) in TimeDif.html copy and make same changes to this files as well -->

<?php
    include('common.php');
    include('DataBase.php');
    // $c=$t_car;
    // $b=$t_bike;
    $tot="SELECT `p_id`,`c_city`,`c_place`,`c_slots`,`b_slots` FROM `clients`;";
    $t_r=mysqli_query($conn,$tot);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Availability Table</title>
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
        <a href="TimeDif.php">Calculator</a>
        </nav>
    </header>

    <div class="cal">
        <div class="tb1">
            <table border 2px solid>
                <tr>
                <th rowspan=2>City</th>
                <th rowspan=2>Place</th>
                <th colspan=3>Bikes</th>
                <th colspan=3>Car</th>
                </tr>
                <tr>
                    <!-- <th>Vehicle Type</th> -->
                    <th>Total Slots</th>
                    <th>Parked Slots</th>
                    <th>Available Slots</th>
                
                    <!-- SELECT ``,``,`c_slots`,`b_slots` FROM `clients`; -->
                    <th>Total Slots</th>
                    <th>Parked Slots</th>
                    <th>Available Slots</th>
                    </tr>
                    <?php
                        while($r=mysqli_fetch_assoc($t_r)){
                            $id=$r['p_id'];
                            $bike="SELECT COUNT(DISTINCT VNo) as T FROM `details` WHERE VType='Bike' AND Payment=0 AND p_id=$id;";
                            $b1=mysqli_query($conn,$bike);
                            $car="SELECT COUNT(DISTINCT VNo) as T FROM `details` WHERE VType='Car' AND Payment=0 AND p_id=$id;";
                            $c1=mysqli_query($conn,$car);
                            $b=mysqli_fetch_array($b1);
                            $c=mysqli_fetch_array($c1);
                            $c2=$c['T'];
                            $b2=$b['T'];
                            $city=$r['c_city'];
                            $place=$r['c_place'];
                            $car=$r['c_slots'];
                            $bike=$r['b_slots'];
                            $c3=$car-$c2;
                            $b3=$bike-$b2;
                            echo <<< k
                            <tr>
                                <td> $city </td>
                                <td> $place </td>
                                <td> $bike</td>
                                <td> $b2</td>
                                <td> $b3</td>
                                <td> $car </td>
                                <td> $c2</td>
                                <td>$c3</td>

                            </tr>

                            k;
                            
                        }
                    ?>

            </table>


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



