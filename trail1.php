<?php
    $id=10;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="trail1.php" method="get">
        <div id="a" value="<?php print($id);?>" name="id1"><?php print($id);?></div>
        <p><input type="text" name="id" id="" value="<?php print($id);?>"/></p>
        <p><input type="submit" value="Sub" name="Sub1"/></p>
        <?php
        if(isset($_GET['Sub1'])){
            $id=((int)$_GET['id1']);
            echo $id;
        }
        ?>
    </form>
</body>
</html>

