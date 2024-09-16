<?php
  include 'config.php';
  session_start();

  $exist = "";

  if (isset($_POST['submit'])) {


    $fullname = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $phone = mysqli_real_escape_string($conn, $_POST['number']);

    $shopname = mysqli_real_escape_string($conn, $_POST['ShopName']);
    $shopAddress = mysqli_real_escape_string($conn, $_POST['ShopAddress']);
    $shopmail = mysqli_real_escape_string($conn, $_POST['ShopMail']);
    $shopphone = mysqli_real_escape_string($conn, $_POST['ShopPhone']);


    $add_shop= "INSERT INTO shops (shop_name,shop_address,shop_email,shop_phone) VALUES ('$shopname','$shopAddress','$shopmail','$shopphone')";
    $result1 = mysqli_query($conn, $add_shop);

    $shopID= $conn->insert_id;

    $sql = "INSERT INTO admin (username,a_name,a_phone,a_email,shopID) VALUES ('$username','$fullname','$phone','$email','$shopID')";
    $add_login = "INSERT INTO a_login (a_username,a_pass,a_shopID) VALUES ('$username', '$pass','$shopID')";

    $result2 = mysqli_query($conn, $sql);
    $result3 = mysqli_query($conn, $add_login);

    // $adminID= $conn->insert_id;

    if ($result2 && $result1 && $result3) {
      $_SESSION['login_user'] = $username;
			$_SESSION['login_shopID']=$shopID;

      echo "<script>
      alert('Account Created Successfully');
      window.location.href = 'Admin_Dashboard.php';
      </script>
      ";
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

    <form class="box" action="" method ="POST">
        <img style="width:150px;height:100px;" src="images/welcome.svg" alt="Signup">
        <h1>Hello Shop Owner! Please fill the details  </h1><br>
       <input style="width:40%; padding: 2px 10px;" type="text" name="username" placeholder="User Name" required >
       <input style="width:50%; padding: 2px 10px;" type="text" name="name"  pattern="\w+\s\w+" title="First and Last Name" placeholder="Full Name" required ><br><br>
       <input style="width:40%; padding: 2px 10px;" type="text" name="number" placeholder="Phone Number" required >
       <input style="width:50%; padding: 2px 10px;" type="email" name="email" placeholder="Email Address" required ><br><br>
       <input style="width:90%; padding: 2px 10px;" type="password" name="pass"  pattern="\w{6,}" title="Atleast 6 characters" placeholder="Enter New Password" required ><br><br>

       <input style="width:90%; padding: 0px 10px;" type="text" name="ShopName" placeholder="Shop Name" required ><br><br>
       <input style="width:90%; padding: 0px 10px;" type="text" name="ShopAddress" placeholder="Shop Address" required ><br><br>
       <input style="width:40%; padding: 0px 10px;" type="email" name="ShopMail" placeholder="Shop Email" required >
       <input style="width:50%; padding: 0px 10px;" type="text" name="ShopPhone" placeholder="Shop Phone Number" required ><br><br>
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
