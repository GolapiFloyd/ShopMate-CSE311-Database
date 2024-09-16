<?php
	include 'config.php';

	session_start();
	$error = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$myusername = mysqli_real_escape_string($conn,$_POST['username']);
		$mypassword = mysqli_real_escape_string($conn,$_POST['pass']);

		$sql = "SELECT id FROM login WHERE username = '$myusername' and pass = '$mypassword'";
		$result = mysqli_query($conn,$sql);
		$log = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);


		if($count == 1) {
			$id=$log['id'];
			$_SESSION['login_user'] = $myusername;
			$_SESSION['customer_id'] =$id;
			$_SESSION['shop_id']="";
			header("location: Customer_DashboardMain.php");
		}else {
			$error = "Invalid username or password";
		}
	}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <meta charset="utf-8">
  <title>ShopMate login</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">

</head>

  <body class="fillups">

  <?php include 'header.php';?>

      <form class="box" action="" method ="post">
        <img style="width:150px;height:150px;" src="images/login image.svg" alt="login">
        <h1> Welcome to ShopMate! Login or SignUp to Continue</h1><br>
       <input type="text" name="username" placeholder="User Name" required > <br><br>
       <input type="password" name="pass" placeholder="Password"> <br><br>
       <input type="submit" name="login" value="Log In">
      <!-- <code style="color:white;font-family:'Oswald', sans-serif;font-size: 20px;"> or </code> -->
       <input onclick="window.location.href = 'signup.php';" type="button" value="Sign Up">
			  	<?php echo '<p>'.$error.'</p>'; ?>
   </form>



   <?php include 'footer.php';?>


 </body>
</html>
