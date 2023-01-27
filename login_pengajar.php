
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" href="assets/img/LOGO.png">
	<title>LOGIN | ALMAAS</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<!-- Bootstrap core CSS     -->
	<link href="style/css/bootstrap.min.css" rel="stylesheet" />
	<!--  Material Dashboard CSS    -->
	<link href="style/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<!-- <link href="assets/css/demo.css" rel="stylesheet" /> -->
	<!--     Fonts and icons     -->
	<link href="style/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<!-- <link rel="stylesheet" href="assets/css/main.css"> -->
	<link rel="stylesheet" href="style/css/rr.css">

</head>

<body style="padding-top: 5%; background-image: url('style/img/bg.jpg');">

	<div class="form-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
					<div class="form-container">
						<div class="form-icon">
							<!-- <i class="fa fa-user-circle"></i> -->
							<img src="assets/img/kitab3.png" alt="" style="max-width: 80%;"><br><br>
							<p style="font-size: 11pt; color: black; text-shadow: 2px 2px 5px #ff82de;">
								Selamat datang di halaman login. Jika anda tidak mengetahui username dan password anda silahkan menghubungi pihak admin Almaas. <br>
					        </p>
						</div>
						<form class="form-horizontal" method="POST" action="">
							<h3 class="title"><img src="assets/img/LOGO.png" alt="" style="max-width: 90%;">Login Akun</h3>
							<div class="form-group">
								<span class="input-icon"><i class="fa fa-users"></i></span>
								<input class="form-control" type="teks" name="username" placeholder="Username">
							</div>
							<div class="form-group">
								<span class="input-icon"><i class="fa fa-lock"></i></span>
								<input class="form-control" type="password" name="password" placeholder="Password">
							</div>
							<button class="btn signin" type="submit" name="login"><b>Login</b></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<?php
    include "koneksi.php";
    
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = mysqli_query($koneksi, "select * from pengajar where username='$username' ");

        $cek = mysqli_fetch_array($data); 
        if (empty($cek)){
          echo "<SCRIPT> alert('Login gagal. Username Belum Terdaftar');window.location='login_pengajar.php'</SCRIPT>";
        } else {
          if ($password != $cek['password']){
            echo "<SCRIPT> alert('Login gagal. Kata Sandi Salah');window.location='login_pengajar.php'</SCRIPT>";
          } else {
            session_start();
            $_SESSION['id_pengajar'] = $cek['id_pengajar'];
            $_SESSION['username'] = $username;
            echo "<SCRIPT>window.location='homepage_pengajar.php'</SCRIPT>";
          }
        }
      }
    ?>