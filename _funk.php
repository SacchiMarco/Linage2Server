<?php 
// DB verbindung
$DBhost = 'localhost';
$DBname = 'ws';
$DBuser = 'marco';
$DBpw   = '62726mas';
mysql_connect($DBhost,$DBuser,$DBpw);
mysql_select_db($DBname);

$site = $_GET['site'];

?>