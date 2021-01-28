<?php
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

function filterpost($str){
	$str 	= filter_input(INPUT_POST, $str, FILTER_SANITIZE_STRING);
	return $str;
}
function filterurl($str){
$input = preg_replace( "#^[^:/.]*[:/]+#i", "", $str );
	return $input;
}
function siteURL()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
}
function is_localhost() {
		
		// set the array for testing the local environment
		$whitelist = array( '127.0.0.1', '::1' );
		
		// check if the server is in the array
		if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
			
			// this is a local environment
			return true;
			
		}
		
	}
$lokal = is_localhost();
$link =  filterpost('link_web');
$site_urls = filterurl($link);
$site_url = rtrim($site_urls, '/');

$path =  filterpost('path');
if(!empty($path)){
$path = filterpost('path').'/';
}else{
$path = '';
}

$data = array();
$root = $_SERVER["DOCUMENT_ROOT"].'/';
$json_file=$root.$path.'data.json';
$str2 = '{
	"widget": {
		"url": "'.$site_url.'",
		"title": "'.filterpost('title').'",
		"desc": "'.filterpost('desc').'",
		"newtab": "'.filterpost('tab').'",
		"style": "1",
		"styletitle": "",
		"position": "right",
		"icon": "1",
		"responsive": "1",
		"zindex": "999",
		"mode": "2",
		"show": "1",
		"autolabel": "1",
		"auto": "",
		"autoscroll": "",
		"automobile": "",
		"color": "#81d742",
        		"xgen": [{
        		"agent": [{
    				"name": "'.filterpost('name').'",
    				"number": "'.filterpost('number').'",
    				"photo": "'.filterpost('photo').'",
    				"desc": "'.filterpost('desc2').'",
    				"role": "'.filterpost('role').'",
    				"message": "'.filterpost('message').'",
					"link_url": "'.filterpost('link_url').'",
    				"link_image": "'.filterpost('link_image').'",
    				"link_text": "'.filterpost('link_text').'"
						}]
			}]
	}
}';

$file2=fopen($json_file, 'w');
fwrite($file2, $str2);
fclose($file2);

$data = array('ok'=>'ok','msg'=>'file sudah di buat');
echo json_encode($data);