<?php
mysql_connect("localhost", "root", "root");
mysql_select_db("twilioNotes");
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notes - Twillio</title>
</head>
<body>
	<div class='header'>
		Notes
	</div>

	<?php
	$sql = mysql_query("SELECT * FROM notes ORDER BY NoteID DESC");
	while ($row = mysql_fetch_array($sql)){
		$id = $row ['NoteID'];
		$desc = $row ['NoteDesc'];
		$date = $row ['NoteTime'];
	?>
	<div class='notes_main'>
		<?php echo $desc ?>
		<?php echo $date ?>
	</div>

	<?php
	};
	?>

</body>
</html>

