<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$error='';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kidshala</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'assets/';?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/';?>vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/';?>vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/';?>device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'assets/';?>css/new-age.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url(); ?>">Kidshala</a>
      </div>
    </nav>

    <header class="masthead">
      <div class="container h-75">
        <div class="row h-100">
          <div class="col-lg-3 my-auto">
          </div>

          <div class="col-lg-6 my-auto" >
              <div style="border-radius: 10px 50px; border-color: #fff;border:1px solid; padding: 50px">
                <div >
                  <div class="row">
                    <div class="col-lg-6">
                      <a href="#" id="login-form-link" class="active"><h3>Login</h3></a>
                    </div>
                    <div class="col-lg-6">
                      <a href="#" id="register-form-link"><h3>Register</h3></a>
                    </div>
                  </div>
                  <hr>
                </div>
                <div>
                  <div class="row">
                    <div class="col-lg-12">
                      
					  <form id="login-form" action="php/login.php" method="post" role="form" style="display: block;">
                        
						<div class="form-group">
                          <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                        </div>
                        
						<div class="form-group">
                          <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                        </div>
                        
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                              <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                            </div>
                          </div>
                        </div>
					
                     
                      </form>
					  
					  </div>
					</div>
                      <form id="register-form" action="php/register.php" method="post" role="form" style="display: none;">
                        <div class="form-group">
                          <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                        </div>
                        <div class="form-group">
                          <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                              <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div>
          </div>

        </div>
      </div>
    </header>

        <footer>
      <div class="container">
        <p>&copy; 2017 Start Bootstrap. All Rights Reserved.</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#">Privacy</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Terms</a>
          </li>
          <li class="list-inline-item">
            <a href="#">FAQ</a>
          </li>
        </ul>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url().'assets/';?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url().'assets/';?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url().'assets/';?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url().'assets/';?>js/new-age.min.js"></script>
        <script src="<?php echo base_url().'assets/';?>js/loginform.js"></script>

  </body>

</html>
