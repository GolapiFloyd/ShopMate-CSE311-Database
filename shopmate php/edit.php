<?php
require 'config.php';

$item_id  = $_GET['itemid'];
$sql = "SELECT * FROM inventory WHERE itemID='$item_id'" ;
$get_item = mysqli_query($conn,$sql );
$row = mysqli_fetch_assoc($get_item);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
  </head>

  <body class="fillups">
  <?php include 'header_after.php' ?>
    <form class="box2" action="update.php?itemid=<?=$row['itemID']?>" method="post">
      Item Type:<input readonly type="text" name="iType" value="<?=$row['itemType']; ?>"><br>
      Item Name:<input required type="text" name="iName" value="<?=$row['itemName']; ?>"><br>
      Item Price:<input required type="text" name="iPrice" value="<?=$row['itemPrice']; ?>"><br>
      Stock Remaining:<input required type="text" name="iStock" value="<?=$row['StockRemaining']; ?>"><br>
      <input required type="submit" name="update" value="Update">
    </form>

<?php include 'footer.php'?>
  </body>
</html>
