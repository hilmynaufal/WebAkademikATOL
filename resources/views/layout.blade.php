<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/" />
  	<title>Web Sekolah Menengah Atas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
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
	  		<h1><a href="/" class="logo">Academic DashBoard</a></h1>
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

    	</nav>

        <!-- Page Content  -->
        @yield('container')
      </div>
      @yield('js')
  </body>
</html>