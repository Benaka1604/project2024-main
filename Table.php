<?php
include "DataBase.php";
include "common.php";
$try=0;
// $sql = "SELECT * FROM `details` ORDER BY `InTime` ASC;";
// $result = mysqli_query($conn, $sql);
if(isset($_POST['Submit'])){
    $try=$_POST['sel'];
    // echo $try;
}
if(isset($_POST['sub1'])){
    $tr=$_POST['vno'];
    $try=3;
    // echo $try;
}
if(isset($_POST['sub2'])){
    $cid=$_POST['cid'];
    $try=6;
    // echo $try;
}

$sql = "SELECT * FROM `details` ORDER BY `OutTime` ASC;";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking History</title>
    <link rel="stylesheet"  href="Table.css">
    <link rel="icon" href="prjlogo.jpeg">
    <style>
          select {
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 10px;
            
        }
        .widget11{
            /* border: 2px solid #ddd; */
            margin-left: 585px;
            margin-bottom: 10px;
            width: 300px;
            height: 40px;   
            padding: 20px;
            border-radius: 5%;
            padding-left: 12px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Parking History</h1>
        
    </header>
    <nav>
        <a href="/project2024-main/Admin.php">Home</a>
        <a href="/project2024-main/Table.php">History</a>
        
        <!-- <a href="/project2024-main/Reserve.php">Reservation</a> -->
        <a href="/project2024-main/Recharge.php">Recharge</a>
        <a href="/project2024-main/User.php">Users</a>
        <a href="/project2024-main/c_data.php">Clients</a>
        <a href="/project2024-main/c_reg.php">Client Register</a>
        <!-- <a href="/project2024-main/Entry.php" target="_blank">Vehicle Entry</a>
        <a href="/project2024-main/Exit.php" target="_blank">Vehice Exit</a> -->
        <a href="/project2024-main/Logout.php">Logout</a>
    </nav>



    
    <div class="tabledata">
    
       <h1 style="text-align:center;" class="abc">Parking Histroy</h1>
       <div class="widget11">
        <form action="Table.php" method="post">
            <label for="" >Search &nbsp&nbsp&nbsp</label>
            <Select name="sel">
                
                <option value="1" >Vehicle No</option>
                <option value="2" >Parked Vehicle</option>
                <option value="0" >Full History</option>
                <option value="4" >Client Id</option>
            </Select>&nbsp&nbsp&nbsp&nbsp
            <!-- <input type="button" value="Submit"> -->
            <input type="submit" value="Submit" name="Submit">
            <br>
        </form><br></div>
<div style="text-align:center;">
<?php
        if($try==1){?>
            <form action="Table.php" method="post">
                <input type="text" name="vno" id="" placeholder="Enter vehicle No." autofocus>
                <input type="submit" value="Submit" name="sub1">
            </form>
<?php        }
elseif($try==4){?>
    <form action="Table.php" method="post">
        <input type="text" name="cid" id="" placeholder="Enter Client Id." autofocus>
        <input type="submit" value="Submit" name="sub2">
    </form>
   <?php 
}
     ?>   </div>
    <div class="tb">
       <table border 1px white class="tbl">
            <th class="hd" >Sl No</th>
            <th class="hd">Email</th>
            <th class="hd">Vehicle Number</th>
            <th class="hd">Vehicle Type</th>
            <th class="hd">InTime</th>
            <th class="hd">OutTime</th>
            <th class="hd">Total Parking Time</th>
            <th class="hd">Total Price</th>
            <th class="hd">Payment Status</th>
            <th class="hd">Client Id</th>
            <th class="hd">City</th>
            <th class="hd">Place</th>
        <?php
            if($try==5){
            $sql = "SELECT * FROM `details` WHERE Payment=0 ORDER BY `OutTime` ASC;";
            $result = mysqli_query($conn, $sql);
            // $try="default";
            // echo $try;
        }
            
            if($try==0){
                $sql = "SELECT * FROM `details` ORDER BY `OutTime` ASC;";
                $result = mysqli_query($conn, $sql);
            }
            elseif($try==2){
                $sql = "SELECT * FROM `details` WHERE Payment=0 ORDER BY `OutTime` ASC;";
                $result = mysqli_query($conn, $sql);
            }
            elseif($try==3){
                // echo 'efs';
                $sql = "SELECT * FROM `details` WHERE v_no='$tr' ORDER BY `OutTime` ASC;";
                $result = mysqli_query($conn, $sql);
            }
            elseif($try==6){
                // echo 'efs';
                $sql = "SELECT * FROM `details` WHERE p_id='$cid' ORDER BY `OutTime` ASC;";
                $result = mysqli_query($conn, $sql);
            }
            //     $sql = "SELECT `VNo` FROM `basic` order by 'VNo';";
            //     $result = mysqli_query($conn, $sql); 
            //     $array=[];
            //     while ($row = mysqli_fetch_array($result)) {
            //         $array[]=$row['VNo'];
            //     }
            //     echo<<<a
            //     <form action="Table.php" method="post">
            //         <label for=""><h3>Select Vehicle Number to enter</h3></label><br>
            //         <select name="v_no" id="" autofocus>
            //             <?php
            //                 foreach($array as $arr){?
            //                    <!-- <option value="
         //?php print($arr) ?
            
            //                         ?php 
            //                         print($arr);?
            //                     </option>?php
            //                 }?
                        
            //         </select><br><br>
            //         <input type="submit" name="Submit1">
            //     </form>
            //     a;
            // -->
        

            $i=1;
            while ($row = mysqli_fetch_assoc($result)) {
                $price=0;
                $inti=$row['InTime'];
                $Vn=strtoupper($row['v_no']);
                $Vno=$row['VNo'];
                $c_time=date('Y-m-d G:i:s');
                $outti=$row['OutTime'];
                if($inti<=$outti){
                    if($row['Payment']==0||$row['Payment']==NULL){
                        $run2="UPDATE `details` SET `OutTime` = '$c_time' WHERE VNo = '$Vno'";
                        $update1=mysqli_query($conn, $run2);                            
                    }
                    $start_datetime = new DateTime($inti); 
                    $diff = $start_datetime->diff(new DateTime($outti)); 
                }
                $hour=ceil(((($diff->d)*1440)+(($diff->h)*60)+($diff->i))/60);

                $price=(ceil(((($diff->d)*1440)+(($diff->h)*60)+($diff->i))/720)*10);
                if($row['Payment']==0||$row['Payment']==NULL){
                    $run2="UPDATE `details` SET `Price` = '$price' WHERE VNo = '$Vno'";
                    $update1=mysqli_query($conn, $run2);  
                    $run3="UPDATE `details` SET `Totalhrs` = '$hour' WHERE VNo = '$Vno'"; 
                    $update1=mysqli_query($conn, $run3);                          
                }

                if($row['Payment']==0||$row['Payment']==NULL){
                    $status='Vehicle Parked';
                }
                elseif($row['Payment']==1){
                    $status='Payment Successful';
                }
                elseif($row['Payment']==2){
                    $status='Reserved';
                }
                $pid=$row['p_id'];
                $cli="SELECT `c_name`,`c_city`,`c_place` FROM `clients` WHERE `p_id`=$pid;";
                $cli1=mysqli_query($conn,$cli);
                $cli2=mysqli_fetch_assoc($cli1);

                echo ' <tr> 
                <td class="td">' . $i . '</td>
                <td class="td">' . $row['Email'] . '</td>
                <td class="td">' . $Vn . '</td>
                <td class="td">' . $row['VType'] . '</td>
                <td class="td">' . $row['InTime'] . '</td>
                <td class="td">' . $row['OutTime'] . '</td>
                <td class="td">' .$diff->d." Days " .$diff->h." Hours " . $diff->i." Min" . '</td>
                <td class="td" center>' . $row['Price'] . '</td>
                <td class="td">' . $status . '</td>
                <td class="td">' . $pid . '</td>
                <td class="td">' . $cli2['c_city'] . '</td>
                <td class="td">' . $cli2['c_place'] . '</td>
                <td class="td">
                
                
                </td>
                </tr>
                
                 ';
                 ;
                 $i++;
            }
            // echo $p_id; 
            ?>
        </table>

        </div>
        </div>

        <p class="hide">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia autem aspernatur, expedita recusandae nesciunt perspiciatis dignissimos labore libero sed ipsa alias non in obcaecati eaque aliquam numquam laborum! Excepturi, aliquid minus rerum cumque nisi in fugiat earum. Aspernatur consectetur omnis labore Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus tempora facilis quo saepe odit molestiae quis laudantium ducimus magni quae? Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, veritatis. accusantium lorem50 voluptatem quam voluptates! Sunt sequi expedita qui Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident unde, dolorem nostrum iure asperiores eligendi ab dolorum! Tempore, fugiat fugit assumenda quasi facere odit architecto excepturi blanditiis id distinctio quas ullam, minima sapiente placeat iure nemo eaque optio illo ad dicta incidunt ut dolore ipsam? Possimus odit quas quia voluptatem. rem.</p>



<footer>
    <div class="social-icons">
        
        <a href="https://www.facebook.com/yourpage"><img src="/fblogo.jpeg" alt="Facebook" class="socialic"></a>
        
        <a href="https://www.instagram.com/yourpage"><img src="/instalogo.jpeg" alt="Instagram" class="socialic"></a>
        <a href="https://twitter.com/yourpage"><img src="/xlogo.jpeg" alt="Twitter X" class="socialic"></a>
    </div>
    <p style="text-align:center;">&copy; 2024 Vehicle Parking. All rights reserved.</p>
</footer>
</body>
</html>
