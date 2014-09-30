

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



$swipe_time = date('Y-m-d H:i:s');
#echo "Time: " . $nTime;

$kiosk_number = "2";

#echo "Post variables: ";
#print_r($_POST); 

$title = "Atlas Attendance Tracker by ";
echo "<title>" . $title . "CTS</title>";

#echo "<h1>" . $title . '<img class="name_logo" src="img/admin_header_logo.default.jpg "></h1>';

if (isset($_POST['attendee_count'])) {
	
	$card_number = $_POST['card_number'];
	$kiosk_number = $_POST['kiosk_number'];
	
	$s = "kiosk_number:" . $kiosk_number;
	$s = $s . ",card_number:" . $card_number; 
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

<img id="kiosk_header" src="img/kiosk_header.jpg">

<form id="swipe_area" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  >
Swipe card
<input type="hidden" name="kiosk_number" value="<?php echo $kiosk_number ?>">
<input type="hidden" name="attendee_count" value="<?php echo $attendee_count ?>"/>
<input name="card_number" autofocus type="password">


<?php
if (isset($_POST['attendee_count'])) {
		echo "<br/><br/>Thank you!<br/><br/>";

	echo $attendee_count;	
	echo " attendees ";
	
	print " at kiosk location " . $kiosk_number . "<br/>";	
			
	echo "<br/>Last swipe at time: ";
	echo $swipe_time;				

try{
	$pdo = new PDO('mysql:host=localhost;dbname=rfid_development', 'root', '');
	fputs($STDOUT, "$swipe_time -- Connected to db\n");	
}
catch(Exception $e){
	fputs($STDOUT, "Error connecting to db\n");	
	die("Unable to connect to db: " . $e->getMessage());
	}
?>

</form>

<?php
fputs($STDOUT, "About to save record\n");	

try{
	$qry = "insert into attendances (card_number, swipe_time, kiosk_number) values ( '$card_number',  '$swipe_time', '$kiosk_number' )";
	$pdo->exec($qry);
	#$pdo->commit();
	#print "$qry\n";
	fputs($STDOUT, "Saved record $qry\n");	
}catch(Exception $e){
	#$pdo->rollBack();
	fputs($STDOUT, "Some error trying to save this record into db\n");	
	die("Unable to save record");	
}

$statement = $pdo->query("SELECT count(*) FROM attendances");
$row = $statement->fetch(PDO::FETCH_ASSOC);
$count = print_r($row, true);
fputs($STDOUT, "Count is now: $count\n");	
#echo htmlentities($row['first_name']);
}
?>

<img id="employ_florida" src="img/employ_florida_logo.jpg">

<!--
<img id="kiosk_header" src="img/kiosk_header.jpg">
<img id="atlas_logo" src="img/atlas_logo_100.jpg">
-->
<span class="footer">

CareerSource Tampa Bay is an equal opportunity employer/program. Auxiliary aids and services are available upon request to individuals with disabilities.	
All voice telephone numbers listed on this website may be reached by persons using TTY/TDD equipment via the Florida Relay Service at 711.	
ATLAS is a trademark of Complete Technology Solutions Copyright &copy; 2014 - Complete Technology Solutions. All Rights Reserved.

</span>

<style>
#kiosk_header{ position: absolute; left: 85px; top: 25px; }
#employ_florida{ position: absolute; left: 850px; top: 500px; }
#atlas_logo{ position: absolute; left: 850px; top: 37px; }
#swipe_area{ position: absolute; left: 45px ; top: 151; }
img{
	vertical-align: top;
	}
.footer{ position: absolute; left: 56px; top: 500px; width: 700px; font-size: 11px; }
.name_logo{
	height: 1.6em;
	}
form{
	border: 1px solid black;
	height: 200px;
	width: 700px;
	padding: 40px;
	}
</style>