<?php
	require("sutik.php");
	$server = new SoapServer("sutik.wsdl");
	$server->setClass('Sutik');
	$server->handle();
?>
