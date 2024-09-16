<?php include 'config.php' ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Inventory Manager </title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
</head>


<body class="bodydash" style="color:white;">

      <?php include 'header_after.php' ?>
<div class="dash">
      <h1> Inventory </h1><br><br>


<?php
$shopid=$_SESSION['login_shopID'];

if(isset($_POST['search']))
{
  $searchKey=$_POST['search'];
  $sql = "SELECT * FROM inventory WHERE inventory.i_shopID ='$shopid' AND itemName LIKE '%$searchKey%'" ;
}
else {

  $sql = "SELECT * FROM inventory WHERE inventory.i_shopID ='$shopid'" ;
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
        $get_data = mysqli_query($conn,$sql );
        if(mysqli_num_rows($get_data) > 0){

          echo '
            <thead>
            <tr>
              <th> Item ID </th>
              <th> Item Type </th>
              <th> Item Name </th>
              <th> Item Price </th>
              <th> Stock Remaining </th>
              <th> Update Stock </th>
             <th> Remove Item </th>
            </tr>
            </thead>';
            while ($row = mysqli_fetch_assoc($get_data)) {

              echo '
                <tbody>
                  <tr>
                      <td>'.$row['itemID'].'</td>
                      <td>'.$row['itemType'].'</td>
                      <td>'.$row['itemName'].'</td>
                      <td>'.$row['itemPrice'].'</td>
                      <td>'.$row['StockRemaining'].'</td>

                  <td> <a href="edit.php?itemid='.$row['itemID'].'">Edit</a> </td>
                  <td> <a href="delete.php?itemid='.$row['itemID'].'">Delete</a> </td>

                  </tr>
                </tbody>';
            }
          }
          else {
            echo 'No Records Found';
          }
          ?>
      </table>

      <div class=editinfo>
            <input onclick="window.location.href = 'insertInventory.php';" type="button" value="Add Item"><br><br>
      </div>
<!-- <h2 style="color:red;font-family:'Oswald', sans-serif;">Please note, Deleting inventory completely also deletes transaction data </h2> -->
      <?php include 'footer.php';?>
  </body>
  </html>
