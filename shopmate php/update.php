<?php
include 'config.php';

$item_id =   $_GET['itemid'];
$item_type  =  $_POST['iType'];
$item_name  =  $_POST['iName'];
$item_price  =  $_POST['iPrice'];
$item_stock  =  $_POST['iStock'];



$sql = "UPDATE inventory SET itemType='$item_type', itemName='$item_name', itemPrice='$item_price',StockRemaining='$item_stock' WHERE itemID='$item_id'";

$update = mysqli_query($conn,$sql );
if($update){
  header('Location: '.'Admin_InventoryManager.php');
}else{
  echo 'try again';
}

?>
