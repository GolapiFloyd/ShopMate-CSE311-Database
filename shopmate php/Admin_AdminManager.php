<?php require 'config.php' ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Admin Manager </title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">

  </head>
  <body class="bodydash" style="color:white;">

    <?php include 'header_after.php' ?>

<div class="dash">
      <h1>Your Store Admins </h1><br><br>


      <?php
      $shopid=$_SESSION['login_shopID'];
      if(isset($_POST['search']))
      {
        $searchKey=$_POST['search'];
        $sql = "  SELECT admin.userID,admin.a_name,admin.a_phone,admin.a_email
                  FROM admin
                  WHERE admin.shopID='$shopid'
                  AND admin.a_name
                  LIKE '%$searchKey%'" ;

      }
      else {
        $sql = "SELECT admin.userID,admin.a_name,admin.a_phone,admin.a_email
                FROM admin
                WHERE admin.shopID='$shopid'";
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
            <th>Admin Name </th>
            <th>Phone No. </th>
            <th>Email</th>
            <th>Edit info</th>
            <th>Delete info</th>
          </tr>

          </thead>';
            while ($row = mysqli_fetch_assoc($get_data)) {

              echo '
                <tbody>
                  <tr>
                      <td>'.$row['a_name'].'</td>
                      <td>'.$row['a_phone'].'</td>
                      <td>'.$row['a_email'].'</td>

                  <td> <a href="edit.php?Aid='.$row['userID'].'">Edit</a> </td>
                  <td> <a href="delete.php?Aid='.$row['userID'].'">Delete</a> </td>

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

      <div class=editinfo>
            <input onclick="window.location.href = 'Admin_AddNewAdmin.php';" type="button" value="Add New Admin">
      </div>

      <?php include 'footer.php';?>

  </body>
  </html>
