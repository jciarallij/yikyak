<body ng-controller="mdController">
  
   <div class="container my-nav">
        <nav class="navbar navbar-inverse">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><span class="fa fa-home"></span> Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <?php 
                        if(isset($_SESSION['username'])){
                            print '<li><p class="user-login">Welcome '.$_SESSION['username']. '</p></li>';
                            print '<li><a href="logout.php"><span class="fa fa-user"></span> Log out</a></li>';
                        } else {
                            print '<li><a href="register.php"><p class="lower">Dont have an account? Sign Up!</p></a></li>';
                            print '<li><a href="login.php"><span class="fa fa-user"></span> Login</a></li>';
                        }
                    ?>
                    </ul>
                </div>
          </nav>
        </div>
    </div>