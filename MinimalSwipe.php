
<?php
#header("Location: 'http://localhost:4567/'")
#header("Location: ?done=1");

#$done = $_GET['done'];
#if ($done == 1){
#    echo "<div>We have received your email, our agent will contact you shortly</div>";
#}

$nTime = date('Y-m-d H:i:s');
#echo "Time: " . $nTime;

if($_GET){
	echo "GET<br/>";
}
if($_POST){
	echo "Last values: Kiosk: ";
	echo $_POST['kiosk_id'];
	echo ", Sign in time: ";
	echo $nTime;
	echo ", Card number: ";
	echo $_POST['card_number'];
}

echo "<br/>New values";
$kiosk_id = "2";

print ", Kiosk ID:" . $kiosk_id;

#echo date('Y-m-d')
?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  >
Swipe card
<input type="hidden" name="kiosk_id" value="<?php echo $kiosk_id ?>">

<input name="card_number" autofocus >
</form>