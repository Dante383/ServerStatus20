<?php

$array = array();
$uptime = filemtime('c:/pagefile.sys');
$array['uptime'] = date("d.m.Y H:i.s", $uptime);

$memo = win32_ps_stat_mem();
$memtotal = $memo['total_phys'];
$memfree = $memo['avail_phys'];
$memcache = $memo['avail_virtual'];

$memmath = $memcache + $memfree;
$memmath2 = $memmath / $memtotal * 100;
$memory = round($memmath2) . '%';

if ($memory >= "51%") { $memlevel = "success"; }
elseif ($memory <= "50%") { $memlevel = "warning"; }
elseif ($memory <= "35%") { $memlevel = "danger"; }

$array['memory'] = '<div class="progress progress-striped active">
<div class="bar bar-'.$memlevel.'" style="width: '.$memory.';">'.$memory.'</div>
</div>';

$hddtotal = disk_total_space("C:");
$hddfree = disk_free_space("C:");
$hddmath = $hddfree / $hddtotal * 100;
$hdd = round($hddmath) . '%';

if ($hdd >= "51%") { $hddlevel = "success"; }
elseif ($hdd <= "50%") { $hddlevel = "warning"; }
elseif ($hdd <= "35%") { $hddlevel = "danger"; }


$array['hdd'] = '<div class="progress progress-striped active">
<div class="bar bar-'.$hddlevel.'" style="width: '.$hdd.';">'.$hdd.'</div>
</div>';

$load = $memo['load'];
$array['load'] = $load;

$array['online'] = '<div class="progress">
<div class="bar bar-success" style="width: 100%;"><small>Up</small></div>
</div>';

echo json_encode($array);
