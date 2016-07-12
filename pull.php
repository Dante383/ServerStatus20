<?php
require_once('config.php');

function ping($host,$port=80,$timeout=6)
{
        $fsock = fsockopen($host, $port, $errno, $errstr, $timeout);
        if ( ! $fsock )
        {
                return FALSE;
        }
        else
        {
                return TRUE;
        }
}

function get_data($url) {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$sId = $_GET['url'];
if(is_numeric($sId)){
	$data = $db->prepare("SELECT * FROM `servers` WHERE `id` = :id");
	$data->bindValue(":id", $sId, PDO::PARAM_INT);
	$data->execute();
	$result = $data->fetch();
	$url = "http://".$result['url']."/uptime.php";
	$output = get_data($url);
	$temp = json_decode($output, true);
	//echo $output;
	if(($output == NULL) or ($output === false) or (!isset($temp['uptime'])))
	{

		// try ping IP 
		$soc = ping($result['url']);
		if(!$soc)
		{
			$array = array();
			$array['uptime'] = '
			<div class="progress">
				<div class="bar bar-danger" style="width: 100%;"><small>Down</small></div>
			</div>
			';
			$array['load'] = '
			<div class="progress">
				<div class="bar bar-danger" style="width: 100%;"><small>Down</small></div>
			</div>
			';
			$array['online'] = '
			<div class="progress">
				<div class="bar bar-danger" style="width: 100%;"><small>Down</small></div>
			</div>
			';
			echo json_encode($array);
		}
		else
		{
			$array = array();
			$array['uptime'] = '
			<div class="progress">
				<div class="bar bar-info" style="width: 100%;"><small>n/a</small></div>
			</div>
			';
			$array['load'] = '
			<div class="progress">
				<div class="bar bar-info" style="width: 100%;"><small>n/a</small></div>
			</div>
			';
			$array['online'] = '
			<div class="progress">
				<div class="bar bar-success" style="width: 100%;"><small>Up</small></div>
			</div>';
			$array['memory'] = '
			<div class="progress progress-striped active">
					<div class="bar bar-info" style="width: 100%;"><small>n/a</small></div>
			</div>
			';
			$array['hdd'] = '
			<div class="progress progress-striped active">
				<div class="bar bar-info" style="width: 100%;"><small>n/a</small></div>
			</div>
			';
			echo json_encode($array);
		}
		
	} else {
		$data = json_decode($output, true);
		$data["load"] = number_format($data["load"], 2);
		echo json_encode($data);
	}
}