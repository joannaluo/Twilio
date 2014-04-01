Twilio
======
Home.php - This file is the 'face' of the TwilioWeb. It is what the user sees and interacts with, and this
is also where all function calls are made.

sendText.php - This file is where the client is instantiated, and the text message is sent, after pulling the
needed information through a $_POST and cookies.

makeCall.php - This file is where the client is instantiated, and the call is made, after pulling the needed
information through a $_POST and cookies.

setAuth.php - This is where I set cookies for the authorization token and account SID. This is called by authorize();

ajaxCaller.php - Original barebones piece that was used to test functionality, before Bootstrap themes and customization.
