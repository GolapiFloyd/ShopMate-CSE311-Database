<?php
  include 'config.php';
  session_start();

  $exist = "";

  if (isset($_POST['submit'])) {

	  $shopID=$_SESSION['login_shopID'];
    $fullname = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $phone = mysqli_real_escape_string($conn, $_POST['number']);


    $sql = "INSERT INTO admin (username,a_name,a_phone,a_email,shopID) VALUES ('$username','$fullname','$phone','$email','$shopID')";
    $add_login = "INSERT INTO a_login (a_username,a_pass,a_shopID) VALUES ('$username', '$pass','$shopID')";

    $result2 = mysqli_query($conn, $sql);
    $result3 = mysqli_query($conn, $add_login);


    if ($result2 && $result3) {


      echo "<script>
      alert('Account Created Successfully');
      window.location.href = 'Admin_AdminManager.php';
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
        <h1>Hello Shop Owner! Add your new Admin  </h1><br>
       <input style="width:40%; padding: 2px 10px;" type="text" name="username" placeholder="User Name" required >
       <input style="width:50%; padding: 2px 10px;" type="text" name="name"  pattern="\w+\s\w+" title="First and Last Name" placeholder="Full Name" required ><br><br>
       <input style="width:40%; padding: 2px 10px;" type="text" name="number" placeholder="Phone Number" required >
       <input style="width:50%; padding: 2px 10px;" type="email" name="email" placeholder="Email Address" required ><br><br>
       <input style="width:90%; padding: 2px 10px;" type="password" name="pass"  pattern="\w{6,}" title="Atleast 6 characters" placeholder="Enter New Password" required ><br><br>


      <input type="submit" name="submit" value="Continue"> <br>

        <h6><?php echo $exist; ?></h6>
    </form>

  <?php include 'footer.php';?>

  </body>
</html>
