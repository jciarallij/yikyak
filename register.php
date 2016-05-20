<?php
	require_once 'includes/db_connected.php';
	require_once 'includes/head.php';
	require_once 'includes/header.php';
?>


	<div id="register" class="container">


	    <div class="register-wrapper">
        <div class="container col-lg-6 col-lg-offset-3 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="row">
                <h1 class="text-center">Registration                               </h1>
                <p class="lead text-center">Pick a username and password</p>
            </div>
            <div class="row">
                <form id="registration" name="Registration" role="form" action="register_process.php" method="post">
                    <div class="form-group">
                        <label>Username:</label>
                        <input name="username" placeholder="John Doe" type="text" minlength="5" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Password:</label>  <!-- minlength="6" put back after testing! -->
                        <input name="password" placeholder="6 Character Minimum" type="password"  class="form-control" />
                    </div>
                    <div class="form-group">
                        <input name="password2" placeholder="Confirm Password" type="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input name="email" placeholder="yikyak@famyak.com" type="email" class="form-control" />
                        <div class="button-holder text-center">
                            <button type="submit" class="btn btn-register">Register</button>&nbsp;
                            <a href="index.php">
                                <button type="button" class="btn btn-primary btn-cancel">nevermind</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>


<?php require_once 'includes/footer.php'; ?>




