<?php
include 'config.php';

$tran_id =   $_GET['tranid'];
$tran_paid =  $_POST['t_paid'];
$tran_quantity  =  $_POST['quan'];




$sql = "UPDATE transactions SET amount_paid='$tran_paid',quantity='$tran_quantity' WHERE transactionID='$tran_id'";

$update = mysqli_query($conn,$sql );
if($update){
  header('Location: '.'Admin_TransactionManager.php');
}else{
  echo 'try again';
}

?>
