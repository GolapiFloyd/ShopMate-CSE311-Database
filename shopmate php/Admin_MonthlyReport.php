<?php
include 'config.php';
session_start();

$shopid=$_SESSION['login_shopID'];
$currentyear=date('Y');
$currentmonth=date('m');

$sql1 = "SELECT COUNT(transactionID) as trans,CAST(AVG(amount_paid) as DECIMAL(10,2)) as avgtrans FROM transactions,trandate WHERE trandate.year='$currentyear'
AND trandate.month='$currentmonth'
AND transactions.transactionID=trandate.tranID  AND transactions.t_shopID='$shopid'";
$sql2 = "SELECT SUM(StockRemaining) as total_items FROM inventory WHERE i_shopID='$shopid'" ;
$sql3 = "SELECT SUM(amount_payable) as owing FROM debts WHERE d_shopID='$shopid'" ;
$sql4 = "SELECT COUNT(Cusername) as totalcus FROM customer_shop WHERE C_shopno='$shopid'" ;

$get_trans = mysqli_query($conn,$sql1 );
$get_items = mysqli_query($conn,$sql2 );
$get_debts = mysqli_query($conn,$sql3 );
$get_customers = mysqli_query($conn,$sql4 );

$row1 = mysqli_fetch_assoc($get_trans);
$row2 = mysqli_fetch_assoc($get_items);
$row3 = mysqli_fetch_assoc($get_debts);
$row4 = mysqli_fetch_assoc($get_customers);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Monthly Report</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
  </head>

  <body class="fillups">
  <?php include 'header_after.php' ?><br><br>


    <form class="box" action="">
      <h1 style="font-size:30px;"> Monthly Report </h1><br>
      No. of Transactions this month<input type="text" name="tran_num" readonly value="<?=$row1['trans']; ?>"><br>
      Average amount of transactions(tk.) this month<input type="text" name="avg_tran" readonly value="<?=$row1['avgtrans']; ?>"><br>
      Total items Remaining in Stock<input type="text" name="i_remain" readonly value="<?=$row2['total_items']; ?>"><br>
      Total debts customers owe<input type="text" name="total_debts" readonly value="<?=$row3['owing']; ?>"><br>
      Total customers in your shop<input type="text" name="total_customers" readonly value="<?=$row4['totalcus']; ?>"><br>
      <!-- <input type="submit" name="" value="Update"> -->
   </form>

<?php include 'footer.php' ?>
  </body>
</html>
