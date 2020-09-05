<!DOCTYPE html>
<html>

<head>
	<!--Webpage Title -->
	<title>AP - Quick Writer</title>

	<!--Style File & Fonts -->
	<?php include "includes/db.php"; ?>
	<link rel="stylesheet" type="text/css" href="game2style.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--Viewport for mobile view -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<?php session_start(); ?>

<body>



	<!--Top Bar -->
	<?php include "includes/navigation.php"; ?>


	<!--Game Area -->
	<div class="banner">
		<div class="game" id="game">

			<p class="currentNumber" id="currentNumber">
			</p>

			<!--Info text when game is over -->
			<div class="info" id="info">
				<p class="infotext" id="infotext"> Better luck next time! Press this to play again </p>
			</div>

			<!--Number input area -->
			<form>
				<input type="words" name="numbers" class="numbers" id="numbers" autofocus autocomplete="off">
			</form>

			<!--Time left -->
			<p class="timeleft">Time Left: <span id="times">0</span></p>

			<!--Score -->
			<p class="score">Score: <span id="scores">0</span></p>

			<!--Highscore -->
			<p class="hscore">Highscore: <span id="hscores">0</span></p>

			<!--Game Over message -->
			<p class="message" id="message"></p>

			<!--Difficulty buttons -->
			<div class="difficulty">

				<div class="button" id="easy" onclick="easy()">
					<p class="text"> Easy </p>
				</div>

				<div class="button" id="medium" onclick="medium()">
					<p class="text"> Medium </p>
				</div>

				<div class="button" id="hard" onclick="hard()">
					<p class="text"> Hard </p>
				</div>

			</div>

		</div>

	</div>

	<!--JS file link -->
	<script src="game2script.js"></script>

</body>

</html>