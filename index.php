<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
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

<style>
	#titleofList{
		text-align: left;
		margin-left: 30px;
	}
	
	#login{
		width: 120px;
	}
	#register{
		width: 120px;
		margin-left: 8px;
	}
	#fblogin{
		margin-left: 50px;
	}
</style>

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
	
<STYLE>

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
								<a class="dropdown-item" href="theloai.php?id=<?php echo $row["id"] ?>" ><?= $row['tentheloai'] ?></a>										
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
			<hr>
			
		  </div>
		</nav>
	</div>
	
	
	<!--End of narBar-->
	<hr>
	<?php
			if (!isset($_SESSION["Admin_username"]) && !isset($_SESSION["User_username"])) {
					?>
					
						<div style="padding-left: 20px; font-weight:bold; display: inline; max-width: 100px; margin-left:1160px"" >
							<button type="button" class="btn btn-danger"  id="register" href="#" data-toggle="modal" data-target="#SignupModal">Đăng ký</button>
							<button type="button" class="btn btn-danger"  id="login" href="#" data-toggle="modal" data-target="#LoginModal">Đăng nhập</button>
							<br>
							
							<?php require './fb-init.php'; ?>

							<?php if (isset($_SESSION['access_token'])): ?>
							<a href="logout.php">Logout</a>
							<?php else: ?>
								<a style="margin-left: 1235px" href="<?php echo $login_url; ?>">Login With facebook</a>
							<?php endif; ?>
						</div>
					<?php
			}else{
				if (isset($_SESSION["Admin_username"])) {
					?>
						<div style="padding-left: 30px; font-weight:bold">
							<h4><?php  echo "Xin chào admin: ".$_SESSION["Admin_username"]; ?></h4>
							<a style="margin-left: 20px" href="admin/index.php">Quản lí phim</a>
							<a style="margin-left: 20px" href="admin/logout.php">Đăng xuất</a>
						</div>
					<?php
				}else if (isset($_SESSION["User_username"])) {
					?>
						<div style="padding-left: 30px; font-weight:bold">
							<h4><?php  echo "Xin chào: ".$_SESSION["User_username"]; ?></h4>
							<a href="admin/logout.php">Đăng xuất</a>
						</div>
					<?php
				}
			}
		?>
	<hr>
	<div class="text-center">

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


	<!--Form đăng Ký cho user-->
	<div class="modal fade" id="SignupModal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h1 style="text-align: center" class="modal-title">Đăng ký</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				
				<form  action="userSignup.php" method="POST">
				  <div class="form-group">
					<label for="username"><h4>Tên đăng nhập</h4></label>
					<input type="username" class="form-control" id="username" name="username">
				  </div>
				  <div class="form-group">
					<label for="email"><h4>Email</h4></label>
					<input type="email" class="form-control" id="email" name="email">
				  </div>
				  <div class="form-group">
					<label for="password"><h4>Mật khẩu</h4></label>
					<input type="password" class="form-control" id="password" name="password">
				  </div>
				  <div class="form-group">
					<label for="password"><h4>Xác nhận mật khẩu</h4></label>
					<input type="password" class="form-control" id="password2" name="password2">
				  </div>
				  <button type="submit" name="register" class="btn btn-primary">Đăng ký</button>
				</form>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
			  </div>
			</div>
		  </div>
		</div>
		
		
	<!--Kết thúc Form đăng ký cho user-->

	<!--Carousel-->	

		<div style="width: 97%;  margin:0 auto;" id="demo" class="carousel slide" data-ride="carousel">
		  <ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
			<li data-target="#demo" data-slide-to="3"></li>
		  </ul>
		  
		  
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img src="images/5.jpg" alt="Los Angeles" width="100%" height="500">
			  <div class="carousel-caption">
				<h2><b>Avenger: Infinity War</b></h2>
			  </div>   
			</div>
			<div class="carousel-item">
			  <img src="images/6.jpg" alt="Chicago" width="100%" height="500">
			  <div class="carousel-caption">
				<h2><b>Captain Mavel</b></h2>
			  </div>   
			</div>
			<div class="carousel-item">
			  <img src="images/7.jpg" alt="New York" width="100%" height="500">
			  <div class="carousel-caption">
				<h2><b>How to train your dragon</b></h2>
			  </div>   
			</div>
			
			<div class="carousel-item">
			  <img src="images/aquaman.jpg" alt="Aquaman" width="100%" height="500">
			  <div class="carousel-caption">
				<h2><b>Aquaman</b></h2>
			  </div>   
			</div>
			
			
		  </div>
		  
		  
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		  </a>
		</div>
		

	<!--End of Carousel-->
		
	<!--List Phim Moi-->
		<hr class="my-4">
		<h2 id = "titleofList">Phim mới</h2>
		
			<?php
			   require_once("conn.php");
			   $sql = "SELECT * FROM phim ORDER BY namsx DESC LIMIT 4";
			   $result = $conn->query($sql);
				  if($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
					?>
					<div class="movie-card">
						<div>
							<image style="height: 350px; width: 100%; border-radius: 8px;" src="uploads/<?php echo $row["hinh"] ?>"  />
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
			
			<div id = "xemthem">
				<a href="showallfilm.php">
					<button type="button" class="btn btn-link" >Xem thêm</button>
				</a>
			</div>
	<!--End List Phim Moi-->
	
	<!--List Phim Xem Nhieu Nhat------------------------------------------------------------------------------------------>
		<hr class="my-4">
		<h2 id = "titleofList">Phim xem nhiều</h2>
		<?php
			   require_once("conn.php");
			   $sql = "SELECT * FROM phim ORDER BY luotxem DESC LIMIT 4";
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
			
		<div id = "xemthem">
			<a href="showallfilm.php">
				<button type="button" class="btn btn-link" >Xem thêm</button>
			</a>
		</div>
			
	<!--End Phim xem nhieu-->
	
	<!--Trailer moi------------------------------------------------------------------------------------------>
		<hr class="my-4">
		<h2 id = "titleofList">Ngẫu nhiên</h2>
		
			<?php
			   require_once("conn.php");
			   $sql = "SELECT * FROM phim ORDER BY RAND() LIMIT 4";
			   $result = $conn->query($sql);
				  if($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
					?>
					<div class="movie-card">
						<div>
							<image style="height: 350px; width: 100%; border-radius: 8px;" src="uploads/<?php echo $row["hinh"] ?>"  />
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
			
			<div id = "xemthem">
			<a href="showallfilm.php">
				<button type="button" class="btn btn-link" >Xem thêm</button>
			</a>
			</div>
	<!--End Trailer moi------------------------------------------------------------------------------------------>
	
	<!--footer-->
	<hr class="my-4">
		<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Phim Online</h6>
				<img id="logo" style="float: left" src="images/logo.jpg"/>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Thể Loại</h6>
            <ul class="footer-links">
			
				<?php 
					require_once('conn.php');
					$sql = "SELECT * FROM theloai";
						  
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
						?>	
							<li><a href="#"><?= $row['tentheloai'] ?></a></li>
						<?php 
						}
					}
				?>
			
              
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Liên hệ quảng cáo</h6>
            <ul class="footer-links">
              <li><a href="https://www.facebook.com/uchikinakani">FaceBook : facebook.com/uchikinakani</a></li>
              <li><a href="http://scanfcode.com/contact/">Gmail: nhd20071010@gmail.com</a></li>
              <li>0355891555</li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      
</footer>
	<!--End footer-->
</body>
</html>