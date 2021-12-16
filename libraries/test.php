<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <title>SÜTIK</title>
  </head>

  <?php
     $options = array(
   
   'keep_alive' => false,
    //'trace' =>true,
    //'connection_timeout' => 5000,
    //'cache_wsdl' => WSDL_CACHE_NONE,
   );
  $client = new SoapClient('http://localhost/bead/libraries/sutik.php',$options);
  
  $sutik = $client->getSutik();
  echo "<pre>";
  print_r($sutik);
  echo "</pre>";
  

  ?>
    
  <body>
  </body>
</html>