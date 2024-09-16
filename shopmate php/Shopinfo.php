<?php
require 'config.php';
session_start();

$shops =$_SESSION['shop_id'];
$sql = "SELECT * FROM shops WHERE shopID='$shops'" ;
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
  <?php include 'customerheader_after.php' ?>
    <form class="box" action="">
      <h1 style="font-size:30px;">SHOP INFO</h1>
      Shop Name<input readonly type="text" name="sname" value="<?=$row['shop_name']; ?>"><br>
    Shop Address<input readonly type="text" name="saddress" value="<?=$row['shop_address']; ?>"><br>
      Shop email<input readonly type="text" name="semail" value="<?=$row['shop_email']; ?>"><br>
      Shop Phone<input readonly type="text" name="sphone" value="<?=$row['shop_phone']; ?>"><br>
      <!-- <input readonly type="submit" name="update" value="Update"> -->
    </form>
<?php include 'footer.php' ?>
  </body>
</html>
