<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>ChatBOX Login</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/chatbox.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!-- All the files that are required -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
</head>
<body>

<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="text-center">
   <!-- Main Form -->
   <div class="login-form-1">
      <div class="logo">login</div>
      <form id="login-form" class="text-left">
         <div class="login-form-main-message"></div>
         <div class="main-login-form">
            <div class="login-group">
               <div class="form-group">
                  <label for="username" class="sr-only">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="username">
               </div>
               <div class="form-group">
                  <label for="password" class="sr-only">Password</label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="password">
               </div>
               <div class="form-group login-group-checkbox">
                  <input type="checkbox" id="remember" name="remember">
                  <label for="remember">remember</label>
               </div>
            </div>
            <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
         </div>
         <div class="etc-login-form">
            <!--<p>forgot your password? <a href="#">click here</a></p>-->

            <p>new user? <a href="registration.php">create new account</a></p>
         </div>
      </form>
   </div>
   <!-- end:Main Form -->
</div>

</body>
</html>

<?php

 include("config.php");
 session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET['username']) and isset($_GET['password'])) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_GET['username']);
      $mypassword = mysqli_real_escape_string($db,$_GET['password']); 
      
      $sql = "SELECT username,password FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      if (!$result) {
      printf("Error: %s\n", mysqli_error($db));

      exit();
    }
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: groups.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         
      }
   } 
?>