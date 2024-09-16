<?php require 'config.php'; ?>
<?php session_start();

$_SESSION['shop_id']=$_GET['shopid'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
  </head>
  <body class="bodydash">

      <?php include 'customerheader_after.php' ?>

   <div class="dash">
<h1> CUSTOMER DASHBOARD </h1>

<div class="mothercontainer">
      <div class="container" >
      <button class="btn btn1" onclick="window.location.href = 'Customer_TransactionManager.php';"> Check Transactions  </button> <br>
      <button class="btn btn1" onclick="window.location.href = 'Customer_Debts.php';"> Check Debts </button>
      </div>

      <div class="container1" style="  margin-top: 160px;">
        <button class="btn btn1" onclick="window.location.href = 'Shopinfo.php';">Shop Info</button> <br>
      </div>
</div>
</div>
<?php include 'footer.php';?>


  </body>
</html>
