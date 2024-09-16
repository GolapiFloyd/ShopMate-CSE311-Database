<?php include 'config.php' ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Debts Manager</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">

  </head>
  <body class="bodydash" style="color:white;">
    <?php include 'header_after.php' ?>

<div class="dash">
  <h1> Debts Manager </h1><br><br>

  <?php
  $shopid=$_SESSION['login_shopID'];
  if(isset($_POST['search']))
  {
    $searchKey=$_POST['search'];
    $sql = "  SELECT debts.debtID,debts.amount_payable,debts.date_due,customer.c_name,customer.c_phone
              FROM debts, customer
              WHERE debts.d_shopID='$shopid'
              AND debts.customer_ID=customer.c_userID
              AND customer.c_name
              LIKE '%$searchKey%'" ;

  }
  else {
    $sql = "SELECT debts.debtID,debts.amount_payable,debts.date_due,customer.c_name,customer.c_phone
            FROM debts
            INNER JOIN customer ON debts.customer_ID=customer.c_userID
            WHERE debts.d_shopID='$shopid'";
    $searchKey="";
  }

  ?>

      <form class="search" action="action_page.php">
        <input type="text" placeholder="Search by Name" name="search">
        <button type="submit">go</button>
      </form><br>
</div>

<table class="content-table">

<?php

// 'SELECT a.id, a.name,b.id FROM tutorials_inf a,tutorials_bks b WHERE a.id = b.id'

        //$get_data = mysqli_query($conn,$sql );

if($get_data = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($get_data) > 0){

          echo '
            <thead>
            <tr>
              <th> Debt ID </th>
              <th>Amount Payable</th>
              <th> Date Due </th>
              <th> Customer Name </th>
              <th> Customer Phone no. </th>
              <th> Edit Record </th>
              <th> Delete Debt </th>
            </tr>
            </thead>';
            while ($row = mysqli_fetch_assoc($get_data)) {

              echo '
                <tbody>
                  <tr>
                      <td>'.$row['debtID'].'</td>
                      <td>'.$row['amount_payable'].'</td>
                      <td>'.$row['date_due'].'</td>
                      <td>'.$row['c_name'].'</td>
                      <td>'.$row['c_phone'].'</td>

                  <td> <a href="editdebt.php?debtid='.$row['debtID'].'">Edit</a> </td>
                  <td> <a href="delete.php?debtid='.$row['debtID'].'">Delete</a> </td>

                  </tr>
                </tbody>';
            }
          }

          else {
            echo 'no debt records';
          }
        }
          ?>
      </table>

      <div class=editinfo>
            <input onclick="window.location.href = 'insertDebt.php';" type="button" value="Add Item">
      </div>



    <?php include 'footer.php';?>
      <!-- <input type="submit" name="Add" value="Add Item"> <br>
      <input type="submit" name="Delete" value="Delete Item"> <br>
      <input type="submit" name="Change" value="Change Item"> <br> -->
  </body>
  </html>
