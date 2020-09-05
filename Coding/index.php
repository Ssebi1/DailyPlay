<!DOCTYPE html>
<html>

<!--Head -->

<head>

	<!--Webpage Title -->
	<title>DailyPlay</title>

	<!--Style File & Fonts -->
	<?php include "includes/db.php"; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<!--Viewport for mobile view -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<?php session_start(); ?>
<?php ob_start(); ?>

<!--Body -->

<body>

	<?php include "includes/navigation.php"; ?>
	<!--Page Content Except Top Bar -->
	<div id="page-container">


		<!--Top Banner -->
		<div class="banner">

			<!--Social Buttons -->
			<ul class="social">
				<a href="https://www.facebook.com/" target="blank">
					<li>
						<div class="fa fa-facebook">
					</li>
				</a>
				<a href="https://twitter.com/search?q=Ssebi5&src=typed_query" target="blank">
					<li>
						<div class="fa fa-twitter">
					</li>
				</a>
				<a href="https://www.instagram.com/ssebi1/" target="blank">
					<li>
						<div class="fa fa-instagram">
					</li>
				</a>
			</ul>

		</div>


		<!--Games Area -->
		<div class="games">

			<!--Game 1 -->
			<a href="game1.php" class="gamebox">
				<img src="../photos/game1.png" class="game1image" style="margin-top:85px;">
				<div class="title">Quick Writer</div>
			</a>

			<!--Game 2 -->
			<a href="game2.php" class="gamebox">
				<img src="../photos/game2.png" class="game2image">
				<div class="title">Number Memory</div>
			</a>

			<!--Game 3 -->
			<div class="gamebox">
				<img src="../photos/game3.png" class="game3image">
				<div class="title">Coming Soon</div>

			</div>

		</div>



		<!--Footer -->
		<?php include "includes/footer.php"; ?>

	</div>

</body>

</html>