
<?php
#header("Location: 'http://localhost:4567/'")
#header("Location: ?done=1");

#$done = $_GET['done'];
#if ($done == 1){
#    echo "<div>We have received your email, our agent will contact you shortly</div>";
#}

$STDOUT = fopen('/dev/null', 'r');

$nTime = date('Y-m-d H:i:s');
#echo "Time: " . $nTime;

$kiosk_id = "2";

echo "Post variables: ";
print_r($_POST); 

if (isset($_POST['attendee_count'])) {
	echo "<br/><br/>Thank you!<br/>";
	$attendee_count = $_POST['attendee_count'] + 1;
	echo "Attendee count now: ";
	echo $attendee_count;		
}else{
	$attendee_count = 0;	
}

if($_GET){
	echo "GET<br/>";
}
if($_POST){
	fputs($STDOUT, "writing to stdout directly\n");
	echo "Last values: Kiosk: ";
	echo $_POST['kiosk_id'];
	echo ", Sign in time: ";
	echo $nTime;
	echo ", Card number: ";
	echo $_POST['card_number'];
	#header("Location: " . $_SERVER['REQUEST_URI']);
}

echo "<br/>New values";


#echo date('Y-m-d')
?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  >
Swipe card
<input type="hidden" name="kiosk_id" value="<?php echo $kiosk_id ?>">
<input type="hidden" name="attendee_count" value="<?php echo $attendee_count ?>"/>
<input name="card_number" autofocus type="password">
</form>

<?php
print "(Kiosk " . $kiosk_id . ")";
?>