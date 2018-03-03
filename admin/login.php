

<?php
session_start();
require_once ".config/Database.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) && empty($password)) {
        $err_username = "Please enter your username";
        $err_password = "Please enter your password";
    }elseif(empty($username)) {
        $err_username = "Please enter your username";
    }elseif(empty($password)) {
        $err_password = "Please enter your password";
    }else{
        $query = "SELECT * FROM users WHERE username ='$username' AND password='$password'";
        if( $database->num_rows( $query ) > 0 )
        {
            $user= $database->get_results( $query );
            foreach ($user[0] as $key =>$value){
                $_SESSION[$key]=$value;
            }
            header("location:dashboard.php");
        }
        else
        {
            $error="These credentials do not match our records.";
        }

    }

}
?>

<?php
session_start();
require_once "../connect.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) && empty($password)) {
        $err_username = "Please enter your username";
        $err_password = "Please enter your password";
    }elseif(empty($username)) {
        $err_username = "Please enter your username";
    }elseif(empty($password)) {
        $err_password = "Please enter your password";
    }else{
        $query = "SELECT * FROM users WHERE username ='$username' AND password='$password'";
        if( $database->num_rows( $query ) > 0 )
        {
            $user= $database->get_results( $query );
            foreach ($user[0] as $key =>$value){
                $_SESSION[$key]=$value;
            }
            header("location:dashboard.php");
        }
        else
        {
            $error="These credentials do not match our records.";
        }

    }

}
?>



<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
	<div class="container">
		<section id="content">
			<form action="" method="post">
				<h1>Admin Login</h1>
				<div>
					<input type="text" placeholder="Username" required="" name="username"  />
				</div>
				<div>
					<input type="password" placeholder="Password" required="" name="password"/>
				</div>
				<div>
					<input type="submit" name="submit" value="Log in" />
				</div>
			</form><!-- form -->
			<div class="button">
				<a href="#">Welcome</a>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>
</html>
