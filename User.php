<?php
session_start();
include "DataBase.php";
$sql = "SELECT * FROM `basic`;";
$result = mysqli_query($conn, $sql);

if ($_SESSION['admin_id'] != 1) {
    header('Location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="User.css">
    <link rel="icon" href="prjlogo.jpeg">


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
    <a href="/project2024-main/Table.php">History</a>
        <!-- <a href="/project2024-main/Reserve.php">Reservation</a> -->
        <a href="/project2024-main/User.php">Users</a>
        <!-- <a href="/project2024-main/Entry.php" target="_blank">Vehicle Entry</a>
        <a href="/project2024-main/Exit.php" target="_blank">Vehice Exit</a> -->
        <a href="/project2024-main/Logout.php">Logout</a>
    </nav>



    
    
    <div class="u-table">    
       <h1>Admin Page</h1>
       <table border 1px white class="tbl">
            <th class="hd">Sl No</th>
            <th class="hd">Name</th>
            <th class="hd">Vehicle Number</th>
            <th class="hd">Vehicle Type</th>
            <!-- <th class="hd">Phone Number</th> -->
            <th class="hd">E-mail</th>
            <!-- <th class="hd">User-Id</th> -->
            <th class="hd">Action</th>

            <?php
            $i=1;
            while ($row = mysqli_fetch_assoc($result)) {

                echo ' <tr> 
                <td class="td">' . $i . '</td>
                <td class="td">' . $row['Name'] . '</td>
                <td class="td">' . $row['VNo'] . '</td>
                <td class="td">' . $row['VType'] . '</td>
                
                <td class="td">' . $row['Email'] . '</td>
                <td class="td">
                
                <button class="btn-delete"><a href="delete.php?deleteVNo=' . $row['VNo'] . '">Delete</a></button> 
                </td>
                </tr>
                
                 ';
                 $i++;
            } ?>
        </table>
</div>
<p class="hide" style="color:transparent;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam exercitationem, aperiam tempora est sapiente id? Blanditiis sit, voluptatum voluptate voluptatem natus enim quae, iste ratione cupiditate soluta fugit ullam sequi similique! Incidunt veniam esse nihil. Incidunt ratione numquam fugiat recusandae minus velit, molestiae atque alias optio tenetur. Consequuntur, numquam possimus! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta distinctio porro iure temporibus perspiciatis dicta, ex cum molestiae iusto dignissimos placeat, sapiente labore dolorem incidunt quisquam iste ratione delectus doloremque ducimus exercitationem dolore eligendi in ea. Commodi sequi hic autem aspernatur vero aliquam pariatur omnis asperiores eveniet, aperiam quis eligendi. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum qui possimus consequatur ratione quae deserunt accusantium repellendus fuga aliquam quos?</p>



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
