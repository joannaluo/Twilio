<?php
	$SID = $_POST['SID'];
	setcookie("SID", $SID);
	$AuthToken = $_POST['AuthToken'];
	setcookie("AuthToken", $AuthToken);
	
	
?>