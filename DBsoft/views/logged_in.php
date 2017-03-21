<?php
$user = $_SESSION['user_name'];
//echo $user;
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,'login');

// Check connection
$id = "";
$org_name = "";

if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 

else
{
	$sql = "SELECT * FROM users where user_name='".$user."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
			$row = $result->fetch_assoc();
			//echo $row['user_name'];
			$id = $row['user_id'];
			$org_name = $row['org_name'];
			$reg = $row['user_reg'];
			$email = $row['user_email'];
			$phone = $row['user_phone'];
			//echo $org_name.$id.$reg.$email.$phone;

	}
	else
	{
		echo " error_1";
	}



}
if(isset($_POST['updatebtn']))
{
	$field = $_POST['field'];
	$value = $_POST['fvalue'];

	$sql = "INSERT INTO detail (id,org_name,field,value)
                            VALUES('" . $id. "', '" . $org_name . "', '" .$field. "', '" . $value. "');";;
//echo $sql;
$result = $conn->query($sql);
if($result)
	echo "succ"."<br>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="icon" href="http://localhost/DBsoft/static/img/favicon.png"/>
		<title>UPdate </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/todc-bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/offcanvas.css">
</head>
<body>		<nav class="navbar navbar-masthead navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-heaer">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="http://localhost/DBsoft/"><img style="margin-top:-10px" width='70' src="http://localhost/log/logo.gif" /></a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
											<li class="dropdown"><a href="#" style="padding:0; margin:0px 10px;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<i class="glyphicon glyphicon-user"></i><span class="caret"></span>
						</a>
							<ul class="dropdown-menu">
								<li><a href="http://localhost/log/viewprofile.php"><i class="glyphicon glyphicon-user"></i> Home</a></li>
								<li><a href="index.php?logout"><i class="glyphicon glyphicon-pencil"></i>logout</a></li>
								<li><a href="bulletine.php"><i class="glyphicon glyphicon-pencil"></i>See Fields</a></li>
							</ul>
						</li>
										</ul>
				</div><!-- /.nav-collapse -->
			</div><!-- /.container -->
		</nav><!-- /.navbar --><!-- Main content -->
<div class="container">
<div class="row">
		<div class="col-sm-6 col-sm-offset-2">
				<div style="padding-left:100px">
				<h3 class="text-info">My Profile</h3>
				<form class="form-horizontal"  method='post'>
					<legend>Personal Details</legend>
					<div class='form-group'>
						<div class='col-sm-4'><label class="control-label" for="first_name">Field Name</label> </div>
						<div class='col-sm-8'><input type="text" name="field" class="form-control"></div>
						<!-- <div class='col-sm-8'><?php echo $first_name; ?> </div>-->
					</div>
					<div class='form-group'>
						<div class='col-sm-4'><label class="control-label" for="last_name">Field Value</label></div>
						<div class='col-sm-8'><input type="text" name="fvalue" class="form-control"></div>
					</div>
					<div class='form-group'>
						<div class='col-sm-6'><button class='btn btn-success' name='updatebtn' type='submit'>Update</button></div>
					</div>
				</form>
				</div>
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
					DBsoft Office, <br>
					Level 1, Center for Innovation & Incubation <br>
					NIT Warangal, Telangana - 506004
				</address>
				Drop us an email on
				<a href="mailto:DBsoft.nitw@gmail.com">  <span class="glyphicon glyphicon-envelope"></span>  DBsoft.nitw@gmail.com</a> 
			</div>
			<div class="col-sm-4">
				<strong>Follow us on Facebook</strong><br><br> Stay in touch with DBsoft, NIT Warangal</br>
				<div class="fb-like" data-href="https://www.facebook.com/DBsoft.nitw" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
				<br><br>
				Read more at  <a href="http://DBsoft.nitw.ac.in" target="_blank">DBsoft.nitw.ac.in <span class="glyphicon glyphicon-new-window"></span></a>
				<br>
				<span class="glyphicon glyphicon-copyright-mark"></span> <a class="tips" title="Web & Software Development Cell, NIT Warangal" target="_blank" href="http://DBsoft.nitw.ac.in/">DBsoft, NIT Warangal </a>
			</div>
		</div>
	</div>
</footer>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/offcanvas.js"></script>
</body>
</html>