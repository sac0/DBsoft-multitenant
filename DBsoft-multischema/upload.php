<?php
	$toname = "none";
	session_start();
	if(isset($_SESSION['user_name'])) {
				$user = $_SESSION['user_name'];}
	if(isset($_POST['uploadBtn'])) {
		$toname = $_POST['nfname'];
		define ('SITE_ROOT', realpath(dirname(__FILE__)));
		$name = $_FILES['document']['name'];
		//$filename = $target.$name;
		echo $name." ".SITE_ROOT;
		if(move_uploaded_file($_FILES['document']['tmp_name'], SITE_ROOT."\\uploads\\".$name)){
			
			$conn = new mysqli("localhost", "root", "", "login");
			
			$user="anyone";
			if(isset($_SESSION['user_name'])) {
				$user = $_SESSION['user_name'];
			}
			$sql = "INSERT into uploads(uploader, fname,to_user) values('".$user."','".$name."','".$toname."')";
			if($conn->query($sql)) {
				//echo $sql;
				echo 'Successfully Uploaded !';
			} else {
				unlink(SITE_ROOT."\\uploads\\".$name);
			}
			//echo "Successfully uploaded";
		} else {
			echo 'Error in uploading file';
		}
	}
?>
<html>
<head>
	<title>Upload Files</title>
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
								<li><a href="bulletine.php"><i class="glyphicon glyphicon-pencil"></i>announcements</a></li>
								<li><a href="upload.php"><i class="glyphicon glyphicon-pencil"></i>uploads</a></li>
							</ul>
						</li>
										</ul>
				</div><!-- /.nav-collapse -->
			</div><!-- /.container -->
		</nav>
	<div class="jumbotron">
		<h3 class='text-center text-info'>Assignment and Solutions</h3>
	</div>

<div class='col-md-6'>
	<form enctype='multipart/form-data' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>' method='post'>
		<div class='form-group'>
			<label class='control-label' ><input type='file' name='document'/> Upload File</label>
		</div>
		<div class='form-group'>
			<label class="control-label" for="first_name">Send to</label>
			<input type="text" name="nfname" class="form-control">
			<!-- <div class='col-sm-8'><?php echo $first_name; ?> </div>-->
		</div>
		<div class='form-group'>
			<button name='uploadBtn' class='btn btn-success' type='submit'>Upload</button>
		</div>
	</form>
</div>
<div class='col-md-6'>
	<h2 class='text-info'>Submitted to me</h2>
	<?php 
		$conn = new mysqli("localhost", "root", "", "login");
		$sql = "SELECT * FROM uploads where to_user = '".$user."'ORDER BY upload_date DESC";
		$res = $conn->query($sql);
		if($res->num_rows > 0) {
			echo "<ol>";
			foreach($res as $row) {
				echo "<li>".$row['uploader']."		"."<a href='uploads/".$row['fname']."'>"."	".$row['fname']."</a>"."		". "on ".$row['upload_date']."</li>";
			}
			echo "</ol>";
		}
		echo "<h2 class='text-primary'>General</h2>";
		$sql = "SELECT * FROM uploads where to_user = '"."all"."'ORDER BY upload_date DESC";
		$res = $conn->query($sql);
		if($res->num_rows > 0) {
			echo "<ol>";
			foreach($res as $row) {
				echo "<li>".$row['uploader']."		"."<a href='uploads/".$row['fname']."'>"."	".$row['fname']."</a>"."		". "on ".$row['upload_date']."</li>";
			}
			echo "</ol>";
		}
		echo "<h2 class='text-primary'>Uploaded to me</h2>";
		$sql = "SELECT * FROM uploads where uploader = '".$user."'ORDER BY upload_date DESC";
		$res = $conn->query($sql);
		if($res->num_rows > 0) {
			echo "<ol>";
			foreach($res as $row) {
				echo "<li>".$row['uploader']." "."<a href='uploads/".$row['fname']."'>".$row['fname']."</a>"." on ". $row['upload_date']." to ".$row['to_user']."</li>";
			}
			echo "</ol>";
		}
	?>
</div>
	<script type="text/javascript" src='js/jquery.min.js'></script>
	<script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>
</html>