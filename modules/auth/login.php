<?php
include 'templates/main.php'
?>

   
<link rel="stylesheet" href="css/login.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="login-form">
    <form action="authenticate.php" method="post">
        <h2 class="text-center">Login</h2>   
        <div class="form-group has-error">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </div>
        <!--<p><a href="#">Lost your Password?</a></p>-->
    </form>
   <!-- <p class="text-center small">Don't have an account? <a href="#">Sign up here!</a></p> -->
    <p class="text-center small">UIA Projects Data Warehouse | &copy; Uganda Investment Authority</p>
</div>