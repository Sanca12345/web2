<?php
require_once '../helpers/session_helper.php';
class Sutik
{
  

public function getSutik()
{
    $eredmeny = [
        "hibakod" => 0,
        "uzenet" => "",
        "sutik" => Array()];
    
    try{
        $dbh = new PDO('mysql:host=localhost;dbname=test','root', '',
        [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        $sql= "select s.*, a.*, t.* from suti as s, ar as a, tartalom as t
        where s.id=a.id and a.id=t.id";
        $sth = $dbh->prepare($sql);
        $sth->execute([]);
        $eredmeny["sutik"] = $sth->fetchAll(PDO::FETCH_ASSOC);

    }
    catch(PDOException $e){
        $eredmeny["hibakod"] = 1;
        $eredmeny["uzenet"] = $e->getMessage();

    }


    return $eredmeny;

}



}
$options = array(
	"uri" => "http://localhost/bead/libraries/sutik.php");
	$server = new SoapServer(null, $options);
	$server->setClass('Sutik');
	$server->handle();
