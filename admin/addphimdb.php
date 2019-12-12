<?php
	require_once("../conn.php");
	
	$tenphim = $_POST["tenphim"];
	$thongtin = $_POST["thongtin"];
	$theloai = $_POST["theloai"];
	$dienvien = $_POST["dienvien"];
	$daodien = $_POST["daodien"];
	$thoiluong = $_POST["thoiluong"];
	$namsx = $_POST["namsx"];
	$quocgia = $_POST["quocgia"];
	$linkphim = $_POST["linkphim"];
	$linktrailer = $_POST["linktrailer"];
	$dienvien = $_POST["dienvien"];
	
	
	$target_dir = "../admin/uploads/images/";
	$file_name = basename($_FILES["fileUpload"]["name"]);
	$target_file = $target_dir . $file_name;
	
	if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }
	
	$sql = "INSERT INTO phim (tenphim, hinh, daodien, thongtin, theloai, namsx, quocgia, thoiluong, linkphim, linktrailer, dienvien, luotxem)
			VALUES ('$tenphim', '$target_file', '$daodien', '$thongtin', $theloai, $namsx, $quocgia, '$thoiluong', '$linkphim', '$linktrailer', '$dienvien', 0)";
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: index.php");
	}
?>