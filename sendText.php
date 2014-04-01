<?php
    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * - Save it as sendnotifications.php and at the command line, run 
     *        php sendnotifications.php
     *
     * - Upload it to a web host and load mywebhost.com/sendnotifications.php 
     *   in a web browser.
     * - Download a local server like WAMP, MAMP or XAMPP. Point the web root 
     *   directory to the folder containing this file, and load 
     *   localhost:8888/sendnotifications.php in a web browser.
     */
 
    // Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries, 
    // and move it into the folder containing this file.
    require "twilio-php-latest/Services/Twilio.php";
 
    // Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
    $AccountSid = $_COOKIE['SID'];
    $AuthToken = $_COOKIE['AuthToken'];
 
    // Step 3: instantiate a new Twilio Rest Client
    $client = new Services_Twilio($AccountSid, $AuthToken);
 
    // Step 4: make an array of people we know, to send them a message. 
    // Feel free to change/add your own phone number and name here.

	$fromNumber = $_POST['SMSfromNumber'];
    $number=$_POST['SMStoNumber'];
    $message=$_POST['SMS'];

 	try {
        $sms = $client->account->messages->sendMessage($fromNumber, $number,$message);
        echo "Sent message to ".$number;
    }
    catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
