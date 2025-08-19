<?php	
	session_start();		
	$API = new routeros_api();				
	//$API->debug = false;	
	//set_time_limit(160);
	
	$id=$_SESSION['id'];
	$status=$_SESSION['status'];
	$sql=mysql_query("SELECT * FROM mt_config WHERE mt_num='".$status."'");
	$result=mysql_fetch_array($sql);	
		$ip=$result['mt_ip'];
		$user=$result['mt_user'];
		$pass=$result['mt_pass'];
		$port_api=$result['port_api'];
		
		if($API->connect($ip, $user, $pass, $port_api)) {	
				
		}else{	
			echo "<script language='javascript'>alert('Disconnect')</script>";	
			echo "<meta http-equiv='refresh' content='0;url=../admin/index.php' />";
			exit(0);			
		}		
		
?>