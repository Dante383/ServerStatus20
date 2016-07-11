<?php
require_once('config.php');
global $sJavascript, $sTable;

$query = $db->query("SELECT * FROM servers ORDER BY id");
if($query == false)
{
	die("Cannot get servers.");
}
$servers = $query->fetchAll();

	
//include($index);

echo $twig->render(''.$template.'/index.twig', array('title' => $config['title'], 'servers' => $servers, 'refresh' => $config['refresh'], 'hostname' => $config['hostname']));
?>
