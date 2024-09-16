<?php include 'config.php' ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Your Debts </title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">

  </head>
  <body class="bodydash" style="color:white;">

      <?php include 'customerheader_after.php' ?>

<div class="dash">
      <h1> Your Debts  </h1><br><br>
</div>

<table class="content-table">

<?php
  $uname=$_SESSION['login_user'];
	$shop=$_SESSION['shop_id'];

        $sql = "SELECT debts.amount_payable,debts.date_due FROM debts
        WHERE debts.d_shopID ='$shop'
        AND debts.customer_ID=(SELECT c.c_userID FROM customer c
        WHERE  c.c_username='$uname')";
        // SELECT customer.c_name,debts.amount_payable,debts.date_due
        //         FROM debts
        //         INNER JOIN customer ON debts.customer_ID=customer.c_userID
        //$get_data = mysqli_query($conn,$sql );

if($get_data = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($get_data) > 0){

          echo '
            <thead>
            <tr>
              <th> Amount Payable </th>
              <th> Date Due </th>
            </tr>
            </thead>
            ';
            while ($row = mysqli_fetch_assoc($get_data)) {

              echo '
                <tbody>
                  <tr>
                      <td>'.$row['amount_payable'].'</td>
                      <td>'.$row['date_due'].'</td>
                  </tr>
                </tbody>';
            }
          }

          else {
            echo 'no debt records';
          }
        }
          ?>
      </table><br>


<button onclick="location.href='Customer_payment.php';" class="btn btn1">Make Payment</button>
<br><br><br>

<?php include 'footer.php';?>
  </body>
  </html>
