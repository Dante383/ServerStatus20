<?php
require_once('vendor/autoload.php');

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

$dbConf = [];
$dbConf['host']= 'localhost';
$dbConf['user'] = 'root';
$dbConf['pass'] = '';
$dbConf['database'] = 'uptime';
$dbConf['engine'] = 'mysql';

$config = [];
$config['title'] = 'Server status monitor';
$config['refresh'] = "5000";
$config['hostname'] = "http://localhost/uptime";

try {
	$db = new PDO($dbConf['engine'].':host='.$dbConf['host'].';dbname='.$dbConf['database'].';encoding=utf8', $dbConf['user'], $dbConf['pass']);
} 
catch(PDOException $e) {
	die("Can't connect to database.");
}

if(isset($_GET['template']))
{
	$template = $_GET['template'];
}
else
{
	$template = 'dark';
}

?>
