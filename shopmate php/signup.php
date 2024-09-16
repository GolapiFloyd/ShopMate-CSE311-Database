<?php
  include 'config.php';

  $exist = "";

  if (isset($_POST['submit'])) {


    $fullname = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $phone = mysqli_real_escape_string($conn, $_POST['number']);


    $add_login = "INSERT INTO login (username, pass) VALUES ('$username', '$pass')";

    $sql = "INSERT INTO customer (c_username,c_name,c_phone,c_email) VALUES ('$username','$fullname','$phone','$email')";

    $result1 = mysqli_query($conn, $add_login);
    $result2 = mysqli_query($conn, $sql);


    $customerID= $conn->insert_id;

    if ($result2 && $result1) {
      $_SESSION['login_user'] = $username;
    	$_SESSION['customer_id'] =$customerID;
      $_SESSION['shop_id']="";

      echo "<script>
      alert('Account Created Successfully');
      window.location.href = 'Customer_DashboardMain.php';
      </script>";
      exit;
    }
    else {
      $exist = "This Username Already Exists";
    }

  }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>ShopMate Signup</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
  </head>

  <body class="fillups">

    <?php include 'header.php' ?>

    <form class="box" target="_blank" action="" method ="POST">
        <img style="width:150px;height:100px;" src="images/signup.svg" alt="Signup">
        <h1> SignUp with ShopMate  </h1><br>
       <input style="width:40%; padding: 2px 10px;" type="text" name="username" placeholder="User Name" required >
       <input style="width:50%; padding: 2px 10px;" type="text" name="name"  pattern="\w+\s\w+" title="First and Last Name" placeholder="Full Name" required ><br><br>
       <input style="width:40%; padding: 2px 10px;" type="text" name="number" placeholder="Phone Number" required >
       <input style="width:50%; padding: 2px 10px;" type="email" name="email" placeholder="Email Address" required ><br><br>
       <input style="width:90%; padding: 2px 10px;" type="password" name="pass"  pattern="\w{6,}" title="Atleast 6 characters" placeholder="Enter New Password" required ><br><br>
  <!-- Gender: <input type="radio" id="male" name="gender" value="male">
       <label for="">Male</label>
       <input type="radio" id="female" name="gender" value="female">
       <label for="customer">Female</label>
       <input type="radio" id="other" name="gender" value="other">
       <label for="customer">Other</label><br><br> -->
       <!-- <select name="Type">
         <option value="AD"> Admin </option>
         <option value="CS"> Customer </option>
       </select> -->


        <!-- UserType: <input type="radio" id="customer" name="usertype" value="customer">
      <label for="customer">Customer</label>
      <input type="radio" id="admin" name="usertype" value="admin">
      <label for="admin">ShopOwner</label><br><br> -->

      <input type="submit" name="submit" value="Continue"> <br>

        <h6><?php echo $exist; ?></h6>
    </form>

  <?php include 'footer.php';?>

  </body>
</html>
