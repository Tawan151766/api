<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');
			include_once('../include/account.php');
			include_once('../include/convert.php');
																																
			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");
			$ARRAY3 = $API->comm("/tool/user-manager/profile/print");
			$ARRAY4 = $API->comm("/tool/user-manager/profile/limitation/print");
		
		if($_GET['cancel']=="yes"){mysql_query("DELETE FROM mt_edit WHERE mt_id =  '".$id."'");
				//echo "<meta http-equiv='refresh' content='0;url=index.php?page=mikrotikuser' />";
				}
		if($_REQUEST['check']!=""){	
			if($_REQUEST['active']=="remove"){
				for($i=0;$i < count($_REQUEST['check']);$i++){
					
					$profile=$_REQUEST['check'][$i];
					$num=count($_REQUEST['check']);
					$num3 =count($ARRAY3);
					$num4 =count($ARRAY4);
					
					
					mysql_query("DELETE FROM mt_profile WHERE pro_name = '".$profile."' ");
					mysql_query("DELETE FROM mt_gen WHERE user = '".$profile."' ");
		
		
         for($iii=0; $iii<$num3; $iii++){
					if($ARRAY3[$iii]['name']==$profile){
						$numbers = $iii;
		
		$ARRAY2 = $API->comm("/tool/user-manager/profile/remove", array(
											"numbers" => $numbers,));
											}}
		for($iiii=0; $iiii<$num4; $iiii++){
					if($ARRAY4[$iiii]['name']==$profile){
						$numbers = $iiii;
						
		$ARRAY2 = $API->comm("/tool/user-manager/profile/limitation/remove", array(
											"numbers" => $numbers, ));
		}}

		
		$ARRAY2 = $API->comm("/tool/user-manager/user/remove", array(
											"numbers" => $profile,
			                            ));
		$ARRAY2 = $API->comm("/ip/hotspot/user/profile/remove", array(
											"numbers" => $profile,
										));
		
		
							
				}
				//echo "<script>alert('ลบ สำเร็จแล้ว.')</script>";
				//echo "<meta http-equiv='refresh' content='0;url=index.php?page=profilelist' />";
				echo "<script language='javascript'>swal('ลบเรียบร้อยแล้ว!','ลบโปรไฟล์จำนวน ".$num." สำเร็จแล้ว','success').then(function () {
    window.location.href = 'index.php?page=profilelist';}, function (dismiss) {
  if (dismiss === 'overlay') {
    
     window.location.href = 'index.php?page=profilelist';
   
  }
})</script>";
				exit();
			}
				########################################################################################
			if($_REQUEST['active']=="transfer"){
			
			$group_code=round(date('YmdHi.s'));
			$num_check=0;
				for($i=0;$i < count($_REQUEST['check']);$i++){
					$pro_add=$_REQUEST['check'][$i];
					#######ADD################
					$sql1="SELECT * FROM mt_profile WHERE pro_name='".$pro_add."'";
		$query1=mysql_query($sql1);
		$rows1=mysql_num_rows($query1);
		if($rows1 >0){
		$query2=mysql_query("SELECT * FROM mt_profile WHERE mt_id='".$id."'");
	              while($result=mysql_fetch_array($query2)){
         if($pro_add==$result['pro_name']){
         echo "<script language='javascript'>swal('เกิดข้อผิดพลาด!','มีชื่อนี้แล้วใน database กรุณาเลือกใหม่','error').then(function () {window.location.href='index.php?page=profilelist';}, function (dismiss) {if (dismiss === 'overlay') {window.location.href = 'index.php?page=profilelist';}})</script>";
		 }else{
		 echo "<script language='javascript'>swal('เกิดข้อผิดพลาด!','มีชื่อนี้แล้วใน database กรุณาเลือกใหม่','error').then(function () {window.location.href='index.php?page=profilelist';}, function (dismiss) {if (dismiss === 'overlay') {window.location.href = 'index.php?page=profilelist';}})</script>";
		 } }
		 if(Empty($result['pro_name'])){ echo "<script language='javascript'>swal('เกิดข้อผิดพลาด!','มีชื่อนี้แล้วใน database กรุณาเลือกใหม่','error').then(function () {window.location.href='index.php?page=profilelist';}, function (dismiss) {if (dismiss === 'overlay') {window.location.href = 'index.php?page=profilelist';}})</script>";}
		}else{
		########ADD########
					$num=count($_REQUEST['check']);
			mysql_query("INSERT INTO mt_edit VALUE('','".$pro_add."','".$group_code."','".$id."')");  }}
			$sql="SELECT * FROM mt_edit WHERE group_code='".$group_code."'";
			if(!EMPTY($num)){
				 $query=mysql_query($sql);
            $rows=mysql_num_rows($query);
			if($rows==$num){
				
	echo "<script language='javascript'>swal({
                    title: 'คุณแน่ใจไหม?',
                    text: 'ต้องการจะเพิ่มโปรไฟล์เข้า Database " . $rows . " จำนวน ใช่หรือไม่',
                    type: 'warning',
					//allowOutsideClick: false,
					//showCloseButton: true,
					 showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ใช่',
                    cancelButtonText: 'ไม่ใช่',
                    }).then(
                    function () {
                    window.location.href = 'index.php?page=hotspot_transfer_profile&group_code=".$group_code."';}
					, function (dismiss) {
                       // dismiss can be 'cancel', 'overlay',
                         // 'close', and 'timer'
                           if (dismiss === 'cancel','overlay') {
						   window.location.href = 'index.php?page=profilelist&cancel=yes';}})</script>";
				exit();
				
				
				}else{echo "<script language='javascript'>swal('เกิดข้อผิดพลาด','ในการนับจำนวน กรุณาลองใหม่','error').then(function () {window.location.href='index.php?page=profilelist&cancel=yes';}, function (dismiss) {if (dismiss === 'overlay') {window.location.href = 'index.php?page=profilelist&cancel=yes';}})</script>";}
					
					
					
					}}
			
	#######################################################################################
						
		}
		
									   								
	
?>
    <section class="content">

        <!--  -->
        <form name="name" action="" method="post">
            <div class="<?php print panel_modify();?>">
                <div class="<?php print $panel_heading;?>">
                    <i class="fa fa-bar-chart-o"></i><strong>รายชื่อโปรไฟล์</strong>
                </div>
                <div class="panel-body">
                    <?php 
									$tran_use="on";
									$text="select transfer to database profile";
							  $tran=botton_small_account($account,'','','','',$tran_use,$text);
							  echo "<span  style=\"float: right; \">".$tran."</span>";
	                       ?><br><br>
                    <table class="table table-striped table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="3%">
                                    <center><input type="checkbox" id="selecctall" />
                                </th>
                                <th>ลำดับที่</th>
                                <th>ชื่อโปรไฟล์</th>
                                <th>Rate Limit</th>
                                <th>Session Time</th>
                                <th>Idle Timeout</th>
                                <th>Shared User</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
													$i=0;
													$num =count($ARRAY);													
													for($i=0; $i<$num; $i++){	
													$no=$i+1;
													echo "<tr>";
														echo "<td><center><input class=\"checkbox1\" type=\"checkbox\" name=\"check[]\" id=\"check[]\" value=".$ARRAY[$i]['name']."></center></td>";		
													    echo "<td>".$no."</td>";																																							
														echo "<td>".$ARRAY[$i]['name']."</td>";
														echo "<td>";
															if($ARRAY[$i]['rate-limit']==""){
																echo "Unlimited";
															}else{
																echo $ARRAY[$i]['rate-limit'];
															}																
														echo "</td>";
														echo "<td>".$ARRAY[$i]['session-timeout']."</td>";
														echo "<td>".$ARRAY[$i]['idle-timeout']."</td>";
														echo "<td>".$ARRAY[$i]['shared-users']."</td>";
														//echo "<td><a href='index.php?page=editprofile&name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-warning\"><i class=\"fa fa-pencil-square-o\" title='Edit Profile'></i></button></a></td>";
														echo "<td><a class='btn btn-warning btn-xs' title=\"click to edit\" href='index.php?page=editprofile&name=".$ARRAY[$i]['name']."'><span class=\"glyphicon glyphicon-edit\"></span>&nbsp;แก้ไข&nbsp;</a></td>";
														
													echo "</tr>";
													}
												?>


                    </table>
                    <div class="form-group input-group">

                        <?php

									    $bottonbtn_danger="on";
				$text_danger="<i class=\"fa fa-trash\"></i>&nbsp;ลบ&nbsp;";
               echo button_btn_submit_account($account,$text_danger,'',$bottonbtn_danger);
				                       ?>


                    </div>
                </div>
            </div>
        </form>

    </section>
