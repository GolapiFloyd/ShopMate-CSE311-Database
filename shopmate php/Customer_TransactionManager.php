<?php require 'config.php'?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Customer Transactions </title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">

  </head>
  <body class="bodydash" style="color:white;">

      <?php include 'customerheader_after.php' ?>

<div class="dash">
      <h1> Your Transactions </h1><br><br>
      <?php
      $shopid=$_SESSION['shop_id'];
      $uname=	$_SESSION['login_user'];

      if(isset($_POST['search']))
      {
        $searchKey=$_POST['search'];
        $sql = "SELECT inventory.itemName,transactions.amount_paid,transactions.date_purchased,transactions.quantity
                FROM transactions,inventory
                WHERE transactions.itemID=inventory.itemID
                AND transactions.t_shopID='$shopid'
                AND transactions.customer_userID=(SELECT c.c_userID FROM customer c
                WHERE  c.c_username='$uname')
                AND inventory.itemName
                LIKE '%$searchKey%'" ;

      }
      else {

        $sql = "SELECT inventory.itemName,transactions.amount_paid,transactions.date_purchased,transactions.quantity
          FROM transactions,inventory
          WHERE transactions.itemID=inventory.itemID
          AND transactions.t_shopID='$shopid'
          AND transactions.customer_userID=(SELECT c.c_userID FROM customer c
          WHERE  c.c_username='$uname')" ;
          $searchKey="";
      }

      ?>

            <form class="search" action="" method="post">
              <input type="text" placeholder="Search by Item Name" name="search" value="<?php echo $searchKey; ?>">
              <button type="submit">go</button>
            </form><br>

      </div>


<table class="content-table">

<?php
        if($get_data = mysqli_query($conn,$sql)){

        if(mysqli_num_rows($get_data) > 0){

          echo '
          <thead>
          <tr>
            <th> Item Name </th>
            <th> Amount Paid(tk.) </th>
            <th> Date Purchased </th>
           <th> Quantity </th>
          </tr>
          </thead>';

            while ($row = mysqli_fetch_assoc($get_data)) {

              echo '
                <tbody>
                  <tr>
                      <td>'.$row['itemName'].'</td>
                      <td>'.$row['amount_paid'].'</td>
                      <td>'.$row['date_purchased'].'</td>
                      <td>'.$row['quantity'].'</td>

                  </tr>
                </tbody>';
            }

          }

          else {
            echo 'No Records Found';
          }
        }
        else {
          echo 'no records';
        }
          ?>
      </table>



  <?php include 'footer.php';?>

  </body>
  </html>
