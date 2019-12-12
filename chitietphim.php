<!DOCTYPE html>
<?php  
	session_start();
?>
<html>
<head>
<title>Web phim online</title>
<meta charset="utf-8">
<link href="css/mystyle.css" rel="stylesheet" type="text/css"/>
<link href="css/movieItems.css" rel="stylesheet" type="text/css"/>
<link href="css/footer.css" rel="stylesheet" type="text/css"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



<script>
				$(document).ready(function(){
					$(".dropdown").hover(            
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
							$(this).toggleClass('open');        
						},
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
							$(this).toggleClass('open');       
						}
					);
				});
			</script>
	

		<style>
			body{
				background-color: #151515;
			}
			.below{
				background-color: #1C1C1C;
			}
			.description{
				background-color: white;
				text-align: ;	
			}
			.fexi_header{
				color: red;
				font-weight: bold;
			}
			.fexi_header_para{
				color: white;
			}
			.font{
				color: #0080FF;
			}
			
		</style>
</head>
<body>
	
	<!--narBar-->
	<div class="topNar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			
			<a class="navbar-brand" href="index.php"><h1>Phim Online</h1></a>
			<img id="logo" style="float: left" src="images/logo.jpg"/>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

		  <div  class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			
			  <li class="nav-item active">
				<a style="padding-left: 300px;" id = "itemNar" class="nav-link" href="index.php">Trang chủ<span class="sr-only">(current)</span></a>
			  </li>
			  
			  <li class="nav-item dropdown">
				<a id = "itemNar" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Thể loại
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				
					<!--Lấy thể loại từ database-->	
					<?php 
						require_once('conn.php');
						$sql = "SELECT * FROM theloai";
							  
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
							?>
								<a class="dropdown-item" href="theloai.php?id=<?php echo $row["id"] ?>"><?= $row['tentheloai'] ?></a>		
								<?php 
							}
						}
					?>
				
				</div>
			  </li>
			  
			  <li class="nav-item dropdown">
				<a id = "itemNar" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Quốc gia
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <!--Lấy thể loại từ database-->	
					<?php 
						require_once('conn.php');
						$sql = "SELECT * FROM quocgia";
							  
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
							?>
								<a class="dropdown-item" href="quocgia.php?id=<?php echo $row["id_quocgia"] ?>"><?= $row['tenquocgia'] ?></a>		
							<?php 
							}
						}
					?>
				</div>
			  </li>  
			</ul>
			
			<form action="listsearch.php" method="get" class="form-inline my-2 my-lg-0">
			  <input name="search" class="form-control mr-sm-2" type="search" placeholder="Nhập tên phim..." aria-label="Search">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm Kiếm</button>
			</form>
		  </div>
		</nav>

	</div>

	<!--End of narBar-->
	
	<div class="below">
			<?php
			   require_once("conn.php");
			   $id = $_GET['id'];
			   
			   $sql = "SELECT phim.id, phim.tenphim, phim.daodien, phim.dienvien, phim.hinh, phim.linkphim, phim.linktrailer, phim.namsx, phim.thoiluong, phim.luotxem ,theloai.tentheloai,quocgia.tenquocgia
												FROM phim 
												INNER JOIN theloai ON phim.theloai = theloai.id
												INNER JOIN quocgia ON phim.quocgia = quocgia.id_quocgia
												WHERE phim.id = $id";
			   
			   $result = $conn->query($sql);
			   $result2 = $conn->query($sql);
			   
			   
			   $row2 = $result2->fetch_assoc();
			   $luotxem = $row2["luotxem"] + 1;
			   
			   $updateluotxem = "UPDATE phim SET luotxem = $luotxem WHERE id = $id";
			   $conn->query($updateluotxem);
			   
				  if($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
					?>	
						<div style="background-color:black">
						<!--film -->
							<div style="float:left">
								<h5 class="side-t-w3l-agile"><span style="color: black; margin-left: 10px"></span></h3>
								<video width="700" height= "394" class="img-responsive" controls style="margin-left: 40px; margin-top: 5px">
								<source src="<?= $row["linkphim"] ?>" type="video/mp4">
							</video>
							</div>

							<div style="float:right; margin-right: 50px" class="col-md-4 latest-news-agile-right-content">	     
						
								<h4 class="side-t-w3l-agile"><span style="color: white">Trailer</span></h3>
										
									<div class="video_agile_player sidebar-player"">
									
									<div class="video-grid-single-page-agileits"> 
												
										<iframe width="500" height="315" src="<?= $row['linktrailer'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									
									</div>									
							</div>	

							<div class="description" style="background-color: #151515; margin-top: 40px">
											
								<p class="fexi_header"><font face="Garamond" size="6"> <?= $row['tenphim'] ?> </font></p>
								<p class="fexi_header_para"><span><font face="Garamond" size="4"> Đạo diễn </font ><label>: </label> </span><font class="font" face="Garamond" size="4"> <?= $row['daodien'] ?> </font></p>
								<p class="fexi_header_para"><span><font face="Garamond" size="4"> Diễn viên </font><label>: </label> </span><font class="font" face="Garamond" size="4"> <?= $row['dienvien'] ?> </font></p>
								<p class="fexi_header_para"><span><font face="Garamond" size="4"> Quốc gia <font><label>: </label> </span><font class="font" face="Garamond" size="4"> <?= $row['tenquocgia'] ?> </font></p>
								<p class="fexi_header_para"><span><font face="Garamond" size="4"> Thời lượng </font><label>: </label> </span><font class="font" face="Garamond" size="4"> <?= $row['thoiluong'] ?> </font></p>
								<p class="fexi_header_para"><span><font face="Garamond" size="4"> Năm sản xuất </font><label>: </label> </span><font class="font" face="Garamond" size="4"> <?= $row['namsx'] ?></font></p>
								<p class="fexi_header_para"><span><font face="Garamond" size="4"> Thể loại </font><label>: </label> </span><font class="font" face="Garamond" size="4"> <?= $row['tentheloai'] ?></font></p>					
							</div>							
						</div>
				<?php
			   }
		   }
		  ?>
		<div>
			<hr class="my-4">
			<h3 style="color: red; float: left" id = "titleofList"><b>Nội dung phim:</b></h3>
		
			<?php
			   require_once("conn.php");
			   $id1 = $_GET['id'];
			   $sql = "SELECT thongtin FROM phim WHERE id = $id1";
			   $result = $conn->query($sql);
				  if($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
					?>
					<p style="padding-left: 30px; width: 50%; float: left; color: white"> <?=  $row["thongtin"] ?> </p>
					<?php
			   }
		   }
		  ?>
		  
		  
		
		</div>
		
	</div>
	

	
	<!--Phim cùng thể loại và Bình luận-->
	<div style="float: left">
		<hr class="my-4">
		<h3 style="color: white;" id = "titleofList">Bình luận:</h3>
		
		<?php
			
			
			if (isset($_SESSION["User_username"])) {
				require_once("conn.php");
				$id1 = $_GET['id'];
				$id2 = $_GET['id2'];
				$username = $_SESSION["User_username"];
				$sql = "SELECT * FROM user_account 
				WHERE username = '$username'";
				$result = $conn->query($sql);
				if($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$id_user = $row["id"];
					}
				}
					?>
					<form method="POST" style="padding-left: 30px" action="addbinhluandb.php" id="usrform">
					<input style=" display: none;" type="text" class="form-control" name="id_user" value="<?php echo $id_user; ?>">
					<input style=" display: none;" type="text" class="form-control" name="id_phim" value="<?php echo $id1; ?>">
					<input style=" display: none;" type="text" class="form-control" name="id_theloai" value="<?php echo $id2; ?>">
					
					<textarea placeholder="Nhập bình luận của bạn..." rows="0" cols="50" name="noidung" form="usrform"></textarea>
					<input type="submit"  value="Gửi">
					</form>
					<br>					
					<?php
					
					
				}else{
					?>
						<div style="padding-left:40px; padding-bottom: 15px">
							<b style="color: red">Bạn phải đăng nhập để bình luận </b>
							<a href="#" data-toggle="modal" data-target="#LoginModal">Đăng nhập ngay</a>
						</div>
					<?php
				}
					
			
		?>
		
		<!--Form đăng nhập cho user-->
	<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h1 style="text-align: center" class="modal-title">Đăng nhập</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				
				<form  action="userLogin.php" method="POST">
				  <div class="form-group">
					<label for="username"><h4>Tên đăng nhập</h4></label>
					
					<input type="username" class="form-control" id="username" name="username">
				  </div>
				  <div class="form-group">
					<label for="password"><h4>Mật khẩu</h4></label>
					<input type="password" class="form-control" id="password" name="password">
				  </div>
				  <button type="submit" class="btn btn-primary">Đăng nhập</button>
				</form>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
			  </div>
			</div>
		  </div>
		</div>
	<!--Kết thúc Form đăng nhập cho user-->
		
		<?php
			   require_once("conn.php");
			   $id1 = $_GET['id'];
			   $sql = "SELECT binhluan.noidung, user_account.username FROM binhluan 
			   INNER JOIN user_account ON binhluan.id_user = user_account.id
			   WHERE id_phim = $id1
			   ORDER BY id_binhluan DESC";
			   $result = $conn->query($sql);
				  if($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
					?>
					<div style="color: white; padding-left: 30px">
						<p style="color: blue;"><img style="max-width: 50px" src="images/user.jpg" /><b> <?= $row["username"] ?>:</b> </p>
						<p style="padding-left: 100px"><?= $row["noidung"] ?></p>
						<hr>
					</div>
			<?php
			   }
		   }
		  ?>
	
		<hr class="my-4">
		<h2 style="color: white" id = "titleofList">Phim cùng thể loại</h2>
		<?php
			   require_once("conn.php");
			    $id1 = $_GET['id'];
			    $id2 = $_GET['id2'];
			   $sql = "SELECT * FROM phim WHERE theloai = $id2 AND id <> $id1 ORDER BY RAND() DESC LIMIT 6";
			   $result = $conn->query($sql);
				  if($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
					?>
					<div class="movie-card">
						<div>
							<image style="height: 350px; width: 100%; border-radius: 8px;" src="a/<?php echo $row["hinh"] ?>"  />
						</div><!--movie-header-->
						<div class="movie-content">
							<div class="movie-content-header">
								<a href="chitietphim.php?id=<?php echo $row["id"] ?> & id2=<?php echo $row["theloai"] ?>">
									<h3 class="movie-title" style="text-align:center"><?=  $row["tenphim"] ?></h3>
								</a>
							</div>
							
							<div class="movie-info">
								<div class="info-section">
									<span>Thời lượng: <b><?= $row["thoiluong"] ?> </b></span>
								</div>
								<div class="info-section">
									<span>Lượt xem: <b><?= $row["luotxem"] ?> </b></span>
								</div><!--date,time-->
								
							</div>
						</div><!--movie-content-->
					</div><!--movie-card-->
			
			<?php
			   }
		   }
		  ?>
		  </div>
	<!--Kết thúc Phim cùng thể loại-->
	
</body>
</html>