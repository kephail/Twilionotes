<?php
mysql_connect("localhost", "root", "root");
mysql_select_db("twilioNotes");

$currentDate = new DateTime(date('y-m-d h:i:s'));
$currentDate = $currentDate->format('y-m-d');

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
				$date = $datetime->format('y-m-d');
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

