
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  	<link rel="icon" href="http://localhost/wsdc/static/img/favicon.png"/>
  	<title>WSDC | New User Registration</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/todc-bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/offcanvas.css">
</head>
<body><nav class="navbar navbar-masthead navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost/wsdc/"><img style="margin-top:-10px" width='70' src="http://localhost/log/logo.gif" /></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown"><a href="#" style="padding:0; margin:0px 10px;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="glyphicon glyphicon-user"></i><span class="caret"></span>
            </a>
              <ul class="dropdown-menu">
                <li><a href="http://localhost/wsdc/auth/login"><i class="glyphicon glyphicon-user"></i> Login</a></li>
                <li><a href="http://localhost/wsdc/auth/create_user"><i class="glyphicon glyphicon-pencil"></i> Sign Up</a></li>
              </ul>
            </li>
                    </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar --><!-- Main content -->
<div class="container">
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <h3 class="text-info text-center" style="padding-bottom:15px; border-bottom: 1px solid #aaa;">Sign Up WSDC <br><small class="text-left">Please Enter the information given below.</small> </h3>
      <div id="infoMessage"></div>  
      <form class="form-horizontal" action="register.php" method="post">
        <div class="form-group">
          <div class="col-sm-6">
            <label class="control-label" for="first_name"> First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="First Name" />
          </div>
          <div class="col-sm-6">
            <label class="control-label" for="last_name"> Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6">
            <label class="control-label" for="username">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" />
          </div>
          <div class="col-sm-6">
            <label class="control-label" for="regno">Registration No.</label>
            <input type="text" name="regno" class="form-control" placeholder="Reg. No." />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <label class="control-label" for="email">Email <i class="glyphicon glyphicon-envelope"></i></label>
            <input type="email" name="email" class="form-control" placeholder="Email ID" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <label class="control-label" for="phone">Phone <i class="glyphicon glyphicon-phone"></i></label>
            <input type="tel" name="phone" class="form-control" placeholder="Phone No." />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <label class="control-label" for="pass">Password <i class="glyphicon glyphicon-lock"></i></label>
            <input type="password" name="password" class="form-control" placeholder="Password" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <label class="control-label" for="password_confirm">Password Confirmation <i class="glyphicon glyphicon-lock"></i></label>
            <input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6">
            <button class="btn btn-success btn-block" type="submit"> Sign Up</button>
          </div>
          <div class="col-sm-6">
            <button class="btn btn-warning btn-block" type="reset"> Reset</button>
          </div>
        </div>
      </form>
    </div>
</div>
</div>
<footer class="well hidden-print" style="margin-bottom:0px;">
  <div class="container">
		<div class="row">
		  <div class="col-sm-4">
		    <strong>Quick Links</strong><br><br>
		    <ul type="square" style="margin-left:-1.5em">
			    <li><a href="#" target="_blank">College main website </a></li>
			    <li><a href="#" target="_blank">Fee structure 2014-15 </a></li>
			    <li><a href="#" target="_blank">Student Webmail</a></li>
			    <li><a href="#" target="_blank">Department Websites</a></li>
			    <li><a href="#" target="_blank">Rules and regulations</a></li>
		    </ul>
		  </div>
		  <div class="col-sm-4">
		    <strong>About Us</strong><br><br>
		    <address>
			    WSDC Office, <br>
			    Level 1, Center for Innovation & Incubation <br>
			    NIT Warangal, Telangana - 506004
		    </address>
		    Drop us an email on
		    <a href="mailto:wsdc.nitw@gmail.com">  <span class="glyphicon glyphicon-envelope"></span>  wsdc.nitw@gmail.com</a> 
		  </div>
		  <div class="col-sm-4">
		    <strong>Follow us on Facebook</strong><br><br> Stay in touch with WSDC, NIT Warangal</br>
		    <div class="fb-like" data-href="https://www.facebook.com/wsdc.nitw" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
		    <br><br>
		    Read more at  <a href="http://wsdc.nitw.ac.in" target="_blank">wsdc.nitw.ac.in <span class="glyphicon glyphicon-new-window"></span></a>
		    <br>
		    <span class="glyphicon glyphicon-copyright-mark"></span> <a class="tips" title="Web & Software Development Cell, NIT Warangal" target="_blank" href="http://wsdc.nitw.ac.in/">WSDC, NIT Warangal </a>
		  </div>
	  </div>
  </div>
</footer>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/offcanvas.js"></script>
</body>
</html>