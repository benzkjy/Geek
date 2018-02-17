<?php
require_once ('connect.php');
session_start();
?>
<html>
	<head>
		<title>Hospital Collaboration Resource</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="altindex">
				<div class="logo"><a href="index.php">Hospital Collaboration Resource <i class="fas fa-hospital"></i></a></div>
				<a href="#menu" class="toggle"><span>Menu</span></a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="">Logout</a></li>
				</ul>
			</nav>

		<section id="banner">
			<div class="inner">
				<h1>Search Patient</h1><br>
				<p>The easiest way to match patients with the same diagnosis.</a></p>
				<form method="post" action="patientInfo.php" class="alt">
					<div class="row uniform">
						<div class="9u 12u$(small)">
							<input type="text" name="PID" id="PID" value="" placeholder="Patient ID" />
						</div>
						<div class="3u$ 12u$(small)">
							<input type="submit" value="Search" class="fit" />
						</div>
					</div>
				</form>
			</div>
		</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>