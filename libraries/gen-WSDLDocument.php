<?php
	//error_reporting(0);
	require 'sutik.php';
	require 'WSDLDocument/WSDLDocument.php';
	$wsdl = new WSDLDocument('Sutik', "http://localhost/bead/libraries/sutiszerver.php", "http://localhost/feladat/szerver/");
	$wsdl->formatOutput = true;
	$wsdlfile = $wsdl->saveXML();
	echo $wsdlfile;
	file_put_contents ("sutik.wsdl" , $wsdlfile);
?>
