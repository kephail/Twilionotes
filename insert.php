<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    mysql_connect("cust-mysql-123-18", "twilio", "twilio123");
	mysql_select_db("twilio");

    $description = $_REQUEST['Body'];

    if($description == 'Helpme') { 
    	$help = "To-Do Description, DD-MM-YY HH:MM";
    	?><Response><SMS><?php echo $help; ?></SMS></Response><?php
    } else {

    $new = str_split($description);

    $bool = false; 
    $date = '';

    foreach($new as &$value) {
    	if($value == ',') {
    		$bool = true;
    	}
    	if($bool == false){
    		$descrip .= $value;
    	}
    	if ($bool == true) {
    		$date .= $value;
    	}
    }
    
    if($date[0] == ',' && $date[1] == ' ') {
    	$date = ltrim($date, ", ");
	} elseif($date[0] == ',') {
		$date = ltrim($date, ",");
	};
	$date .= ":00";
	mysql_query("INSERT INTO notes (NoteDesc, NoteTime) VALUES ('$descrip', '$date')");
	?>
		<Response>
		  <SMS><?php echo "You've added $descrip to your to-do-list. You will be reminded at $date. Visit http://www.everythingrob.co.uk/Twilionotes. Call 01143031702 to hear your to-dos"; ?></SMS>
	    </Response>
	<?php }; ?>