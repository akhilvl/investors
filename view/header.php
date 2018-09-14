<html>
	<head>
		<title>
			Investors
		</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>		
		
		<style>
	  .loading-image {
			display: none;
			position: absolute;
			z-index: 100000 !important;
			width: 100%;
			height:100%;
		}

		.loading-image img {
			position: relative;
			top:30%;
			left:50%;
		}
		</style>
		
	</head>
	
	<body>
		
		<div class='loading-image sticky' ><img src='img/lg.discuss-ellipsis-preloader.gif' /></div>
		
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="#">Investors</a>
				</div>
				<ul class="nav navbar-nav">
				  <li><a href="index.php">Dashboard</a></li>
				  <li><a href="company.php">Company</a></li>
				  <li><a href="stocks.php">Stocks</a></li>
				</ul>
			</div>
		</nav>

		<div class="container-fluid">
	
		<?php
		spl_autoload_register(function ($class_name) {
			if ( file_exists( "classes/" . $class_name . ".php" ) ) {
				include "classes/" . $class_name . '.php';
			}
		});

		?>

