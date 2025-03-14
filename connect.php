<!-- This page provide database for storing the regestration details of users -->
<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','login');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into login(username, password) values(?,?)");
		$stmt->bind_param("ss", $username, $password);
		$execval = $stmt->execute();
		if(isset($_POST["sub"])){
			header("location:index.html?status=success");
		}
		$stmt->close();
		$conn->close();
	}
?>