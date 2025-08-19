<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');
			include_once('../include/account.php');
			include_once('../include/convert.php');
			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");
			$group_code=$_GET['group_code'];
			$login=":local whouser \$user;:local whoip \$address;:local macaddr [/ip hotspot active get [find address=\$whoip] mac-address];:log info \"user logged in: \$whouser IP: \$whoip Mac: \$macaddr\";{:local date [/system clock get date ];:local time [/system clock get time ];:if ( [/ip hotspot user get \$user comment ] = \"\" ) do={[/ip hotspot user set \$user comment=\"\$date \$time\"];:log info \"New Hotspot user logged in: \$whouser\";}}";
    $logout=":log info \"\$user (\$address): logged out: \$cause \";"; 
if($_REQUEST['active']!=''){
    $num_check=0;
	$query=mysql_query("SELECT * FROM mt_edit WHERE group_code='".$group_code."'");
					while($result=mysql_fetch_array($query)){
														$ii++;
		
		$price=$_REQUEST['price'.$result['user'].''];
		$sql="SELECT * FROM mt_profile WHERE pro_name='".$result['user']."'";
		$query2=mysql_query($sql);
		$rows=mysql_num_rows($query2);
		$num =count($ARRAY);
	for($i=0; $i<$num; $i++){													
	if($ARRAY[$i]['name']==$result['user']){
		
		if($rows>0){
	$num_set=$num_set+($num_check+1);
	mysql_query("UPDATE mt_profile SET pro_name='".$result['user']."',pro_session='".$ARRAY[$i]['session-timeout']."',
	pro_idle='".$ARRAY[$i]['idle-timeout']."',
	pro_keepalive='".$ARRAY[$i]['keepalive-timeout']."',
	pro_autorefresh='".$ARRAY[$i]['status-autorefresh']."',
	pro_users='".$ARRAY[$i]['shared-users']."',
	pro_limit='".$ARRAY[$i]['rate-limit']."',
	pro_price='".$price."'
	 WHERE pro_name='".$result['user']."'");
			}else{
	$num_add=$num_add+($num_check+1);
    $name=$ARRAY[$i]['name'];
	$db_session=$ARRAY[$i]['session-timeout'];
    $idle=$ARRAY[$i]['idle-timeout'];
    $keep=$ARRAY[$i]['keepalive-timeout'];
    $auto=$ARRAY[$i]['status-autorefresh'];
	$use=$ARRAY[$i]['shared-users'];
    $limit=$ARRAY[$i]['rate-limit'];
    $API->comm("/ip/hotspot/user/profile/set", array(
									
									"on-login" => $login,
				                    "on-logout" => $logout,
									"numbers" => $name
								));
	
	
	mysql_query("INSERT INTO mt_profile VALUE('".$name."','".$db_session."','".$idle."','".$keep."','".$auto."','','".$use."','".$limit."','".$price."','','','','','','','','','".$id."')");		
			}

           
			

	}}}
	echo "<script language='javascript'>swal('โอนถ่ายข้อมูลสำเร็จแล้ว!','เพิ่มโปรไฟล์เข้า Database สำเร็จแล้ว จำนวนทั้งหมด ".($num_set+$num_add)."รายการ ".($num_add+0)." รายการ','success').then(function () {
    window.location.href ='index.php?page=profilelist&cancel=yes';}, function (dismiss) {
  if (dismiss === 'overlay') {
    window.location.href ='index.php?page=profilelist&cancel=yes';
   }})</script>";
		exit();	
		
		}?>

<style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {color: #990000}
-->
</style>
<section class="content"> 

 <form name="login" action="" method="post">
 <div class="row">
         <div class="col-lg-12" >
            <div class="<?php print panel_modify();?>">
                <div class="<?php print $panel_heading;?>" >
                    <strong><i class="fa fa-exchange"></i>&nbsp;&nbsp;Hotspot Transfer Profile</strong>
                    <?php print $date_time_show;?></div>                    
              
                <div class="panel-body">
<?php
$query=mysql_query("SELECT * FROM mt_edit WHERE group_code='".$group_code."'");
												$i=0;
													while($result=mysql_fetch_array($query)){
														$i++;?>
				
				 <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="couponCode"><span class="style1">Profile Name</span></label>
                               <option  type="text"   class="form-control" required ><?php echo $result['user']; ?></option>
                                </div>                            
                            </div>
                        <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                       <label for="cardExpiry"><span class=" style1">Price <?php echo $result['user']; ?></span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดราคา ของ profile <?php echo $result['user']; ?>"></label>
	<?php $profile=mysql_fetch_array(mysql_query("SELECT * FROM mt_profile WHERE pro_name='".$result['user']."'"));?>
                         <input name="price<?php echo $result['user'];?>" type="text" placeholder="Ex.150" value="<?php echo $profile['pro_price']; ?>" class="form-control" required>
                               </div>
							   </div>
                        </div>   
					  <?php }?>
                           
							<br>
							<br>
							<div class="row">
						<div class="col-md-7 " > 

						
						 <?php
		               
						 $bottonbtn_success="on";
				$text_success="<i class=\"fa fa-check\"></i>&nbsp;ยืนยัน";
               echo button_btn_submit_account($account,$text_success,$bottonbtn_success);
				?>
				

				
				<button id="btnCancel" class="btn btn-danger" type="reset"  Onclick="window.location.href = 'index.php?page=profilelist&cancel=yes'"><i class="fa fa-times"></i>&nbsp;ยกเลิก</button>
				</div>
				</div>
				

				
				 </div>
				 </div>
				 </div>
				 </div>
				  </form>
						
                                    
                     
  </section>