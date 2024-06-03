<!-- Services -->
<!-- This files has nav link to /Dash.php, /Reservation.html, /About.html, /contact.html -->
<?php
// session_start();
include 'DataBase.php';
include 'Common.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="prjlogo.jpeg">
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
    
    <h1>History</h1>
    <?php
            // $try="default";
            // if(isset($_GET['Submit'])){
            //     $try=$_GET['sel'];
            //     // echo $try;
            // }
                // echo $email;
                $sql = "SELECT * FROM `details` where Email='$email';";
                $result = mysqli_query($conn, $sql);
            
        ?>

   
    <div class="tb">
       <table border 1px white class="tbl">
            
            <th class="hd">SL NO.</th>
            <th class="hd">InTime</th>
            <th class="hd">OutTime</th>
            <th class="hd">Total Parking Time</th>
            <th class="hd">Total Price</th>
            <th class="hd">Payment Status</th>

            <?php
            $i=1;
            while ($row = mysqli_fetch_assoc($result)) {
                $price=0;
                $Vno=$row['VNo'];

                if($row['Payment']==0||$row['Payment']==NULL){
                    $status='Vehicle Parked';
                }
                else{
                    $status='Payment Successful';
                }

                echo ' <tr> 

                <td class="td">' . $i . '</td>
                <td class="td">' . $row['InTime'] . '</td>
                <td class="td">' . $row['OutTime'] . '</td>
                <td class="td">' . $row['Totalhrs'].' Hours'. '</td>
                <td class="td" center>' . $row['Price'] . '</td>
                <td class="td">' . $status . '</td>
                <td class="td">
                
                
                </td>
                </tr>
                
                 ';
                 ;
                 $i++;
            } ?>
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
