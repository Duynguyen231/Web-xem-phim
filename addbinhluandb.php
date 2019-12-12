<?php
	require_once("conn.php");
	
	$id_user = $_POST["id_user"];
	$id_phim = $_POST["id_phim"];
	$noidung = $_POST["noidung"];
	$id2 = $_POST["id_theloai"];
	
	$sql = "INSERT INTO binhluan (noidung, id_user, id_phim)
			VALUES ('$noidung', $id_user, $id_phim)";
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: chitietphim.php?id=$id_phim& id2=$id2");
	}
?>