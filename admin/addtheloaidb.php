<?php
	require_once("../conn.php");
	
	$tentheloai = $_POST["tentheloai"];
	$sql = "INSERT INTO theloai (tentheloai)
			VALUES ('$tentheloai')";
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../quanlitheloai.php");
	}
?>