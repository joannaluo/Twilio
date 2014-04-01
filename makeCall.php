<?php
    // Include the Twilio PHP library
    require "twilio-php-latest/Services/Twilio.php";
 
    // Twilio REST API version
    $version = "2010-04-01";
 
    // Set our Account SID and AuthToken
    $sid = $_COOKIE['SID'];
    $token = $_COOKIE['AuthToken'];
    $client = new Services_Twilio($sid, $token, $version);
    // A phone number you have previously validated with Twilio
    
    $fromNumber = $_POST['fromNumber'];
    $toNumber = $_POST['toNumber'];

 
    try {
        // Initiate a new outbound call
        $call = $client->account->calls->create(
            $fromNumber, // The number of the phone initiating the call
            $toNumber, // The number of the phone receiving call
            'http://demo.twilio.com/welcome/voice/' // The URL Twilio will request when the call is answered
        );
        echo 'Started call: ' . $call->sid;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }

?>

