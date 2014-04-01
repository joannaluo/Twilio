<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/jumbotron/ -->

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

    <title>TwilioWeb</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/jumbotron/jumbotron.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">

		

    		
		//set SID and authtoekn as cookies in setAuth.php
		function authenticate(){
			var SID = document.getElementById("SID").value;
			console.log(SID);
			var AuthToken = document.getElementById("AuthToken").value;
    		$.ajax({
				type: "POST",
				url: "setAuth.php",
				data: {SID: SID, AuthToken: AuthToken}
    		});		
		}
		
				

		
		
		function sendMessage(){
			//Get the phone number from the input below
			var SMSfromNumber = document.getElementById("SMSfromNumber").value;
			console.log(SMSfromNumber);
			var SMStoNumber = document.getElementById("SMStoNumber").value;
			//Print it to console for debugging purposes
			console.log(SMStoNumber);
			//Get the message from below
			var SMS = document.getElementById("SMS").value;
			console.log(SMS);
			$.ajax({
				type: "POST",
				url: "sendText.php",
				data: {SMSfromNumber: SMSfromNumber, SMStoNumber: SMStoNumber, SMS: SMS}
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
    
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">TwilioWeb</a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <div class="jumbotron">
      <div class="container">
        <h1>Welcome!</h1>
        <p>Thanks for trying out TwilioWeb!</p>
      </div>
    </div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2><p align="center">Submit credentials!</p></h2>
				<p align="center">In order to send texts and make calls, we need your account SID and authorization token. These can be found on you Twilio dashboard. This information will not be stored.</p>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="SID" class="col-sm-4 control-label">Account SID: </label>
						<div class="col-sm-7">
		  				<input type="text" class="form-control" id="SID" placeholder="SID">
						</div>
	  				</div>
	  				<div class="form-group">
						<label for="AuthToken" class="col-sm-4 control-label">Auth Token: </label>
						<div class="col-sm-7">
		  				<input type="password" class="form-control" id="AuthToken" placeholder="Authentication Token">
						</div>
	  				</div>
	  				<div class="form-group">
						<div class="col-sm-offset-4 col-sm-10">
		  				<button type="button" class="btn btn-default" onclick="authenticate();">Authenticate!</button>
						</div>
	  				</div>
				</form>	

			</div>
			
        <div class="col-md-4">
	  		<h2><p align="center">Send a SMS</p></h2>
          	<p align="center">Text a friend!</p>
          	<form class="form-horizontal" role="form">
				<div class="form-group">
					<label class="col-sm-4 control-label">From: </label>
					<div class="col-sm-6">
		  				<input type="text" class="form-control" id="SMSfromNumber" placeholder="Your phone #">
					</div>
	  			</div>
	  			<div class="form-group">
					<label class="col-sm-4 control-label">To: </label>
					<div class="col-sm-6">
		  				<input type="text" class="form-control" id="SMStoNumber" placeholder="Your friend's phone #">
					</div>
	  			</div>
	  			<div class="form-group">
					<label class="col-sm-4 control-label">Message: </label>
					<div class="col-sm-6">
						<textarea class="form-control" rows="4" id ="SMS"></textarea>
					</div>
	  			</div>
	  			<div class="form-group">
					<div class="col-sm-offset-4 col-sm-10">
		  				<button type="button" class="btn btn-default" onclick="sendMessage();">Send Message!</button>
					</div>
	  			</div>
			</form>
       		<div class="alert alert-success" id="results"></div> 
		</div>
        <div class="col-md-4">
          <h2><p align="center">Make a Call</h2></p>
          <p align="center">Please set a default message to play for the people you call through TwilioWeb on your Twilio dashboard. Text-to-speech will be integrated soon :)</p>
          				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="fromNumber" class="col-sm-4 control-label">From: </label>
						<div class="col-sm-6">
		  				<input type="text" class="form-control" id="fromNumber" placeholder="Your phone #">
						</div>
	  				</div>
	  				<div class="form-group">
						<label for="toNumber" class="col-sm-4 control-label">To: </label>
						<div class="col-sm-6">
		  				<input type="text" class="form-control" id="toNumber" placeholder="Your friend's phone #">
						</div>
	  				</div>
	  				<div class="form-group">
						<div class="col-sm-offset-4 col-sm-10">
		  				<button type="button" onclick="makeCall();" class="btn btn-default">Call!</button>
						</div>
	  				</div>
				</form>	
      </div>
	</div>
      <hr>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Home_files/jquery.min.js"></script>
    <script src="./Home_files/bootstrap.min.js"></script>
  

</body></html>
