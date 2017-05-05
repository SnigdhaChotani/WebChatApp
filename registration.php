<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>ChatBOX Register</title>
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
<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
    <!-- Main Form -->
    <div class="login-form-1">
    <div class="logo">register</div>    
        <form id="register-form" class="text-left">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="reg_username" class="sr-only">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="reg_password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
                        <input type="password" class="form-control" id="reg_password_confirm" name="password_confirm" placeholder="confirm password">
                    </div>
                    
                    <div class="form-group">
                        <label for="reg_fullname" class="sr-only">Full Name</label>
                        <input type="text" class="form-control" id="reg_fullname" name="fullname" placeholder="full name">
                    </div>
                
                    <div class="form-group login-group-checkbox">
                        <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                        <label for="reg_agree">i agree with <a href="#">terms</a></label>
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <p>already have an account? <a href="login.php">login here</a></p>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>

</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_REQUEST['username']) and isset($_REQUEST['password']))
{
	$user = mysqli_real_escape_string($db, $_REQUEST['username']);
	$pword = mysqli_real_escape_string($db, $_REQUEST['password']);

	$query = "INSERT INTO login (username,password) VALUES ('$user', '$pword')";
	if(mysqli_query($db, $query))
	{
	echo "Records added successfully.";
	} 
    else
    {
        echo mysqli_error($db);
    }

	mysqli_close($db);
}
?>
