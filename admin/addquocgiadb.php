<?php
	require_once("../conn.php");
	
	$tenquocgia = $_POST["tenquocgia"];
	$sql = "INSERT INTO quocgia (tenquocgia)
			VALUES ('$tenquocgia')";
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../quanliquocgia.php");
	}
?>