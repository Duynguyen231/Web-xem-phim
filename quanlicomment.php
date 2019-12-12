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
	a:hover{
        color: deeppink;
        font-weight: bold;
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
		  </div>
		</nav>
	</div>
	<!--End of narBar-->


 <div class="w3_content_agilleinfo_inner">
				<div class="agile_featured_movies">
						<div class="inner-agile-w3l-part-head">
					            <h1 style="text-align:center; font-weight: bold; padding-top: 15px;" >Danh Sách Thể Loại</h1>
						</div>
						<hr>
						<ul  class="nav nav-pills">
						  <li class="nav-item">
							<a class="nav-link " href="admin/addtheloai.php">Thêm thể loại</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link " href="index.php">Trang chủ</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="admin/index.php">Tất cả phim</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="quanlitheloai.php">Thể loại</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="quanliquocgia.php">Quốc gia</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="quanliuser.php">User</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="quanlicomment.php">Bình Luận</a>
						  </li>
						  <li class="nav-item">
							<a  class="nav-link" href="admin/logout.php">Đăng xuất</a>
						  </li>
						  
						</ul>
						
						<hr>
					<div  role="tabpanel" >

						<div>
							<div role="tabpanel" aria-labelledby="home-tab">
							
								<div style="text-align:center" class="agile-news-table">
						<?php      							
								require_once('conn.php');
								$sql = "SELECT * FROM binhluan
								INNER JOIN user_account ON binhluan.id_user = user_account.id
								INNER JOIN phim ON binhluan.id_phim = phim.id";
								$result = $conn->query($sql);
						?>
									<table class="table table-hover" style="text-align:center; margin:auto; ">
										<thead >
										  <tr class="bg-warning">
											<th>ID</th>
											<th>Nội dung</th>
											<th>Phim</th>
											<th>User bình luận</th>
										  </tr>
										</thead>
										<?php      
										
									 
										require_once('conn.php');
										$sql = "SELECT binhluan.id_binhluan, binhluan.noidung, phim.tenphim, user_account.username FROM binhluan
										INNER JOIN user_account ON binhluan.id_user = user_account.id
										INNER JOIN phim ON binhluan.id_phim = phim.id";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
											?>		
											<tbody>
											  <tr>
												<td><?= $row["id_binhluan"] ?></td>
												<td><?= $row["noidung"] ?></td>
												<td><?= $row["tenphim"] ?></td>
												<td><?= $row["username"] ?></td>
											  </tr>
											</tbody>
											<?php }
										}?>
									</table>
								</div>
						
								
							</div>
						</div>
						

					</div>
				</div>
			</div>
			
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