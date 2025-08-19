<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');
			include_once('../include/account.php');
			include_once('../include/convert.php');																													
			
		
		?>
<section class="content">

    <form name="name" action="" method="post">
        <div class="<?php print panel_modify();?>">
            <div class="<?php print $panel_heading;?>"><i class="fa fa-credit-card"></i>
                <strong> PPPoE Card </strong>
                <?php print $date_time_show;?>
            </div>
            <div class="panel-body">
                <span style="color:#ffffff;
float: left;
"><a href="index.php?page=pppoe_dtb_user" class="btn btn-default fa fa-arrow-left"></a>&nbsp;<a href="index.php?page=pppoe_card" class="btn btn-default fa fa-rotate-right"></a> </span><br><br>

                <table class="table table-striped table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>โปรไฟล์</th>
                            <th>แพ๊คเกจ</th>
                            <th>ชื่อคูปอง</th>
                            <th>จำกัดข้อมูล</th>
                            <th>จำกัดเวลา</th>
                            <th>ราคา+VAT</th>
                            <th>เบอร์โทร</th>
                            <th>Server IP</th>
                            <th>สี</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

													$id=$_SESSION['id'];
													$sql="SELECT * FROM pppoe_pro WHERE mt_id='".$id."'";
													$query=mysql_query($sql);	
													$no==1;
													While($result=mysql_fetch_array($query)){	
													$no++;
													echo "<tr>";
														 echo "<td>".$no."</td>";																		echo"<td>".$result['pro_name']."</td>";	
														  echo"<td>".$result['package_name']."</td>";
														 echo"<td>".$result['card_name']."</td>";
														
														echo "<td>".$result['data_limit']."</td>";
														echo "<td>".$result['time_limit']."</td>";
														echo "<td>".$result['pro_price']."+".$result['vat']."</td>";
														echo "<td>".$result['phone']."</td>";
														echo "<td>".$result['server_ip']."</td>";
														echo "<td><span style=\"color:".$result['color'].";\">".$result['color']."  <i class=\"fa fa-circle\"></i></span> </td>";
														echo "<td><a class='btn btn-warning btn-xs' title=\"click to edit\" href='index.php?page=edit_pppoe_card&name=".$result['pro_name']."'><span class=\"glyphicon glyphicon-edit\"></span> แก้ไข  </a></td>";
														
													echo "</tr>";
													}
												?>

                    </tbody>
                </table>
            </div>
        </div>
    </form>

</section>
