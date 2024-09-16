<?php include'config.php' ?>


<?php
if(isset($_GET['itemid']))
{

      $item_id = $_GET['itemid'];
      $sql = "DELETE FROM inventory WHERE itemID='$item_id'";
      $delete = mysqli_query($conn,$sql);

      if($delete){
        echo "<script>
              alert('Data Deleted!');
              window.location.href= 'Admin_InventoryManager.php';
              </script>
        ";
        exit;
      }
      else {
        echo "<script>
              alert('Delete Unsuccessful!');
              window.location.href= 'Admin_InventoryManager.php';
              </script>
        ";
      }
}

else if(isset($_GET['tranid']))
{
  $tran_id = $_GET['tranid'];
  $sql1 = "DELETE FROM transactions WHERE transactionID='$tran_id'";
  $sqltrandate=" DELETE FROM trandate WHERE tranID='$tran_id'";
  $delete1 = mysqli_query($conn,$sql1);
  $deletetran = mysqli_query($conn,$sqltrandate);

  if($delete1 && $deletetran){
    echo "<script>
          alert('Data Deleted!');
          window.location.href= 'Admin_TransactionManager.php';
          </script>
    ";
    exit;
  }
  else {
    echo "<script>
          alert('Delete Unsuccessful!');
          window.location.href= 'Admin_TransactionManager.php';
          </script>
    ";
  }
}

else if(isset($_GET['debtid']))
{
  $debt_id = $_GET['debtid'];
  $sql2 = "DELETE FROM debts WHERE debtID='$debt_id'";
  $delete2 = mysqli_query($conn,$sql2);

  if($delete2){
    echo "<script>
          alert('Data Deleted!');
          window.location.href= 'Admin_Debts.php';
          </script>
    ";
    exit;
  }
  else {
    echo "<script>
          alert('Delete Unsuccessful!');
          window.location.href= 'Admin_Debts.php';
          </script>
    ";
  }
}

else if(isset($_GET['Cid']))
{
  $customer_id = $_GET['Cid'];
  $sql3 = "DELETE FROM customer_shop WHERE Cusername='$customer_id'";
  $delete3 = mysqli_query($conn,$sql3);

  if($delete3){
    echo "<script>
          alert('Customer Deleted!');
          window.location.href= 'Admin_CustomerManager.php';
          </script>
    ";
    exit;
  }
  else {
    echo "<script>
          alert('Delete Unsuccessful!');
          window.location.href= 'Admin_CustomerManager.php';
          </script>
    ";
  }
}
else if(isset($_GET['Aid']))
{
  $admin_id = $_GET['Aid'];
  $sql4 = "DELETE FROM admin WHERE userID='$admin_id'";
  $delete4 = mysqli_query($conn,$sql4);

  if($delete4){
    echo "<script>
          alert('Admin Removed!');
          window.location.href= 'Admin_AdminManager.php';
          </script>
    ";
    exit;
  }
  else {
    echo "<script>
          alert('Delete Unsuccessful!');
          window.location.href= 'Admin_AdminManager.php';
          </script>
    ";
  }
}
?>
