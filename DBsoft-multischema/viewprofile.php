<?php
session_start();
$user = $_SESSION['user_name'];
//echo $user;
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,'login');

// Check connection
$fname = "";$lname= "";$reg= "";$gen= "";$dob= "";$email= "";$nan= "";$phone= "";$course= "";$branch= "";$sbh= "";
$nfname = "";$nlname= "";$nreg= "";$ngen= "";$ndob= "";$nemail= "";$nnan= "";$nphone= "";$ncourse= "";$nbranch= "";$nsbh= "";
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
			$fname = $row['user_fname'];
			$lname = $row['user_lname'];
			$reg = $row['user_reg'];
			$email = $row['user_email'];
			$phone = $row['user_phone'];

	}
	else
	{
		echo " error_1";
	}
	$sql = "SELECT * FROM userd where user_name='".$user."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
			$row = $result->fetch_assoc();
			//echo "myphp".$row['user_dob'];
			$dob = $row['user_dob'];
			$gen = $row['user_g'];
			$nan = $row['user_n'];
			$course = $row['user_co'];
			$branch = $row['user_spc'];
			$sbh = $row['user_ba'];


	}
	else
	{
		echo " error_2";
	}



}
if(isset($_POST['updatebtn']))
{
	$nfname = $_POST['nfname'];
	$nlname = $_POST['nlname'];
	$nreg = $_POST['nreg'];
	$ngen = $_POST['ngen'];
	$ndob = $_POST['ndob'];
	$nemail = $_POST['nemail'];
	$nnan = $_POST['nnan'];
	$ncourse = $_POST['ncourse'];
	$nfname = $_POST['nfname'];
	$nbranch = $_POST['nbranch'];
	$nsbh = $_POST['nsbh'];
	$nphone = $_POST['nphone'];


//echo "bbb".$nfname.$nlname.$nreg.$ngen.$ndob.$nemail.$nnan.$nphone.$ncourse.$nbranch.$nsbh;
//echo "<br>"."bbb".$dob."cc";
if($fname !== $nfname)			
	$fname = $nfname;
if($lname !== $nlname)			
	$lname = $nlname;
if($reg !== $nreg)			
	$reg = $nreg;
if($gen !== $ngen)			
	$gen = $ngen;
if($dob !== $ndob)			
	$dob = $ndob;
if($nan !== $nnan)			
	$nan = $nnan;
if($email !== $nemail)			
	$email = $nemail;
if($phone !== $nphone)			
	$phone = $nphone;
if($course !== $ncourse)			
	$course = $ncourse;
if($fname !== $nfname)			
	$fname = $nfname;
if($branch !== $nbranch)			
	$branch = $nbranch;
if($sbh !== $nsbh)			
	$sbh = $nsbh;
$sql = "UPDATE users set user_fname='".$fname."',user_lname='".$lname."',user_phone='".$phone."',user_reg='".$reg."',user_email='".$email ."'". " where user_name='".$user."'";
//echo $sql;
$result = $conn->query($sql);
if($result)
	echo "succ"."<br>";
	$sql = "SELECT * FROM userd where user_name='".$user."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{ 
		$sql = "UPDATE userd set user_dob='".$dob."',user_g='".$gen."',user_n='".$nan."',user_co='".$course."',user_spc='".$branch ."'". " where user_name='".$user."'";
		//echo $sql;
		$rt = $conn->query($sql);
		if($rt)
	echo "succ1"."<br>";
	}
	else
	{$sql = "INSERT INTO userd (user_name, user_dob, user_g, user_n,user_co,user_spc,user_ba)
                            VALUES('" . $user. "', '" . $dob . "', '" . $gen . "', '" . $nan . "', '" . $course . "', '" . $branch . "', '" . $sbh . "');";
    	$rt = $conn->query($sql);
    	//echo $sql;
    	if($result)
			echo "succ2"."<br>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="icon" href="http://localhost/DBNITW/static/img/favicon.png"/>
		<title>Profile page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/todc-bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/offcanvas.css">
</head>
<body>
		<nav class="navbar navbar-masthead navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-heaer">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="http://localhost/DBNITW/"><img style="margin-top:-10px" width='70' src="http://localhost/log/logo.gif" /></a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
											<li class="dropdown"><a href="#" style="padding:0; margin:0px 10px;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<i class="glyphicon glyphicon-user"></i><span class="caret"></span>
						</a>
							<ul class="dropdown-menu">
								<li><a href="http://localhost/log/viewprofile.php"><i class="glyphicon glyphicon-user"></i> Home</a></li>
								<li><a href="index.php?logout"><i class="glyphicon glyphicon-pencil"></i>logout</a></li>
								<li><a href="bulletine.php"><i class="glyphicon glyphicon-pencil"></i>announcements</a></li>
								<li><a href="upload.php"><i class="glyphicon glyphicon-pencil"></i>uploads</a></li>
							</ul>
						</li>
										</ul>
				</div><!-- /.nav-collapse -->
			</div><!-- /.container -->
		</nav>
<div class="container">
<div class="row">
		<div class="col-sm-6 col-sm-offset-2">
				<div style="padding-left:100px">
				<h3 class="text-info">My Profile</h3>
				<form class="form-horizontal">
					<legend>Personal Details</legend>
					<div class='form-group'>
						<div class='col-sm-4'><label class="control-label" for="first_name">First Name</label> </div>
						<div class='col-sm-8'><?php echo $fname; ?> </div>
					</div>
					<div class='form-group'>
						<div class='col-sm-4'><label class="control-label" for="last_name">Last Name</label></div>
						<div class='col-sm-8'><?php echo $lname; ?> </div>
					</div>
					<div class='form-group well'>
						<div class='col-sm-4'><label class="control-label" for="rollno">Roll No. </label></div>
						<div class='col-sm-8'><?php echo $reg; ?> </div>
					</div>
					<div class="form-group">
						<div class='col-sm-4'><label for="gender" class="control-label">Gender</label></div>
						<div class='col-sm-8'><?php echo $gen; ?> </div>
					</div>
					<div class="form-group">
						<div class='col-sm-4'><label for="dob" class="control-label">Date of Birth</label></div>
						<div class='col-sm-8'><?php echo $dob; ?> </div>
					</div>
					<div class="form-group">
						<div class='col-sm-4'><label for="nationality" class="control-label">Nationality</label></div>
						<div class='col-sm-8'><?php echo $nan; ?> </div>
					</div>
					<legend>Contact Details</legend>
					<div class='form-group well'>
						<div class='col-sm-4'><label class="control-label" for="email">Email ID </label></div>
						<div class='col-sm-8'><?php echo $email; ?> </div>
					</div>
					<div class='form-group'>
						<div class='col-sm-4'><label for="phone" class="control-label">Phone </label></div>
						<div class='col-sm-8'><?php echo $phone; ?> </div>
					</div>
					<legend>Course Details</legend>
					<div class="form-group">
						<div class='col-sm-4'><label class="control-label" for="ncourse">Course</label></div>
						<div class='col-sm-8'><?php echo $course; ?> </div>
					</div>
					<div class="form-group">
						<div class='col-sm-4'><label class="control-label" for="branch">Branch</label></div>
						<div class='col-sm-8'><?php echo $branch; ?> </div>
					</div>
					<legend>Bank Details</legend>
					<div class="form-group">
						<div class='col-sm-4'><label for='sbh_acc' class="control-label">SBH A/c No.</label></div>
						<div class='col-sm-8'><?php echo $sbh; ?> </div>
					</div> 
					<div class='form-group'>
						<div class='col-sm-4'><a href="bulletine.php"><button class='btn btn-primary btn-block' type='button'>Announcements</button></a></div>
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
					DBNITW Office, <br>
					Level 1, Center for Innovation & Incubation <br>
					NIT Warangal, Telangana - 506004
				</address>
				Drop us an email on
				<a href="mailto:DBNITW.nitw@gmail.com">  <span class="glyphicon glyphicon-envelope"></span>  DBNITW.nitw@gmail.com</a> 
			</div>
			<div class="col-sm-4">
				<strong>Follow us on Facebook</strong><br><br> Stay in touch with DBNITW, NIT Warangal</br>
				<div class="fb-like" data-href="https://www.facebook.com/DBNITW.nitw" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
				<br><br>
				Read more at  <a href="http://DBNITW.nitw.ac.in" target="_blank">DBNITW.nitw.ac.in <span class="glyphicon glyphicon-new-window"></span></a>
				<br>
				<span class="glyphicon glyphicon-copyright-mark"></span> <a class="tips" title="Web & Software Development Cell, NIT Warangal" target="_blank" href="http://DBNITW.nitw.ac.in/">DBNITW, NIT Warangal </a>
			</div>
		</div>
	</div>
</footer>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/offcanvas.js"></script>
</body>
</html>