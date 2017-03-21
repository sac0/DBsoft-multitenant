<?php
require_once("classes/Login.php");

echo $user;
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
//$fname = "";$lname= "";$reg= "";$gen= "";$dob= "";$email= "";$nan= "";$phone= "";$course= "";$branch= "";$sec= "";$sbh= "";
$nfname = "";$nlname= "";$nreg= "";$ngen= "";$ndob= "";$nemail= "";$nnan= "";$nphone= "";$ncourse= "";$nbranch= "";$nsec= "";$nsbh= "";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else
{
	$sql = "SELECT * FROM users where user_name=$user";
	$result = mysqli_query($conn, $sql);
	if(!$result)
	{
		echo "error in ret";
	}
	else
	{
		if (mysqli_num_rows($result) > 0) 
		{
			$row = mysqli_fetch_assoc($result);

	   	}

	}
}
echo $nfname.$nlname.$nreg.$ngen.$ndob.$nemail.$nnan.$nphone.$ncourse.$nbranch.$nsec.$nsbh;
?>
