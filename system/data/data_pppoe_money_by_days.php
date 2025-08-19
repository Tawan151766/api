<?php
require_once('key.php');

$ipRouteros = $ip;
$Username=$user;
$Pass=$pass;
$api_port=$port_api;
$API = new routeros_api();
	$API->debug = false;
	if ($API->connect($ipRouteros , $Username , $Pass, $api_port)) {

 #############################################################################################
 $sql="SELECT * FROM pppoe_money WHERE mt_id='".$id."'";
													$query=mysql_query($sql);	
													
													$rows = array();
													While($result=mysql_fetch_array($query)){

					$utc_data=substr("".$result['utc_time_for_chart']."",-20,10);	
				$rows[]=array(($utc_data)."000",$result['money']);
				}
	###################################################################################											
												}
	
//	$hot_days_money = array();
	//array_push($hot_days_money,$rows);
	//array_push($hot_days_money,$rows2);
	print json_encode($rows, JSON_NUMERIC_CHECK);

?>