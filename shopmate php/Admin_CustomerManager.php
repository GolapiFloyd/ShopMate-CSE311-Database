<?php require 'config.php' ?>
<?php session_start();

$error = "";
$shopid=$_SESSION['login_shopID'];

if (isset($_POST['UsName'])) {

$Cusername = mysqli_real_escape_string($conn, $_POST['UsName']);
$sql="SELECT customer.c_username FROM customer WHERE c_username='$Cusername'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
  if($count==1)
  {
  $add_customer = "INSERT INTO customer_shop (Cusername,C_shopno) VALUES ('$Cusername', '$shopid')";

  $result3 = mysqli_query($conn, $add_customer);

      if ($result3) {

        echo "<script>
        alert('Added Successfully');
        window.location.href = 'Admin_CustomerManager.php';
        </script>
        ";
        exit;
      }
      else {
        echo "<script>
        alert('Customer Already Connected');
        window.location.href = 'Admin_CustomerManager.php';
        </script>
        ";
      }

    }
  else {
    $error="last entered username doesn't exist" ;
  }

}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Customer Manager </title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">

  </head>
  <body class="bodydash" style="color:white;">


    <?php include 'header_after.php' ?>

<div class="dash">
      <h1>Your Customers</h1><br><br>


      <?php
      if(isset($_POST['search']))
      {
        $searchKey=$_POST['search'];
        $sql = "  SELECT customer.c_username,customer.c_name,customer.c_phone,customer.c_email
                  FROM customer,customer_shop
                  WHERE customer_shop.C_shopno='$shopid'
                  AND customer.c_username=customer_shop.Cusername
                  AND customer.c_name
                  LIKE '%$searchKey%'" ;

      }
      else {
        $sql = "SELECT customer.c_username,customer.c_name,customer.c_phone,customer.c_email
                  FROM customer,customer_shop
                  WHERE customer_shop.C_shopno='$shopid'
                  AND customer.c_username=customer_shop.Cusername";
        $searchKey="";
      }

      ?>

            <form class="search" action="" method="post">
              <input type="text" placeholder="Search by Admin Name" name="search" value="<?php echo $searchKey; ?>">
              <button type="submit">go</button>
            </form><br>

      </div>

    <table class="mtable">

    <?php
      if($get_data = mysqli_query($conn,$sql)){

        if(mysqli_num_rows($get_data) > 0){

          echo '
          <thead>

          <tr>
            <th>Customer Name </th>
            <th>Phone No. </th>
            <th>Email</th>
            <th>Remove Customer</th>
          </tr>

          </thead>';
            while ($row = mysqli_fetch_assoc($get_data)) {

              echo '
                <tbody>
                  <tr>
                      <td>'.$row['c_name'].'</td>
                      <td>'.$row['c_phone'].'</td>
                      <td>'.$row['c_email'].'</td>

                  <td> <a href="delete.php?Cid='.$row['c_username'].'">Delete</a> </td>

                  </tr>
                </tbody>';
            }

          }

          else {
            echo 'No Records Found';
          }
        }
        else {
          echo'no records';
        }
          ?>
      </table>


      <button class="open-button" onclick="openForm()">Add New Customer</button>

      <div class="form-popup" id="myForm">
        <form action="" class="form-container" method="post">
          <h1>Add Customer</h1>
          <?php echo '<p>'.$error.'</p>'; ?>

          <!-- <label for="UsName"><b>Customer Username</b></label> -->
          <input type="text" placeholder="Enter Username" name="UsName" required>


          <button type="submit" class="cbtn">Add</button>
          <button type="button" class="cbtn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>

      <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
      </script>

  <?php include 'footer.php';?>

  </body>
  </html>
