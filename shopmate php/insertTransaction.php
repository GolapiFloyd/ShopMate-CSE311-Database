<?php
include 'config.php';
session_start();
  $exist="";
  $quantityerror="";

if (isset($_POST['submit'])) {
    $SID=	$_SESSION['login_shopID'];
    $customer_username =  $_POST['customerID'];
    $item_id  =  $_POST['itemID'];

    $customercheck = "SELECT * from customer_shop WHERE Cusername='$customer_username' AND C_shopno='$SID'";
    $inventorycheck="SELECT * from inventory WHERE i_shopID='$SID' AND itemID='$item_id'";

    $customer_exist=mysqli_query($conn,$customercheck);
    $inventory_exist=mysqli_query($conn,$inventorycheck);

    $count = mysqli_num_rows($customer_exist);
    $count2 = mysqli_num_rows($inventory_exist);

  if($count==1 && $count2==1)
  {
  $find_customerID="SELECT customer.c_userID from customer WHERE customer.c_username='$customer_username' ";
  $customerGETid=mysqli_query($conn,$find_customerID);
  $cu_id = mysqli_fetch_assoc($customerGETid);
  $customer_userId=$cu_id['c_userID'];

  $amount_paid  =  $_POST['amountPaid'];
  $date_purchased  =  date('Y/m/d');
  $month= date('m');
  $year=date('Y');
  $quantity = $_POST['quanTity'];

  $quantity_check="SELECT StockRemaining FROM inventory WHERE itemID='$item_id'";
  $quantity_exist=mysqli_query($conn,$quantity_check);
  $getquantity = mysqli_fetch_assoc($quantity_exist);

  $item_remaining=$getquantity['StockRemaining'];
  if($item_remaining >= $quantity){

  $item_remaining=$item_remaining-$quantity;

  $sql = "INSERT INTO transactions (customer_userID,itemID,amount_paid,date_purchased,quantity,t_shopID)
        values('$customer_userId', '$item_id', '$amount_paid','$date_purchased','$quantity','$SID')";
  $is_inserted = mysqli_query($conn,$sql);


  $tranID= $conn->insert_id;
  $sqldate = "INSERT INTO trandate (tranID,month,year)
           values('$tranID', '$month', '$year')";

  $is_inserted2 = mysqli_query($conn,$sqldate);

  $sqlquantity = "UPDATE inventory SET StockRemaining='$item_remaining' WHERE itemID='$item_id'";

  $updatequantity = mysqli_query($conn,$sqlquantity);

  if($is_inserted && $is_inserted2){

    echo "<script>
          alert('Transaction Record Inserted');
          window.location.href= 'insertTransaction.php';
          </script>
          ";
    exit;

  }else{
    echo "<script>
          alert('Opps error, try again');
          window.location.href= 'insertTransaction.php';
          </script>
    ";
  }
}
else {
  $quantityerror="Not enough stock";
}
}
else {
  $exist="Item ID or Customer username is wrong";
}
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert Transaction</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
  </head>
  <body>

      <body class="fillups">

        <?php include 'header_after.php' ?>

        <form class="box" action="insertTransaction.php" method="post">
<h1>Enter New Record</h1><br>
          <input type="text" name="customerID" placeholder="Enter customer username" required><br><br>
          <input type="text" name="itemID" placeholder="Item ID" required><br><br>
          <input type="text" name="amountPaid" placeholder="Amount Paid" required><br><br>
          <input type="text" name="quanTity" placeholder="Quantity" required><br><br>
          <input type="submit" name="submit" value="Insert">
          <input onclick="window.location.href = 'Admin_TransactionManager.php';" type="button" value="Done Inserting">
          	<?php echo '<p>'.$exist.'</p>'; ?><br>
            <?php echo '<p>'.$quantityerror.'</p>'; ?>

        </form>

      </body>

  </body>
</html>
