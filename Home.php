<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/jumbotron/ -->
<?php
	require "twilio-php-latest/Services/twilio.php";
    $sid = $_GET['AccountSid'];
    $AuthToken = "83539acbdd0452a9c45805d765256f1a";
    $client = new Services_Twilio($sid, $AuthToken);
	$authorized_app = $client->account->authorized_connect_apps->get("CN3cf0eacdb7fd06b4cc12fe72932d6fea");
	$sid2 = $authorized_app->account_sid;
?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TwilioWeb</title>

    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="http://getbootstrap.com/examples/jumbotron/jumbotron.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
		//This is the function called by the link below(sendMessage())
		function sendMessage(){
			//Get the phone number from the input below
			var fromNumber = document.getElementById("fromNumber").value;
			console.log(fromNumber);
			var number = document.getElementById("number").value;
			//Print it to console for debugging purposes
			console.log(number);
			//Get the message from below
			var message = document.getElementById("message").value;
			var sid = "<?php echo $sid; ?>";
			var sid2 = "<?php echo $sid2; ?>";
			//Print to console again
			console.log(message);
			console.log(sid);
			console.log(sid2);
			//YOU NEED JQUERY FOR THIS. Do the GET call sending basically: AJAXEDPAGE.php?number=19253235749&message=HiAndy. So it's url?data&data
			//You can change type to POST, but you'd need to change AJAXEDPAGE.php to look for $_POST instead of $_GET.
			//Post generally(always) works better if you need to use ' and " and , and grammar marks
			$.ajax({
				type: "POST",
				url: "sendText.php",
				data: {sid: sid2, fromNumber: fromNumber, number: number, message: message}
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
			var sid = $sid;
			$.ajax({
				type: "POST",
				url: "makeCall.php",
				data: {sid: sid, toNumber: toNumber, fromNumber: fromNumber}
			});
		}	
	</script>
</head>

<body>
	    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://getbootstrap.com/examples/theme/#">Bootstrap theme</a>
        </div>
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
    	<div class="container">
        	<h1>Welcome!</h1>
        	<p>Thank you for trying out TwilioWeb.</p>
      	</div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Send a SMS</h2>
          	<p>Text a friend!</p>
          	Sender: <input id= "fromNumber" type = "text" placeholder = "Your Number"> <br>
          	Recipient: <input id="number" type="text" placeholder="Enter Number Here"><br>
         	Message: <textarea id="message" placeholder ="Enter Message Here"></textarea><br>
        	<p style="text-align:center">
        	<a href="#" type="button" class="btn btn-med btn-primary" onclick="sendMessage();">Send Message</a>
        	<div class="alert alert-success" id="results"></div>
       		</p>
        </div>
        <div class="col-md-4">
          <h2>Make a Call</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          Caller: <input id="fromNumber" type="text" value="15104882466"><br>
        Call Recipient: <input id="toNumber" type="text" value="14153076382"><br>
        <a href="#" type="button" class="btn btn-sm btn-primary" onclick="makeCall();">Call!</a>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="http://getbootstrap.com/examples/jumbotron/#" role="button">View details »</a></p>
        </div>
      </div>

      <hr>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./FrontPage_files/jquery.min.js"></script>
    <script src="./FrontPage_files/bootstrap.min.js"></script>
  

</body></html>