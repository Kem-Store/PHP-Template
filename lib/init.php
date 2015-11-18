<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/lib/class/configuration.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/lib/class/session.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/lib/class/DB.php");

$base = new DB();
$session = new Session();

$config = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/lib/bin/init.json"));
$config->version = date("YH.s.i dm", filemtime($_SERVER["DOCUMENT_ROOT"]."/lib/bin/init.json"));

// if($_POST['config'] === 'initial') {
// 	echo json_encode($config);
// }
?>