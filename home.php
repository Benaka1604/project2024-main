<!-- Login and Signup -->
<!-- This files has nav link to /Dash.php, /admin.php -->



<?php


// Starting the session
// session_start();
include 'common.php';
include "DataBase.php";
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $VNo = strtoupper($_POST['VNo']);
    $VType = $_POST['VType'];
    // $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $vn = "select VNo from `basic` where VNo = '$VNo'";
    $vnresult = mysqli_query($conn, $vn);

    // $pn = "select Ph_no from `basic` where Ph_no = '$phone'";
    // $pnresult = mysqli_query($conn, $pn);

    $el = "select Email from `basic` where Email = '$email'";
    $elresult = mysqli_query($conn, $el);

    $errors = array();
    if (empty($name) && empty($VNo) && empty($email) && empty($password)) {
        $errors['ae'] = "All fields are Required!";
        header('Location:home.php?err=1');
    } elseif (empty($name)) {
        $errors['n'] = "Name is Required!";
        header('Location:home.php?err=2');
    } elseif (empty($VNo)) {
        $errors['g'] = "Vehicle number is Required!";
        header('Location:home.php?err=3');
    } elseif (mysqli_num_rows($vnresult) > 0) {
        $errors['phn'] = "Vehicle Number is Already exist!";
        header('Location:home.php?err=3.5');
    } elseif (empty($email)) {
        $errors['e'] = "E-mail is Required!";
        header('Location:home.php?err=4');
    } elseif (mysqli_num_rows($elresult) > 0) {
        $errors['e'] = "E-mail is Already exist!";
        header('Location:home.php?err=4.5');
    } elseif (empty($password)) {
        $errors['p'] = "Password is Required!";
        header('Location:home.php?err=5');
    } else {
        // insert query : inert into `table_name`(column_names) values (values);
        $run = "insert into `basic` (`Name`, `VNo`, `VType`, `Email`, `Password`) values  ('$name', '$VNo', '$VType',  '$email', '$password')";
        
        if ($insert = mysqli_query($conn, $run)) {
            $regi2="INSERT INTO `login`(`email`, `pass`, `temp`) VALUES ('$email','$password',1);";
            $up2=mysqli_query($conn,$regi2);
            // header("Location: login.php");
            
            // $run1 = "INSERT INTO `details` (`Email`,`VNo`, `InTime`, `OutTime`, `TotalMin`, `Price`, `Payment`) VALUES ('$email','$VNo', current_timestamp(), current_timestamp(), NULL, NULL, NULL)";
            // $run = "insert into `details` (`VNo`, `VType',`Name`, 'Email') values  ('$VNo', '$VType','$name', '$email')";
            // $insert1 = mysqli_query($conn, $run1);
            $count = 1;
            $_SESSION['c'] = $count;
            header('Location:home.php?count=2');

        } else {
            header('Location:home.php?count=3');
            // die("Error occured");
        }
    }
}

// select query to display the perticular userid
if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    $t1=0;

    // $select = "select * from `basic` where Email = '$userid' and Password = '$password'";
    // $result = mysqli_query($conn, $select);
    // $idrow = mysqli_fetch_assoc($result);
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // $count = mysqli_num_rows($result);

    // New Trail for client/Admin/User..!
    $temp="SELECT * FROM `login` WHERE `email`='$userid' AND `pass`='$password';";
    $temp1=mysqli_query($conn,$temp);
    $mrow=mysqli_fetch_assoc($temp1);
    $t1=$mrow['temp'];
    // New Trail for client/Admin/User..!   

    // $check = "select 'Password' from `basic` where Email = '$userid';";
    // $pass = mysqli_query($conn,$check);
    // echo $pass;
    // check the login member is Admin or not, if yes redirect to admin.php
    if ($userid == 'Admin@gmail.com' && $password = 'Admin@123') {
        $_SESSION['admin_id'] = 1;
        $_SESSION['person']=3;
        header('Location:admin.php');
    }
     elseif ($t1 == 1) {
            // echo $email;
            $_SESSION['email'] = $userid;
            $_SESSION['person']=1;
            // echo $_SESSION['email'];
            header("Location: Dash.php");
            // header("Location: Dash.php?email=$userid");
        
    }
    elseif($t1==2){
        $_SESSION['email'] = $userid;
        $_SESSION['person']=2;
        header('Location:admin.php');
    }
    
    else {
        header('Location:home.php?count=1');
        echo '<br>' . 'Incorrect UserName or Password!!';
    }
    

}
?>


<!-- HTML Code -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME TO VEHICLE PARKING</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="prjlogo.jpeg">
    <style>
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
        <a href="TimeDif.php">Calulator</a>
        <a href="Availability.php">Slots Availability</a>
    </nav>
        
    </header>
    <br>
        <div style="text-align:center">
        <?php
        // echo 'Hello';
                if(isset($_GET['count'])){
                    
                    $c=$_GET['count'];
                    if($c==1) {
                        // header('Location:home.php');
                    echo '<br>' . 'Incorrect UserName or Password!!';
                }elseif ($c==2) {
                    # code...
                    echo 'Registration Successful :)';
                }
                elseif($c==3){
                    echo 'Registration Unsuccessful :(';
                }
                }
                if(isset($_GET['err'])){
                    $er=$_GET['err'];
                    // echo $er;
                    if($er==1){
                        echo 'All fields are required...!';
                    }
                    elseif($er==2){
                        echo 'Name is required...!';
                    }
                    elseif($er==3){
                        echo 'Vehicle number is required...!';
                    }
                    elseif($er==3.5){
                        echo 'Vehicle number already exist...!';
                    }
                    elseif($er==4){
                        echo 'Email is required...!';
                    }
                    elseif($er==4.5){
                        echo 'Email already exist...!';
                    }
                    elseif($er==5){
                        echo 'Password is required...!';
                    }
                }

                ?>
            
        </div>

        <div class="form-box" id="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="togle-btn" onclick="login()">Login</button>
                <button type="button" class="togle-btn" onclick="register()">Register</button>
            </div>

            <form method="post" autocomplete="off" id="login" class="input-group" action="home.php">

                <input class="input-field" type="text" name="userid" placeholder="Enter your Email-Id" ><br><br>

                <input class="input-field" type="password" name="password"
                    placeholder="Enter your password"><br>

                <br><br>

                <input type="submit" class="submit-btn" name="login" value="Login">
            </form>
<!-- action="javascript:register()" -->
            <form id="register" class="input-group" method="post" action="home.php">

                <p class="p-require">
                    <?php if (isset($errors['ae']))
                        echo $errors['ae']; ?>
                </p><br>

                <input type="text" name="name" class="input-field" maxlength="20" placeholder="Enter your name"><br>
                <p class="p-require">
                    <?php if (isset($errors['n']))
                        echo $errors['n']; ?>
                </p><br>

                <input type="text" name="VNo" class="input-field" maxlength="10" placeholder="Vehicle Number">
                <p class="p-require">
                    <?php if (isset($errors['db']))
                        echo $errors['db']; ?>
                </p><br>

                <select name="VType" class="input-field" placeholder="Vehicle Type">
                    <option value="Bike">Bike</option>
                    <!-- <option value="Scooter">Scooter</option> -->
                    <option value="Car">Car</option>
                </select><br>
                <p class="p-require">
                    <?php if (isset($errors['g']))
                        echo $errors['g']; ?>
                </p><br>

                <!-- <input type="tel" name="phone" class="input-field" placeholder="Enter your phone number"
                pattern="[0-9]{10}"><br>
                     
                <p class="p-require">
                    ?php if (isset($errors['phn']))
                        echo $errors['phn']; ?>
                </p><br> -->

                <input type="email" name="email" class="input-field" placeholder="Enter the email"><br>
                <p class="p-require">
                    <?php if (isset($errors['e']))
                        echo $errors['e']; ?>
                </p><br>

                <!-- <input type="text" name="uname" class="input-field" pattern="[A-Za-z_]{1,25}" title="It can contain upper and lower case letters and underscore(_), special characters are not allowed except underscore(_)" placeholder="Enter the username" maxlength="10"><br><br> -->

                <input type="password" name="password" class="input-field" placeholder="Enter the password"
                    pattern="^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$"
                    title="Must contain at least one number, one uppercase, lowercase letter and one special charecter, and at least 8 or more characters">
                
                <p class="p-require">
                    <?php if (isset($errors['p']))
                        echo $errors['p']; ?>
                </p><br>

                <!-- <input type="checkbox" class="check-box"><span>I agree to the terms and condtion</span> -->
                <button type="submit" name="register" class="submit-btn" onsubmit="self">Register</button>
            </form>


        </div>
        <script>
            //Script for prompt to change btw Sign in / Register
            var x = document.getElementById("login");
            var y = document.getElementById("register");
            var z = document.getElementById("btn");
            var a = document.getElementById("form-box");

            function register() {
                
                x.style.left = "-450px"
                y.style.left = "50px"
                y.style.top = "120px"
                z.style.left = "110px"
                a.style.height = "800px"
            }

            function login() {
                x.style.left = "50px"
                x.style.top = "150px"
                y.style.left = "450px"
                z.style.left = "0px"
                a.style.height = "400px"
            }
            
            function load(e){
                event.preventDefault()
                console.log('Not refresh')
            }
        </script>
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
