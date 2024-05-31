<?php
    include 'DataBase.php';
    include 'common.php';
    $t1="SELECT `Email`,`Password` FROM `basic`;";
    $r1=mysqli_query($conn,$t1);
    while ($row = mysqli_fetch_assoc($r1)) {
        $a=$row['Email'];
        $b=$row['Password'];
        echo ' <tr> 
        
        <td class="td">' . $row['Email'] . '</td>
        <td class="td">' . $row['Password'] . '</td>
        <td class="td">
        </td><br>
        </tr>
        
         ';

        // Only at emergency

        //  $ins="INSERT INTO `login`(`email`, `pass`, `temp`) VALUES ('$a','$b',1);";
        //  $ins1=mysqli_query($conn,$ins);
         ;
    }
?>