<?php
$server_host = 'localhost';
if(isset($_SERVER['HTTP_HOST'])) $server_host = $_SERVER['HTTP_HOST'];

if($server_host == 'localhost') {
	$config = $config_data + array(
		'site_title'	=> 'Survey',
		'site_url'		=> 'http://'.$server_host.'/Sites/community/makeadiff/makeadiff.in/apps/survey/',
		'library_url'	=> 'http://'.$server_host.'/Projects/Madapp/',
	);
} else {
	$config = $config_data + array(
		'site_title'	=> 'Survey',
		'site_url'		=> 'http://'.$server_host.'/apps/survey/',
		'library_url'	=> 'http://'.$server_host.'/madapp/',
	);
}
$config['site_home'] = $config_data['site_home'] . 'apps/survey/';
