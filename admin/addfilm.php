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

    <h2 style="text-align:center"> <font face="Tahoma" size="6"> Thêm Phim </font> </h2>
	
    <form  action="addphimdb.php" method="POST" enctype="multipart/form-data" ">
	
		<!-- Ten phim -->
        <div class="form-group">
            <label for="name"> <font face="Garamond" size="5"> Tên phim </font> </label>
            <input type="text" class="form-control" placeholder="Hãy nhập tên phim" id="tenphim" name="tenphim" required>
        </div>
		
		<!-- Mo ta phim -->
		<div class="form-group">
            <label for="description"> <font face="Garamond" size="5"> Thông tin </font> </label>
            <textarea class="form-control" placeholder="Hãy nhập mô tả" id="thongtin" name="thongtin" required></textarea>
        </div>
		
		
		<!-- The loai phim -->
		<div class="form-group">
			<label for="type"> <font face="Garamond" size="5"> Thể loại </font> </label>
			<select class="form-control" id="theloai" name="theloai" required>
			
				<!--Lấy thể loại từ database-->	
				<?php 
					require_once('../conn.php');
					$sql = "SELECT * FROM theloai";
						  
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
						?>
							<option value='<?= $row['id'] ?>'> <?= $row['tentheloai'] ?> </option>;		
						<?php 
						}
					}
				?>
				
			</select>
		</div>
		
		<!-- The loai phim -->
		<div class="form-group">
            <label for="character"> <font face="Garamond" size="5"> Diễn viên </font> </label>
            <input type="text" class="form-control" placeholder="Hãy nhập tên diễn viên" id="dienvien"  name="dienvien" required>
        </div>
		
		<!-- Dao dien -->
		<div class="form-group">
            <label for="director"> <font face="Garamond" size="5"> Đạo diễn </font> </label>
            <input type="text" class="form-control" placeholder="Hãy nhập tên đạo diễn" id="daodien" name="daodien" required>
        </div>
		
		<!-- Thoi luong -->
		<div class="form-group">
            <label for="time"> <font face="Garamond" size="5"> Thời lượng </font> </label>
            <input type="text" class="form-control" placeholder="Hãy nhập thời lượng phim" id="thoiluong" name="thoiluong" required>
        </div>
		
		<!-- Nam san xuat -->
        <div class="form-group">
            <label for="year"> <font face="Garamond" size="5"> Năm sản xuất </font> </label>
            <input type="text" class="form-control" placeholder="Hãy nhập năm sản xuất" id="namsx"  name="namsx" required>
        </div>
		
		<!-- Noi san xuat -->
        <div class="form-group">
            <label for="place"> <font face="Garamond" size="5"> Quốc gia </font> </label>
            <select class="form-control" id="quocgia" name="quocgia" required>
			
				<!--Lấy thể loại từ database-->	
				<?php 
					require_once('../conn.php');
					$sql = "SELECT * FROM quocgia";
						  
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
						?>
							<option value='<?= $row['id_quocgia'] ?>'> <?= $row['tenquocgia'] ?> </option>;		
						<?php 
						}
					}
				?>
				
			</select>
        </div>
		
		<!-- Link film -->
		<div class="form-group">
            <label for="name"> <font face="Garamond" size="5"> Link phim </font> </label>
            <input type="text" class="form-control" id="linkphim" placeholder="Nhập link phim" name="linkphim" required>
        </div>
		
		<div class="form-group">
            <label for="name"> <font face="Garamond" size="5"> Link trailer </font> </label>
            <input type="text" class="form-control" id="linktrailer" placeholder="Nhập link trailer" name="linktrailer" required>
        </div>

		<!-- Anh dai dien -->
		<div class="form-group">
            <label for="fileUpload"> <font face="Garamond" size="5"> Ảnh đại diện </font></label>
            <input type="file" class="form-control" id="fileUpload" name="fileUpload" required></textarea>
        </div>
		
        <button type="submit" class="btn btn-primary btn-md" style="width:100%">Thêm</button>
		<a href="index.php" style="width:100%">Quay lại</a>
    </form>

    <br>

</div>

</body>
</html>