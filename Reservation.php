<!-- Reservation Page -->

<!-- This files has nav link to /Dash.php, /Services.html, /About.html, /contact.html -->
<?php 
include('DataBase.php');
include('Common.php');
$ch4='Unavailable';

$res="SELECT `p_id`,`c_name`,`Email`,`c_city`,`c_place` FROM `clients` WHERE Temp = 0;";
$res1=mysqli_query($conn,$res);

$array=[];
while ($row = mysqli_fetch_array($res1)) {
    $array[]=strtoupper($row['c_place']);
}



$e="SELECT `VNo` FROM `basic` WHERE `Email`='$email';";
$e1=mysqli_query($conn,$e);
$vn=mysqli_fetch_assoc($e1);
$vno=$vn['VNo'];


if(isset($_GET['Sub2'])){
    $pl=$_GET['place'];
    $re=$pl;
}
    $pl=$re;
    $rese="SELECT `p_id`,`c_name`,`Email` FROM `clients` WHERE c_place = '$pl' And Temp=0;";
    $rese1=mysqli_query($conn,$rese);
    $res=mysqli_fetch_assoc($rese1);
    $ve_no=$res['p_id'];
    $stats=$res['Email'];
    // echo $ve_no;
    // echo $stats;

    $check1="SELECT `$stats` as stats FROM `reserve` WHERE `$ve_no`='$vno';";
    $ch2=mysqli_query($conn,$check1);
    $ch3=mysqli_fetch_assoc($ch2);
    // echo $ch3['stats'];
    $a=mysqli_num_rows($ch2);
    // echo $a;
    if(mysqli_num_rows($ch2)==1){
    $ch4=$ch3['stats'];}

    $aa="SELECT `slot`,`$ve_no` as 'vn',`$stats` as st FROM `reserve` WHERE `$stats` !='Unavailable';";
    $ab=mysqli_query($conn,$aa);
    $r12=mysqli_num_rows($ab);
    // echo $r12;
    $r1=mysqli_fetch_array($ab);
    $slot=[];
    $VNo=[];
    $stat=[];
    $j=1;
        while ($row = mysqli_fetch_array($ab)) {
            $slot[$j]=$row['slot'];
            $VNo[$j]=$row['vn'];
            $stat[$j]=$row['st'];
            $j++;
        }
        // echo $VNo[1];
        // echo $stat[1];
        
    // } This is for Sub2 if condition.
if(isset($_POST['Sub1'])){
    $slots=$_POST['slot'];
    $pln=$_POST['rev'];
    $reser="SELECT `p_id`,`c_name`,`Email` FROM `clients` WHERE c_place = '$pln' And Temp=0;";
    $reser1=mysqli_query($conn,$reser);
    $resr=mysqli_fetch_assoc($reser1);
    
    $v_no=$_POST['vno'];
    $ve_no=$_POST['p_id'];
    $mai=$resr['Email'];
    $mail=$resr['email1'];
    
    $r1="UPDATE `reserve` SET `$ve_no`='$v_no',`$mai`='Reserved' WHERE `slot`=$slots;";
    $r2=mysqli_query($conn,$r1);
    $dt=date('Y-m-d H:i:s');
    $d1=date('H');
    $d2=$d1+4;
    $dt1=date('Y-m-d '.$d2.':i:s');
    $add="INSERT INTO `details` (`sl`, `Email`,`v_no`, `VNo`,`VType`, `InTime`, `OutTime`, `Totalhrs`, `Price`, `Payment`,`p_id`) VALUES  (NULL, '$mail', '$v_no','$v_no','Car', current_timestamp(),'$dt1', 4, 20, 2,'$ve_no');";
    $add1=mysqli_query($conn,$add);
    $cha="UPDATE `basic` SET `Payment`=2,`points`=`points`-20 WHERE `VNo`='$v_no';";
    $cha1=mysqli_query($conn,$cha);
    
    
    header('Location:Reservation.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="dm.css">
    <link rel="stylesheet" href="home.css">

    <link rel="icon" href="prjlogo.jpeg">
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    /* display: flex; */
    justify-content: center;
    align-items: center;
    /* height: 100vh; */
    margin-left: 0px;
    width: 100%;
    /* margin: 0; */
}

.sel{
    text-align:center;
    width:300px;
    margin-top: 0px;
    margin-left: 600px;
}

.parking-lot1 {
    margin-top: 0px;
    display: grid;
    grid-template-columns: repeat(10, 120px);
    gap: 10px;
    /* background-color: #2c3e50; */
    /* padding: 20px; */
    border-radius: 10px;
}

.s1 {
            width: calc(100% - 12px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            
        }

        .s1 {
            width: 100%;
        }

.parking-space {
    margin-left:5px;
    width: 120px;
    height: 140px;
    background-color: #ecf0f1;
    border: 2px solid #bdc3c7;
    border-radius: 5px;
    position: relative;
}

.parking-space::before {
    content: attr(id);

    position: absolute;
    top: 5px;
    left: 5px;
    font-size: 16px;
    color: #7f8c8d;
}

#box{
    padding-top:10px;
    width:80px;
    /* margin-top:10px; */
    margin-left:5px;
}

#box1{
    width:80px;
    /* margin-top:8px; */
    margin-left:8px;
}
    </style>
</head>
<body>
    <header>
        <!-- <div class="heddiv"> -->
            <!-- <img src="/bag.jpg" alt="sry" class="img1"> -->
        <!-- </div> -->
        <h1>VEHICLE PARKING RESERVATION</h1>
        
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

    // echo $dt.'<br>';
    // echo $dt1;
    // echo $email;
    // echo $re;
?>
    
    <div class="sel">
    <h2>Reservation</h2>
    <form action="Reservation.php" method="get">
    <select name="place" id="" placeholder="Parking lot place" class="s1" autofocus>
                <option value="<?php print($re) ?>">
                <?php 
                    print($re);?>
                </option>
        <?php
            foreach($array as $arr){?>
                <option value="<?php print($arr) ?>">
                    <?php 
                    print($arr);?>
                </option><?php
            }?>
        
    </select><br><br>
    <input type="submit" class="s1" value="Submit" name="Sub2"><br><br>
    </form>
    </div>
    
<?php
// echo $slots."-". $v_no. "-". $mail;
// if(isset($_GET['Sub2'])){
// ?>
  <div class="parking">
    <h1>Parking Slots</h1>
    
    <!-- <div class="slots" id="slots"> -->
      <!-- Parking slots will be added here dynamically -->
    <!-- </div> -->
  </div>
 


    

<div class="parking-lot1">
<?php
// echo $slot[1];
// echo $slot[2];
?>
    <?php 
    $i=1;
    // echo $email;
    while($i<$r12){?>
    
        <div class="parking-space" id="<?php print($slot[$i]);?>">
        <form action="Reservation.php" method="post">
        <br>    
        <p>
            
            <input type="text" name="slot" id="box" value="<?php print($i);?>" hidden></p>
            <input type="text" name="rev" id="box" value="<?php print($re);?>" hidden></p>
            <p><input type="text" name="p_id" id="box" value="<?php print($ve_no);?>" hidden></p>
            <p><input type="text" name="email1" id="box" value="<?php print($email);?>" hidden></p>
            <p><input type="text" name="vno" id="box" value="<?php print($vno);?>" hidden></p>
            
            <p>
            
            <p>
            <label for="" id="box" style="margin-left:5px;"><?php print($stat[$i]);?></label><br><br>
            <label for="" id="box" style="margin-left:5px;"><?php print($VNo[$i]);?></label>
            </p>
            
            <?php if($stat[$i]=='Available'&(!($ch4=='Parked'|$ch4=='Reserved'))){
                echo<<<a
                <input type="submit" style="margin-left:5px;" value="Reserve" name="Sub1"/>
        a;
        }?>
        </form>
    </div>
    <?php
    $i++;
    }
    // }
    ?>

    </div>
    </div>


  



<p style="color:transparent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto sapiente placeat veniam. At incidunt dolores adipisci in, nesciunt distinctio culpa cupiditate debitis impedit iusto? Velit eligendi ex culpa error dolorem dolores dolore, maiores voluptate, sed voluptatibus fugiat quo ea perspiciatis commodi tenetur, dicta recusandae facere assumenda nihil veniam porro itaque totam. Consequuntur dicta nobis quibusdam id laborum eos facere dolore accusamus, ad quod impedit officiis, iure voluptates rem nesciunt officia consectetur quas quidem minima aperiam cupiditate animi aut recusandae? Culpa iste quae, veniam dolore distinctio obcaecati? Quisquam laborum modi, rem corporis nihil officiis quo dolores architecto iste tenetur, repellat consequatur fuga possimus eum, pariatur eaque ducimus modi perspiciatis ratione quasi autem praesentium nostrum quidem similique dolor quaerat. Illum, aperiam? Ab unde accusamus consectetur cumque. Corrupti, quia? Alias, maxime nulla soluta voluptatem itaque consequatur repellat nesciunt, laborum magni sit quis sapiente enim voluptates perferendis!</p>


    <!-- <link rel="stylesheet" href="reservation.css"> -->           
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
