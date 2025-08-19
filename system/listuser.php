<?php
			include_once('../config/routeros_api.class.php');
			include_once('../include/conn.php');
			include_once('../include/account.php');
			include_once('../include/convert.php');
			
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="<?php print panel_modify();?>">
				<div class="<?php print $panel_heading;?>">
					<strong><i class="fa fa-address-card"></i>&nbsp;บัตรคูปอง</strong>
				</div>
				<div class="panel-body">
					<span><a href="index.php?page=listuser" class="btn btn-default fa fa-rotate-right"></a> </span><br><br>
					<table class="table table-striped table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>ลำดับที่</th>
								<th>โปรไฟล์</th>
								<th class="text-center">วันที่</th>
								<th>GROUP NAME</th>
								<th>จำนวน</th>
								<th class="text-center">จัดการ</th>
							</tr>
						</thead>
						<tbody>
							<?php
																			$fileName = "../csv/org_csv/test".date("YmdHi").".csv";
																				$id=$_SESSION['id'];
												mysql_query("UPDATE mt_gen SET group_code='' WHERE mt_id='".$id."'");
																				$sql="SELECT * FROM mt_gen WHERE mt_id='".$id."' GROUP BY csv_code";
																					$query=mysql_query($sql);
																				$no==1;
																					While($result=mysql_fetch_array($query)){
																				$no++;
										
																		echo "<tr>";
																														echo "<td>".$no."</td>";
																						echo "<td>".$result['profile']."</td>";
																						echo "<td class=\"text-center\">".$result['date']."</td>";
																						echo "<td>".$result['group_name']."</td>";
																						echo "<td>";$count=mysql_fetch_array(mysql_query("SELECT COUNT(user) as total FROM `mt_gen` WHERE csv_code='".$result['csv_code']."'"));
																							echo $count['total'];
																							echo "<td class=\"text-right\">";
																								echo"<a class=\"btn btn-black btn-xs\"  title= \"click to view\" href='index.php?page=user&id=".$result['csv_code']."'><span class=\"fa fa-list\"></span>&nbsp;ดูรายชื่อ&nbsp;</a>&nbsp;";
										###########################################################
													$xs_print="on";
													$href_print="href='../csv/print_card.php?to=csv_code&id=".$result['csv_code']."' target=\"_blank \"";
															echo button_btn_xs_account($account,$href_print,'','','','','','',$xs_print,'');
													$xs_export="on";
													$onclick_csv="onclick=\"window.open('../csv/export_csv.php?to=csv_code&code=hotspot&id=".$result['csv_code']."')\"";
															echo button_btn_xs_account($account,$onclick_csv,'','','','','','','',$xs_export);
																								
																								
																							echo "</td>";
																						echo "</tr>";
								
																					
																					}
								?>
							</tbody>
						</table>
						<?php
													echo "<a class=\"btn btn-success \"  title= \"ดูผู้ใช้งานทั้งหมด\" href='index.php?page=all_data_users&id=" . $id . "'><span class=\"fa fa-list\"></span>&nbsp;ผู้ใช้งานทั้งหมด</a>&nbsp;&nbsp;&nbsp;<a class=\"btn btn-warning \"  title= \ดูบัตรคูปอง\" href='index.php?page=card'><span class=\"fa fa-credit-card\"></span>&nbsp;ดูบัตรคูปอง</a>&nbsp;&nbsp;&nbsp;";
													
						?>
					</div>
				</div>
			</div>
		</div>
	</section>