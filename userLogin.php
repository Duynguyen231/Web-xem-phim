<?php	
		session_start();
		if (isset($_POST["username"]) && isset($_POST["password"])) {
			$username = $_POST["username"];
			$showtohomepage = $_POST["username"];
			$password = $_POST["password"];
			$sql = "SELECT * FROM user_account WHERE username = '$username' AND password = '$password'";
			require_once("conn.php");
			
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$_SESSION["User_username"] = $showtohomepage;
				echo '<script language="javascript">alert("Đăng nhập thành công"); window.location="index.php";</script>';
			} else {
				echo '<script language="javascript">alert("Sai tên đăng nhập hoặc mật khẩu"); window.location="index.php";</script>';
			}
		}
?>