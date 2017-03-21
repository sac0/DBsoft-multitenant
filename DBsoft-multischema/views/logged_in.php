<?php
$user = $_SESSION['user_name'];
$org_name = $_SESSION['org_name'];
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password,'login2');

// Check connection
$id = "";

if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['bbtn']))
{
$ann = $_POST['ann'];
$conn = new mysqli($servername, $username, $password,'login2');
$sql = "INSERT INTO announce".$org_name." (org,user,ann)
                            VALUES('".$org_name." ' ,'" . $user . "', '" . $ann . "');";
echo $sql;
$result = $conn->query($sql);
}

	
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body class='container'>
	<nav class="navbar navbar-masthead navbar-default navbar-fixed-top">
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
								<li><a href="bulletine.php"><i class="glyphicon glyphicon-pencil"></i>Announcements</a></li>
							</ul>
						</li>
										</ul>
				</div><!-- /.nav-collapse -->
			</div><!-- /.container -->
		</nav>
	<div class="jumbotron">
		<h3 class='text-center text-info'>Organization - <?php echo $org_name?></h3>
	</div>
<div class='col-md-6'>
	<form enctype='multipart/form-data' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>' method='post'>
		<div class='form-group'>
			<label class='control-label'>Enter Announcements</label>
			<textarea class='form-control' name='ann'></textarea>
		</div>
		<div class='form-group'>
			<button name='bbtn' class='btn btn-success' type='submit'>Post</button>
		</div>
	</form>
	<h2 style='margin-bottom:40px; border-bottom:2px solid gray;'>Posts</h2>
	<?php 
		$conn = new mysqli("localhost", "root", "", "login2");
		$sql = "SELECT * FROM announce".$org_name." ORDER BY anntime DESC";
		//echo $sql;
		$res = $conn->query($sql);
		if($res->num_rows > 0) {
			echo "<ol>";
			foreach($res as $row) {
				echo "<li>"."<strong>".$row['user']."</strong>"."&nbsp;&nbsp;&nbsp;&nbsp". $row['anntime']."&nbsp;&nbsp;&nbsp;&nbsp".$row['ann']."</li>";
			}
			echo "</ol>";
		}
		
	?>
</div>
	<script type="text/javascript" src='js/jquery.min.js'></script>
	<script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>
</html>