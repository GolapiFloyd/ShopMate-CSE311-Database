<?php
require 'config.php';

$debt_id  = $_GET['debtid'];
$sql = "SELECT * FROM debts WHERE debtID='$debt_id'" ;
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
    <form class="box2" action="updatedebt.php?debtid=<?=$row['debtID']?>" method="post">
      Customer ID:<input required readonly type="text" name="d_customer" value="<?=$row['customer_ID']; ?>"><br>
      Amount Payable:<input required type="text" name="d_pay" value="<?=$row['amount_payable']; ?>"><br>
      Date Due:<input required type="text" name="d_due" value="<?=$row['date_due']; ?>"><br>
      <input required type="submit" name="update" value="Update">
    </form>
<?php include 'footer.php'?>
  </body>
</html>
