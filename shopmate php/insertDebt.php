<?php
require 'config.php';
session_start();
// if(isset($_POST['iType']) && isset($_POST['iName'])  && isset($_POST['iPrice'])  && isset($_POST['iStock'])){
  if (isset($_POST['submit'])) {


  $amount_payable  =  $_POST['amountPayable'];
  $date_due  =  $_POST['dateDue'];
  $customer_id  =  $_POST['customerId'];
  $SID=	$_SESSION['login_shopID'];

  $sql = "INSERT INTO debts (amount_payable, date_due, customer_ID,d_shopID)
        values('$amount_payable', '$date_due', '$customer_id','$SID')";

  $is_inserted = mysqli_query($conn,$sql);

  if($is_inserted){

    echo "<script>
          alert('Item Inserted');
          window.location.href= 'insertDebt.php';
          </script>
    ";
    exit;

  }else{
    echo "<script>
          alert('Opps error, try again');
          window.location.href= 'insertDebt.php';
          </script>
    ";
  }
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert Debt</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Cardo:400,700%7COswald" rel="stylesheet">
  </head>

      <body class="fillups">
    <?php include 'header_after.php' ?>

        <form class="box" action="insertDebt.php" method="post">
          <h1>Enter New Item </h1><br>
          <input type="text" name="amountPayable" placeholder="Payable amount" required><br><br>
          <input type="date" name="dateDue" placeholder="Due Date" required><br><br>
          <input type="text" name="customerId" placeholder="Customer ID" required><br>
          <input type="submit" name="submit" value="Insert">
          <input onclick="window.location.href = 'Admin_Debts.php';" type="button" value="Done Inserting">

        </form>

  </body>
</html>
