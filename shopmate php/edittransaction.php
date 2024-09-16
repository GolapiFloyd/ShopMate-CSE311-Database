<?php
require 'config.php';

$tran_id  = $_GET['tranid'];
$sql = "SELECT * FROM transactions WHERE transactionID='$tran_id'" ;
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
    <form class="box2" action="updatetransaction.php?tranid=<?=$row['transactionID']?>" method="post">
      CustomerID:<input readonly type="text" name="t_customer" value="<?=$row['customer_userID']; ?>"><br>
      ItemID:<input readonly type="text" name="t_item" value="<?=$row['itemID']; ?>"><br>
      Amount Paid:<input required type="text" name="t_paid" value="<?=$row['amount_paid']; ?>"><br>
      Quantity:<input required type="text" name="quan" value="<?=$row['quantity']; ?>"><br>

      <input type="submit" name="update" value="Update">
    </form>
<?php include 'footer.php'?>
  </body>
</html>
