<?php

include_once 'header.php';
include_once '../controllers/mnbController.php';

$mnbCr = new MNBExchange;
$data = $mnbCr->getRate();

?>

<form method="post" action="../controllers/mnbController.php">

<input type="text-input" name="currency" cols="60" rows="4" placeholder="Adja meg a valuta típust...">
<button type="submit" name="submit">Keresés</button>

</form >