

<?php
#header("Location: 'http://localhost:4567/'")
#header("Location: ?done=1");

#$done = $_GET['done'];
#if ($done == 1){
#    echo "<div>We have received your email, our agent will contact you shortly</div>";
#}

if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
}

$STDOUT = fopen('./log.txt', 'a');



$nTime = date('Y-m-d H:i:s');
#echo "Time: " . $nTime;

$kiosk_id = "2";

#echo "Post variables: ";
#print_r($_POST); 

$title = "Atlas Attendance Tracker by ";
echo "<title>" . $title . "CTS</title>";
echo '<img src="img/employ_florida_logo.jpg">';
echo "<h1>" . $title . '<img class="name_logo" src="img/admin_header_logo.default.jpg "></h1>';

if (isset($_POST['attendee_count'])) {
	
	$s = "kiosk_id:" . $_POST['kiosk_id'];
	$s = $s . ",card_number:" . $_POST['card_number']; 
	$s = $s . ",attendee_count:" .$_POST['attendee_count'];
	fputs($STDOUT, $s . "\n");	
		$attendee_count = $_POST['attendee_count'] + 1;

	
}else{
	$attendee_count = 0;	
}

if($_GET){
	echo "GET<br/>";
}
if($_POST){
	#fputs($STDOUT, "writing to stdout directly\n");

#	echo "<br/>Card number: ";
#	echo $_POST['card_number'];
	#header("Location: " . $_SERVER['REQUEST_URI']);
}

#echo "<br/>New values";


#echo date('Y-m-d')
?>



<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  >
Swipe card
<input type="hidden" name="kiosk_id" value="<?php echo $kiosk_id ?>">
<input type="hidden" name="attendee_count" value="<?php echo $attendee_count ?>"/>
<input name="card_number" autofocus type="password">
</form>

<?php
if (isset($_POST['attendee_count'])) {
		echo "<br/><br/>Thank you!<br/><br/>";

	echo $attendee_count;	
	echo " attendees ";
	
	print " at kiosk location " . $kiosk_id . "<br/>";	
			
	echo "<br/>Last swipe at time: ";
	echo $nTime;				
}
?>

<br/>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=rfid_development', 'root', '');
$statement = $pdo->query("SELECT first_name FROM attendees");
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo htmlentities($row['first_name']);
?>
<span class="footer">
<img  src="img/atlas_logo_100.jpg">
&copy; Computer Technology Services

</span>

<style>
img{
	vertical-align: top;
	}
.footer{
	position: absolute;
	bottom: 0px;
	}
.name_logo{
	height: 1.6em;
	}
</style>