<?php require 'config.php' ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
  </head>
  <body class="bodydash">
  <?php include 'header_after.php' ?>
<div class="dash">
<h1> ADMIN DASHBOARD</h1>


<div class="mothercontainer">

  <div class="container">
      <button class="btn btn1" onclick="window.location.href = 'Admin_InventoryManager.php';">  Inventory Manager  </button><br>
        <button class= "btn btn1" onclick="window.location.href = 'Admin_TransactionManager.php';"> Transaction Manager </button> <br>
        <button class="btn btn1" onclick="window.location.href = 'Admin_Debts.php';"> Debt Manager </button>
    </div>

  <div class="container1">
    <button class="btn btn1" onclick="window.location.href = 'Admin_MonthlyReport.php';">  View Monthly Report  </button><br>
    <button class= "btn btn1" onclick="window.location.href = 'Admin_AdminManager.php';">Manage/Add Admins  </button> <br>
    <button class="btn btn1" onclick="window.location.href = 'Admin_CustomerManager.php';"> Manage/Add Customers </button>

  </div>
</div>
</div>

<br><br>
<?php include 'footer.php';?>
  </body>
</html>
