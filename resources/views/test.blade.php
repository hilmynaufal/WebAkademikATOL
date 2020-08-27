<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.html" class="logo">WEB AKADEMIK</a></h1>
	        <ul class="list-unstyled components mb-5">
				<li>
				<a href="siswa"><span class="fa fa-user mr-3"></span> Siswa</a>
				</li>
				<li>
				<a href="jadwal"><span class="fa fa-sticky-note mr-3"></span> Jadwal</a>
				</li>
				<li>
				<a href="guru"><span class="fa fa-sticky-note mr-3"></span> Guru</a>
				</li>
				<li>
				<a href="nilai"><span class="fa fa-paper-plane mr-3"></span> Nilai</a>
				</li>
				<li>
				<a href="pelajaran"><span class="fa fa-paper-plane mr-3"></span> Pelajaran</a>
				</li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
        	@yield('container')
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    @yield('js')
  </body>
</html>