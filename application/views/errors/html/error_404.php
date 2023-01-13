<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>404 Page Not Found</title>

	<style>
		*,
		*::after,
		*::before {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			font-size: 2rem;
		}

		a {
			text-decoration: none;
			font-size: 0.8rem;
		}

		.btn {
			padding: 0.8rem;
			border-radius: 5px;
		}

		.btn-danger {
			background-color: red;
			color: #fff;
		}

		.btn-danger:hover {
			background-color: rgb(228, 5, 5);
		}

		.container {
			max-width: 992px;
			margin-left: 15%;
			margin-right: 15%;
		}

		.content {
			height: 100vh;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			text-align: center;
		}

		h1 {
			font-size: 2rem;
			line-height: 1;
			color: #3C4048;
		}

		h4 {
			line-height: 1.5;
			font-size: 1.2rem;
			text-align: center;
			color: grey;
		}

		.font-bold {
			font-weight: 800;
		}

		.mt-1 {
			margin-top: 1rem;
		}

		.mt-2 {
			margin-top: 2rem;
		}

		@media screen and (min-width: 767px) {
			h1 {
				font-size: 2.5rem;
				line-height: 1.3;
				color: #3C4048;
			}

			h4 {
				line-height: 1.5;
				font-size: 1.4rem;
			}

			a {
				text-decoration: none;
				font-size: 1rem;
			}
		}
	</style>
</head>

<body>

	<div class="container">
		<div class="content">
			<h1 class="font-bold">404 <br>Page NotFound</h1>
			<h4 class="mt-1">Halaman yang anda cari tidak ditemukan :( </h4>
			<a href="http://localhost/mts/home" class="btn btn-danger mt-2">Back to Home</a>
		</div>
	</div>

</body>

</html>