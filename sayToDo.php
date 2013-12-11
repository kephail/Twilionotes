<?php
	header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    mysql_connect("cust-mysql-123-18", "twilio", "twilio123");
	mysql_select_db("twilio");


	function sayToDo() {
		$sql = mysql_query("SELECT * FROM notes ORDER BY NoteTime DESC");
			while ($row = mysql_fetch_array($sql)){
				$id = $row ['NoteID'];
				$desc = $row ['NoteDesc'];
				$datetime = $row ['NoteTime'];
				$datetime = new DateTime($row ['NoteTime']);
				$date = $datetime->format('d m y');
				$time = $datetime->format('h:i');
			}
			echo "$desc on the $date at $time";
	}
?>

<Response>
	<Say>Hello and welcome to your to do list. First thing to do on your list is <?php sayToDo(); ?></Say>
</Response>