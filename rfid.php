<?php

/**
 * Description of rfid
 * Based on MinimalSwipe.php
 * @author shawnsandy
 */
class rfid {

    //put your code here

    public $swipe_time,
            $kiosk_number,
            $title = "Atlas Atendance Tracker",
            $card_number,
            $attendee_count = 0,
            $pdo,
            $STDOUT;

    public function __construct() {
        $this->swipe_time = data('Y-m-d H:i:s');
        $this->kiosk_number = 2;

        $this->STDOUT = fopen('./log.txt', 'a');

        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=rfid_development', 'root', '');
        } catch (Exception $ex) {
            $this->log("Error connection to the database");
            die("Unable to connect to DB " . $ex->getMessage());
        }
    }

    public function get_count() {
        
    }

    public function add_count() {


        if (isset($_POST['attendee_count'])):
            $this->card_number = $_POST['card_number'];
            $this->card_number = $_POST['kiosk_number'];
            $this->attendee_count = $_POST['attendee_count'];
        endif;

        try {
            $qry = "insert into attendances (card_number, swipe_time, kiosk_number) values ( '$this->card_number',  '$this->swipe_time', '$this->kiosk_number' )";
            $this->pdo->exec($qry);
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            $this->log('Error saving data to the database'. $exc->getTraceAsString());
        }
    }

    public function log($log_text = null) {
        if (!isset($log_text))
            return;
        fputs($this->STDOUT, $log_text . "\n");
    }

}
