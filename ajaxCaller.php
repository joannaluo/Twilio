<!DOCTYPE html>
<html lang="en">
    <head>

	<meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="http://getbootstrap.com/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/theme/theme.css" rel="stylesheet">
        	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script type="text/javascript">
                //This is the function called by the link below(sendMessage())
		        function sendMessage(){
                    //Get the phone number from the input below
			        var number = document.getElementById("number").value;
                    //Print it to console for debugging purposes
			        console.log(number);
                    //Get the message from below
			        var message = document.getElementById("message").value;
                    //Print to console again
			        console.log(message);
                    //YOU NEED JQUERY FOR THIS. Do the GET call sending basically: AJAXEDPAGE.php?number=19253235749&message=HiAndy. So it's url?data&data
                    //You can change type to POST, but you'd need to change AJAXEDPAGE.php to look for $_POST instead of $_GET.
                    //Post generally(always) works better if you need to use ' and " and , and grammar marks
			        $.ajax({
				        type: "POST",
				        url: "sendText.php",
				        data: {number: number, message: message}
			        })
                        .done(function(html){
                            $( "#results" ).empty();
                            $( "#results" ).append(html);
                    });
		        }

		        function makeCall(){
		        	var fromNumber = document.getElementById("fromNumber").value;
		        	console.log(fromNumber);
		        	var toNumber = document.getElementById("toNumber").value;
		        	console.log(toNumber);
		        	$.ajax({
		        		type: "POST",
		        		url: "makeCall.php",
		        		data: {toNumber: toNumber, fromNumber: fromNumber}
		        	});
				}
		        
            </script>
        <title>Send/Receive a Message</title>
    </head>
    <body>
        TO Phone Number: <input id="number" type="text" value="+14153076382"><br>
        Message: <textarea id="message">Enter Message Here</textarea><br>
        <a href="#" type="button" class="btn btn-sm btn-primary" onclick="sendMessage();">Send Message</a>
        <br><br><br>
        <div class="alert alert-success" id="results"></div> 
        FROM Phone Number: <input id="fromNumber" type="text" value="15104882466"><br>
        TO Phone Number: <input id="toNumber" type="text" value="14153076382"><br>
        <a href="#" type="button" class="btn btn-sm btn-primary" onclick="makeCall();">Call!</a>
    </body>
</html>
