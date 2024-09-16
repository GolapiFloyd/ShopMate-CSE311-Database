<?php include 'config.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Transaction Manager </title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">

  </head>

<body class="bodydash" style="color:white;">

      <?php include 'header_after.php' ?>
    <div class="dash">
      <h1> Transaction Manager </h1><br><br>

      <?php
      $shopid=$_SESSION['login_shopID'];
      if(isset($_POST['search']))
      {
        $searchKey=$_POST['search'];
        $sql = "  SELECT transactions.transactionID,transactions.itemID,customer.c_name,transactions.amount_paid,transactions.date_purchased,transactions.quantity
                  FROM transactions, customer
                  WHERE transactions.t_shopID='$shopid'
                  AND transactions.customer_userID=customer.c_userID
                  AND customer.c_name
                  LIKE '%$searchKey%'" ;
      //  SELECT * FROM transactions WHERE transactionID LIKE '%$searchKey%'

      }
      else {

        // $sql = "  SELECT transactions.transactionID,transactions.itemID,customer.c_name,transactions.amount_paid,transactions.date_purchased,transactions.quantity
        //           FROM transactions, customer
        //           WHERE transactions.t_shopID='$shopid'
        //           AND transactions.customer_userID=customer.c_userID
        //           AND customer.c_name" ;
        $sql = "SELECT transactions.transactionID,transactions.itemID,customer.c_name,transactions.amount_paid,transactions.date_purchased,transactions.quantity
          FROM transactions
          INNER JOIN customer
          ON transactions.customer_userID=customer.c_userID
          WHERE transactions.t_shopID='$shopid'" ;
        $searchKey="";
      }

      ?>

            <form class="search" action="" method="post">
              <input type="text" placeholder="Search by Customer Name" name="search" value="<?php echo $searchKey; ?>">
              <button type="submit">go</button>
            </form><br>

      </div>

<table class="content-table">

<?php
      if($get_data = mysqli_query($conn,$sql)){

        if(mysqli_num_rows($get_data) > 0){

          echo '
          <thead>

          <tr>
            <th> Transaction ID </th>
            <th> Item ID </th>
            <th> Customer Name </th>
            <th> Amount Paid(tk.) </th>
            <th> Date Purchased </th>
            <th> Quantity </th>
            <th> Update Record </th>
           <th> Delete Record </th>
          </tr>

          </thead>';
            while ($row = mysqli_fetch_assoc($get_data)) {

              echo '
                <tbody>
                  <tr>
                      <td>'.$row['transactionID'].'</td>
                        <td>'.$row['itemID'].'</td>
                      <td>'.$row['c_name'].'</td>
                      <td>'.$row['amount_paid'].'</td>
                      <td>'.$row['date_purchased'].'</td>
                      <td>'.$row['quantity'].'</td>

                  <td> <a href="edittransaction.php?tranid='.$row['transactionID'].'">Edit</a> </td>
                  <td> <a href="delete.php?tranid='.$row['transactionID'].'">Delete</a> </td>

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
            <input onclick="window.location.href = 'insertTransaction.php';" type="button" value="Add Transaction">
      </div>

      <?php include 'footer.php';?>

      <!-- <input type="submit" name="Add" value="Add Item"> <br>
      <input type="submit" name="Delete" value="Delete Item"> <br>
      <input type="submit" name="Change" value="Change Item"> <br> -->
  </body>
  </html>
