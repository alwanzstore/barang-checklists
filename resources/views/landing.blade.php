<!DOCTYPE HTML>
<html>
	<head>
		<title>CHECKLIST BARANG PINDAHAN MAHASISWA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('landing_page/assets/css/main.css') }}" />
		<noscript><link rel="stylesheet" href="{{ asset('landing_page/assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Header -->
			<header id="header">
				<div class="logo">
					<span class="icon fa-gem"></span>
				</div>
				<div>
					<nav>
						<ul>
							<li><a href="{{ route('filament.admin.auth.login') }}">Login</a></li>
							<li><a href="{{ route('filament.admin.auth.register') }}">Register</a></li>
						</ul>
					</nav>
				</div>
				<div class="content">
					<div class="inner">
						<h1>CHECKLIST BARANG PINDAHAN MAHASISWA</h1>
						<p>CHECKLIST BARANG PINDAHAN MAHASISWA YANG RESPONSIF DAN MUDAH DIGUNAKAN UNTUK <br> MENGELOLA BARANG YANG AKAN DI BAWA PINDAHAN OLEH MAHASISWA.</p>
					</div>
				</div>
				<nav>
					<ul>
						<li><a href="#intro">Beranda</a></li>
						<li><a href="#tim">TIM</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
				</nav>
			</header>

			<!-- Main -->
			<div id="main">

				<!-- Intro -->
				<article id="intro">
					<h2 class="major">Beranda</h2>
					<span class="image main"><img src="{{ asset('landing_page/images/kantor.jpg') }}" alt="" /></span>
					<h4>Selamat datang di Checklist Barang Pindahan Mahasiswa.</h4>
					<p style="text-align: justify;">Sistem ini dibuat untuk mempermudah proses pendataan dan pengelolaan barang bawaan saat mahasiswa pindah tempat tinggal atau kos secara digital. Dengan antarmuka yang sederhana dan responsif, sistem ini memungkinkan mahasiswa untuk mencatat barang-barang penting yang dibawa, sehingga meminimalisir risiko barang tertinggal atau hilang saat proses pindahan.</p>
					<p style="text-align: justify;">Selain itu, pihak pengelola asrama atau pihak terkait juga dapat dengan mudah melakukan pengecekan dan validasi barang yang dibawa melalui sistem ini tanpa perlu proses manual yang memakan waktu. Melalui platform ini, proses pindahan menjadi lebih tertib, efisien, dan transparan.</p>
				</article>

				<!-- Tim -->
				<article id="tim">
					<h2 class="major">Tim Pengembang</h2>
					<span class="image main"><img src="{{ asset('landing_page/images/pic03.jpg') }}" alt="" /></span>
					<h4>Dikembangkan oleh mahasiswa.</h4>
					<p>Tim pengembang terdiri dari mahasiswa yang memiliki keahlian di bidang pemrograman web dan manajemen proyek.</p>
				</article>

				<!-- Contact -->
				<article id="contact">
					<h2 class="major">Contact</h2>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" />
							</div>
							<div class="field half">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" />
							</div>
							<div class="field">
								<label for="message">Message</label>
								<textarea name="message" id="message" rows="4"></textarea>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" value="Send Message" class="primary" /></li>
							<li><input type="reset" value="Reset" /></li>
						</ul>
					</form>
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
					</ul>
				</article>
			</div>

			<!-- Footer -->
			<footer id="footer">
				<p class="copyright">&copy; Kelompok 4</p>
			</footer>

		</div>

		<!-- Background -->
		<div id="bg"></div>

		<!-- Scripts -->
		<script src="{{ asset('landing_page/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('landing_page/assets/js/browser.min.js') }}"></script>
		<script src="{{ asset('landing_page/assets/js/breakpoints.min.js') }}"></script>
		<script src="{{ asset('landing_page/assets/js/util.js') }}"></script>
		<script src="{{ asset('landing_page/assets/js/main.js') }}"></script>

	</body>
</html>