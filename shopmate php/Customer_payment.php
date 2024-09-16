<?php require 'config.php' ?>
<?php session_start(); ?>

<?php
if (isset($_POST['submit']))
{
$uname=$_SESSION['login_user'];
$shop=$_SESSION['shop_id'];

$sql = "SELECT debts.debtID FROM debts
      WHERE debts.d_shopID ='$shop'
      AND debts.customer_ID=(SELECT c.c_userID FROM customer c
      WHERE  c.c_username='$uname')";
$get_data = mysqli_query($conn, $sql);
$get = mysqli_fetch_array($get_data,MYSQLI_ASSOC);

$id=$get['debtID'];
$amount=$_POST['amount'];

$sql2 = "SELECT amount_payable from debts WHERE debtID='$id'";
$get_data2 = mysqli_query($conn, $sql2);
$get2 = mysqli_fetch_array($get_data2,MYSQLI_ASSOC);

$payable=$get2['amount_payable'];
$paid=$payable-$amount;
if($paid>0){

$sql3 = "UPDATE debts SET amount_payable='$paid' WHERE debtID='$id'";
$get_data3 = mysqli_query($conn, $sql3);

echo "<script>
      alert('Payment Succesful!');
      window.location.href= 'Customer_Debts.php';
      </script>
";
}
else if($paid==0){
  $sql4 = "DELETE FROM debts WHERE debtID='$id'";
  $get_data4 = mysqli_query($conn, $sql4);

  echo "<script>
        alert('Debt Cleared!');
        window.location.href= 'Customer_Debts.php';
        </script>
  ";
}
else {
  echo "<script>
        alert('amount more than debt');
        window.location.href= 'Customer_Debts.php';
        </script>
  ";
}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <meta charset="utf-8">
  <title>Pay Debt</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">

</head>
    <body class="fillups">

        <?php include 'customerheader_after.php' ?>


    <form class="box2" action="" method ="POST">
        <img style="width:150px;height:100px;" src="images/payment.svg" alt="debts are bad">
        <h1>Time to clear debts!</h1><br>
        <!-- <input style="padding: 2px 10px;" type="text" name="Email" placeholder="Email" required> <br><br> -->
        <input style="padding: 2px 10px;" type="text" name="Ncard" placeholder="Name on the card" required> <br><br>
        <input style="padding: 2px 10px;" type="text" name="CNumber" placeholder="Card Number" required> <br><br>
        <input style="padding: 2px 10px;" type="month" name="Edate" required> <br><br>
        <input style="padding: 2px 10px;" type="password" name="CVV" placeholder="Security Code(CVV)" required ><br><br>
        <input style="padding: 2px 10px;" type="text" name="amount" placeholder="Amount to pay" required ><br><br>

        <input type="submit" name="submit" value="Make Payment"> <br>
    </form>


    <?php include 'footer.php';?>
</body>
</html>
