<?php
	session_start();
	
	header('Content-Type: text/html; charset=utf-8');
	
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'webphim';
	
	$conn = new mysqli($servername, $username, $password, $db);
	mysqli_set_charset($conn, 'UTF8');
	
	if (isset($_POST["register"])) {
		
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password2 = $_POST["password2"];
		
		$sql = "SELECT * FROM user_account WHERE username = '$username' OR username = '$email'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			echo '<script language="javascript">alert("Tên hoặc E-mail đăng ký bị trùng"); window.location="index.php";</script>';
			die ();
		}
		else if ($password != $password2) {
			echo '<script language="javascript">alert("Xác nhận mật khẩu không khớp"); window.location="index.php";</script>';
			die ();
		}
		else{
			$sql = "INSERT INTO user_account (username, password, email)
			VALUES ('$username', '$password', '$email')";
			if ($conn->query($sql) === FALSE) {
				die("Error: " . $sql . $conn->error);
			} else {
				$row = $result->fetch_assoc();
				echo '<script language="javascript">alert("Đăng ký thành công"); window.location="index.php";</script>';
			}
			
		}
	}

?>