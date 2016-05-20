<?php
	require_once 'includes/db_connected.php';
	require_once 'includes/head.php';
	require_once 'includes/header.php';
?>

<div id="login" class="container">


	    <div class="login-wrapper">
	        <div class="container col-lg-6 col-lg-offset-3 col-sm-7 col-sm-offset-3 col-xs-12">
	            <h1 class="text-center">Login</h1>
	            <p class="lead text-center">Please enter your username and password below.</p>
	            <br/>
	            <form role="form" action="login_process.php" method="post">
	                <div class="form-group">
	                    <input type="text" name="username"  placeholder="Enter Your Username" class="form-control" />
	                </div>
	                <div class="form-group">
	                    <input type="password" name="password"  placeholder="Enter Your Password" class="form-control" />
	                </div>
	                <div class="button-holder text-center">
	                    <button type="submit" class="btn btn-login">Login</button>
	                    <a href="index.php">
	                        <button type="button" class="btn btn-primary btn-cancel">Nevermind</button>
	                    </a>
	                </div>
	            </form>
	        </div>
    	</div>


</div>






<?php require_once 'includes/footer.php'; ?>




