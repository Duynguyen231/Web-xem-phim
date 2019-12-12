<?php
// Start the session
session_start();

if (!isset($_SESSION["Admin_username"])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        padding-top: 50px;
    }
    table{
        text-align: center;
    }
    td{
        padding: 10px;
    }
    tr.item{
        border-top: 1px solid #5e5e5e;
        border-bottom: 1px solid #5e5e5e;
    }

    tr.item:hover{
        background-color: #d9edf7;
    }

    tr.item td{
        min-width: 150px;
    }

    tr.header{
        font-weight: bold;
    }

    a{
        text-decoration: none;
    }
    a:hover{
        color: deeppink;
        font-weight: bold;
    }
	.bg-warning{
		font-weight: bold;
		
	}
</style>

<center><h1><b>QUẢN LÝ PHIM</b></h1></center>
<hr>
<table  cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">
		
		<ul  class="nav nav-pills">
		  <li class="nav-item">
			<a class="nav-link " href="addfilm.php">Thêm phim</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link " href="../index.php">Trang chủ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="index.php">Tất cả phim</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="../quanlitheloai.php">Thể loại</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="../quanliquocgia.php">Quốc gia</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="../quanliuser.php">User</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="quanlicomment.php">Bình Luận</a>
		  </li>
		  <li class="nav-item">
			<a  class="nav-link" href="logout.php">Đăng xuất</a>
		  </li>
		  
		</ul>
		<hr>
    <tr class="bg-warning" >
        <td>Hình</td>
        <td>Tên phim</td>
		<td>Đạo diễn</td>
		<td>Diễn viên</td>
		<td>Thời lượng</td>
		<td>Năm sản xuất</td>
		<td>Mô tả</td>
		<td>Link phim</td>
		<td>Link trailer</td>
		
    </tr>
	<?php 
	require_once('../conn.php');
	$sql = "SELECT * FROM phim";
		  
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
	?>
    <tr class="item">
        <td><img src="<?= $row['hinh'] ?>" style="max-height: 80px"></td>
        <td><?= $row['tenphim'] ?></td>
		<td><?= $row['daodien'] ?></td>
		<td><textarea rows="5" cols="15"><?= $row['dienvien'] ?></textarea></td>
		<td><?= $row['thoiluong'] ?></td>
        <td><?= $row['namsx'] ?></td>
		<td><textarea rows="4" cols="20"><?= $row['thongtin'] ?> </textarea></td>
		<td><textarea rows="2" cols="10"><?= $row['linkphim'] ?> </textarea></td>
		<td><textarea rows="2" cols="10"><?= $row['linktrailer'] ?></textarea></td>
		
        <td> <a href="../admin/deletephim.php?id=<?= $row['id']?>" class="delete" onclick="return confirm('Bạn có muốn xóa?')">Xóa</a></td>
		
    </tr>
	<?php }
	}?>
    <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
        <td colspan="5">
            <p>Tổng phim: <?= $result->num_rows ?></p>
        </td>
    </tr>
</table>
<br>
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  

</body>
</html>