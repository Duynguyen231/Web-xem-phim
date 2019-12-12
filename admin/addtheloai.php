<?php
session_start();
if (!isset($_SESSION["username"])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm Phim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<style>
    body{
        padding-top: 30px;
    }
	.container{
		width: 50%;
		background-color: #D8D8D8;
		
	}

</style>


<div class="container">

    <h2 style="text-align:center"> <font face="Tahoma" size="6"> Thêm Thể Loại </font> </h2>
	
    <form  action="addtheloaidb.php" method="POST" enctype="multipart/form-data" ">
	
		<!-- Ten phim -->
        <div class="form-group">
            <label for="name"> <font face="Garamond" size="5"> Tên thể loại </font> </label>
            <input type="text" class="form-control" placeholder="Nhập tên thể loại" id="tentheloai" name="tentheloai" required>
        </div>
     <button type="submit" class="btn btn-primary btn-md" style="width:100%">Thêm</button>
     <a href="../quanlitheloai.php" style="width:100%">Quay lại</a>
    </form>

    <br>

</div>

</body>
</html>