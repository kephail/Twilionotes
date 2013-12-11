<?php
mysql_connect("cust-mysql-123-18", "twilio", "twilio123");
mysql_select_db("twilio");

$currentDate = new DateTime(date('d-m-y h:i:s'));
$currentDate = $currentDate->format('d-m-y');

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notes - Twillio</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<h1>Twilio - TODO App</h1>
			<h2>Our number is: <strong>01143031702</strong></h2>
		</header>
		<div class="lines"></div>
		<ul class="list">
			<li><h2>To-Do:</h2></li>
			<?php
			$sql = mysql_query("SELECT * FROM notes ORDER BY NoteTime");
			while ($row = mysql_fetch_array($sql)){
				$id = $row ['NoteID'];
				$desc = $row ['NoteDesc'];
				$datetime = new DateTime($row ['NoteTime']);
				$date = $datetime->format('d-m-y');
				$time = $datetime->format('h:i');
			?>
			<li>
				<?php 
				if ($date == $currentDate) {
					echo "<strong>" .  $time . "</strong>";
				}else{
					echo "<strong>" .  $date . "</strong>";
				}
				?>
				<?php echo " - " ?>
				<?php echo $desc ?>
			</li>
		<?php
		};
		?>
		</ul>
	</div>
</body>
</html>

