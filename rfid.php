<?php

/**
 * Description of rfid
 * Based on EL.Sith MinimalSwipe.php
 * @author shawnsandy
 */
ini_set('display_errors', '1');
//ini_set('html_errors', 1);
// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('America/New_York');

class rfid {

	//put your code here

	public $swipe_time,
	$kiosk_number,
	$title = "Atlas Atendance Tracker",
	$card_number,
	$attendee_count = 1,
	$pdo,
	$STDOUT;

	public function __construct($kiosk_id = null) {

		$this->STDOUT     = fopen('./log.txt', 'a');
		$this->swipe_time = date("Y-m-d H:i:s");
		//$this->log($this->swipe_time);
		if (isset($kiosk_id)) {
			$this->kiosk_number = $kiosk_id;
		}

		try {
			$this->pdo = new PDO('mysql:host=localhost;dbname=rfid', 'root', 'atlas1');
			$this->log("Connection to the database - ".$this->swipe_time);
			//print_r($this->pdo->errorInfo());
		} catch (Exception $ex) {
			//$this->log("Error connection to the database");
			echo $ex->getMessage();
			die("Unable to connect to DB ".$ex->getMessage());
		}
	}

	public function get_count() {
		$statement = $this->pdo->query("SELECT count(*) FROM attendances");
		$row       = $statement->fetch(PDO::FETCH_ASSOC);
		$count     = $row;
		//fputs($STDOUT, "Count is now: $count\n");
		$this->log("Count in now: {$count}");
		return $count;
	}

	public function add_count($card_num) {

		$card_number  = $card_num;
		$kiosk_number = $this->kiosk_number;
		//$attendee_count = $this->attendee_count;
		$swipe_time = date("Y-m-d H:i:s");

		try {
			$qry = "INSERT INTO attendances(card_number, swipe_time, kiosk_number) VALUES( '$card_number',  '$swipe_time', '$kiosk_number' )";
			if ($p = $this->pdo->exec($qry)):
			//   print_r($this->pdo->errorInfo());
			$this->log('Data saved - '.$p.$this->swipe_time);
			endif;
		} catch (Exception $exc) {
			//echo $exc->getTraceAsString();
			$this->log('Error saving data to the database'.$this->swipe_time.$this->kiosk_number.$exc->getTraceAsString());

		}

	}

	public function log($log_text = null) {
		if (!isset($log_text)) {
			return;
		}

		fputs($this->STDOUT, $log_text."\n");
	}

}
