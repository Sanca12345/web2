<?php
include_once 'header.php';

if(isset($_SESSION['usersId'])){
  echo explode(" ", $_SESSION['usersName'])[0];
}else{
  redirect("login.php");
} 


?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <title>SÜTIK</title>
  </head>

  <?php 
  $options = array(
    "location" => "http://vkrxn3web2.nhely.hu/libraries/sutik.php",
    "uri" => "http://vkrxn3web2.nhely.hu/libraries/sutik.php",
    'keep_alive' => false,
  );
try{
    $client = new SoapClient(null, $options);
    $sutiadat = $client->getSutik();
    //var_dump($sutiadat);
    }catch(SoapFault $e){
    var_dump($e);
    }


  ?>
    
    <style>
title{
    margin-left: auto;
  margin-right: auto;
}


table, th, td{
    
    width: 80%;
    text-align: center;
    position: center;
    margin-left: auto;
  margin-right: auto;
}

th, td {
  border-bottom: 1px solid #ddd;
    
}
</style>
  <body>
    <h1>Sütik</h1>

        <table>
        <thead>
            <tr>
            <th>Süti</th>
            <th>Tipus</th>
            <th>Mentes</th>
            <th>Egység</th>
            <th>Ár</th>

            </tr>

        </thead>
        <tbody>

        <?php
            foreach($sutiadat as $id => $elem){
                switch ($id) {
                    case 'hibakod':
                        { }
                        break;
                    case 'uzenet':
                        {}
                        break;
                    case 'sutik':
                        {
                            foreach($elem as $suti){
                    ?>
                    <tr>
                    <td><?php echo $suti['nev']; ?></td>
                    <td><?php echo $suti['tipus']; ?></td>
                    <td><?php echo $suti['ertek'];" FT" ?></td>
                    <td><?php echo $suti['egyseg']; ?></td>
                    <td><?php echo $suti['mentes']; ?></td>
                    </tr>
                    <?php
                    }
                    }
                    break;
                
                
                }

            }
        ?>   
        </tbody>    
        </table>
    
  </body>                                                          
</html>