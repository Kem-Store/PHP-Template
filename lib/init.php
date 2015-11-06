<?php
include_once("class/configuration.php");
include_once("class/session.php");
include_once("class/DB.php");

$base = new DB();
$session = new Session();

$config = json_decode(file_get_contents("bin/init.json"));
$config->version = date("YH.s.i dm", filemtime("bin/init.json"));

if($_POST['config'] === 'initial') {
	echo json_encode($config);
}
?>