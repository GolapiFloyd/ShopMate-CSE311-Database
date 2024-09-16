<?php
include 'config.php';

$debt_id =   $_GET['debtid'];
$debt_pay  =  $_POST['d_pay'];
$debt_due  =  $_POST['d_due'];




$sql = "UPDATE debts SET amount_payable='$debt_pay', date_due='$debt_due' WHERE debtID='$debt_id'";

$update = mysqli_query($conn,$sql );
if($update){
  header('Location: '.'Admin_Debts.php');
}else{
  echo 'try again';
}

?>
