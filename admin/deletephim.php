<?php
	require_once('../conn.php');
	$id = $_GET['id'];
	$sql = "DELETE FROM phim WHERE id=$id";
 
		mysqli_query($conn, $sql);
		mysqli_close($conn);
		header("Location: ../admin/index.php");
?>