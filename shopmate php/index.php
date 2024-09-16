

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
  <div class=container style="text-align:center;">
 <div style="color:white;text-align:center;font-size:15px;margin-top:150px;margin-bottom:50px"><h1>Login or Register as Admin </h1></div>
 <button class="btn btn1" onclick="window.location.href = 'a_login.php';"> Admin Login </button>
<button class="btn btn1" onclick="window.location.href = 'AdminSignup.php';"> Admin Signup </button>

 <div style="color:white;text-align:center;font-size:15px;margin-top:100px;margin-bottom:50px"><h1>Login or Register as Customer </h1></div>
<button class="btn btn1" onclick="window.location.href='login.php';"> Customer Login </button>
<button class="btn btn1" onclick="window.location.href = 'signup.php';"> Customer Signup </button>
</div>

<div style="color:white;text-align:center;font-size:15px;margin-top:200px;margin-bottom:10px;"><h1>What people think of us:</h1></div>
   <div id="slider">
      <input type="radio" name="slider" id="slide1" checked>
      <input type="radio" name="slider" id="slide2">
      <input type="radio" name="slider" id="slide3">
      <input type="radio" name="slider" id="slide4">
      <div id="slides">
         <div id="overflow">
            <div class="inner">
               <div class="slide slide_1">
                  <div class="slide-content">
                     <h2>"The friendly saviour of local shopowners."<br>-Bloomberg</h2>
                  </div>
               </div>
               <div class="slide slide_2">
                  <div class="slide-content">
                     <h2>"ShopMate is helping the community evolve."<br>-Windows Central</h2>

                  </div>
               </div>
               <div class="slide slide_3">
                  <div class="slide-content">
                     <h2>"Digitalizing small businesses one step at a time."<br>-Wired</h2>
                  </div>
               </div>
               <div class="slide slide_4">
                  <div class="slide-content">
                     <h2>"I love ShopMate"<br>-Your local shopowner</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div id="bullets">
         <label for="slide1"></label>
         <label for="slide2"></label>
         <label for="slide3"></label>
         <label for="slide4"></label>
      </div>
   </div>

   <div style="color:#6E0DD0;text-align:center;font-size:30px;margin-top:150px;margin-bottom:10px"><h1>Join The Family</h1></div>
  <div style="color:#6E0DD0;text-align:center;font-size:30px;margin-top:10px;margin-bottom:150px"><h1>Go Digital With Your Records</h1></div>



   <?php include 'footer.php';?>


 </body>
</html>
