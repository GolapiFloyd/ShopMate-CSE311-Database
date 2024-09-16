<?php require 'config.php'; ?>
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

    <?php include 'customerheader_after.php' ?><br>
<div class="dash">

  <h1> CUSTOMER DASHBOARD </h1><br><br><br>
  <h1 style="font-size:20px;"> Shops You Are Connected to: </h1><br><br>

<?php
  $uname=$_SESSION['login_user'];
  $sql =" SELECT * FROM customer_shop
          INNER JOIN shops
          ON customer_shop.C_shopno=shops.shopID
          WHERE customer_shop.Cusername='$uname'" ;

  $get_data = mysqli_query($conn,$sql );

if(mysqli_num_rows($get_data) > 0){


    while ($row = mysqli_fetch_assoc($get_data)) {

    echo '<a href="Customer_Dashboard.php?shopid='.$row['C_shopno'].'">'.$row['shop_name'].'</a>
    <br><br>';
}

}
else {
  echo 'Not Connected to any Shops yet';
}
?>
</div>

<?php include 'footer.php';?>
  </body>
</html>
