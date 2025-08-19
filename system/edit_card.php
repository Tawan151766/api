<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');
			include_once('../include/account.php');
			include_once('../include/convert.php');
					
			
				
				if(!empty($_REQUEST['profile'])){
                        $pro_name=$_REQUEST['profile'];
						$time_limit=$_REQUEST['time_limit'];					
						$home_page=$_REQUEST['home_page'];
						$vat=$_REQUEST['vat'];
						$package_name=$_REQUEST['package_name'];
						$card_name=$_REQUEST['card_name'];
						$phone=$_REQUEST['phone'];
						$server_ip=$_REQUEST['server_ip'];
						$color="#".$_REQUEST['color']."";
	                   mysql_query("UPDATE mt_profile SET package_name='".$package_name."',card_name='".$card_name."', home_page='".$home_page."', time_limit='".$time_limit."', vat='".$vat."', phone='".$phone."', server_ip='".$server_ip."', color='".$color."' WHERE pro_name='".$pro_name."'");

						echo "<script language='javascript'>swal('บันทึกสำเร็จ!','แก้ไขคูปอง ".$pro_name." สำเร็จแล้ว','success').then(function () {
    window.location.href = 'index.php?page=card';}, function (dismiss) {if (dismiss === 'overlay') {
    window.location.href = 'index.php?page=card';}})</script>";
						exit();
						}
						
			
									   								
?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        <!-- .style2 {
            color: #0000FF
        }

        .style1 {
            color: #990000
        }

        -->

    </style>
    <section class="content">

        <div class="row">
            <div class="col-lg-12">

                <div class="<?php print panel_modify();?>">
                    <div class="<?php print $panel_heading;?>">
                        <strong><i class="fa fa-credit-card"></i>&nbsp;แก้ไขข้อมูลบัตรคูปอง</strong>
                    </div>

                    <div class="panel-body">
                        <form name="login" action="" method="post">
                            <?php
					$result=mysql_fetch_array(mysql_query("SELECT * FROM mt_profile WHERE pro_name='".$_GET['name']."'"));
					?>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="cardNumber"><span class="style2">โปรไฟล์</span></label>
                                            <option type="text" class="form-control">
                                                <?php echo $result['pro_name']; ?>
                                            </option>
                                            <!--hide  -->
                                            <input type="hidden" value="<?php echo $result['pro_name'];?>" name="profile">
                                            <!--hide  -->
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xs-12  col-md-6">
                                        <div class="form-group">
                                            <label for="cardNumber"><span class="style2">แพ๊คเกจ</span></label>
                                            <input name="package_name" id="package_name" placeholder=" Ex. Package Name" class="form-control" value="<?php echo $result['package_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12  col-md-6">
                                        <div class="form-group">
                                            <label for="cardNumber"><span class="style2">ชื่อคูปอง</span></label>
                                            <input name="card_name" id="card_name" placeholder=" Ex. WIFI CARD " class="form-control" value="<?php echo $result['card_name']; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12  col-md-6">
                                        <div class="form-group">
                                            <label for="cardExpiry"><span class=" style2">โฮมเพจ</span></label>
                                            <img src="../img/help.png" width="16" height="16" data-toggle="tooltip" data-placement="right" title="ip login">
                                            <input name="home_page" type="text" class="form-control" placeholder="Ex.172.0.0.1/login" value="<?php echo $result['home_page']; ?>">

                                        </div>
                                    </div>
                                    <div class="col-xs-12  col-md-6">
                                        <div class="form-group">
                                            <label for="cardCVC"><span class="style2">เวลาใช้งาน</span></label>
                                            <img src="../img/help.png" width="16" height="16" data-toggle="tooltip" data-placement="right" title="จำนวนวันที่จะกำหนดให้ใช้งาน">
                                            <input name="time_limit" type="text" class="form-control" placeholder="Ex.อายุใช้งาน 1วัน" value="<?php echo $result['time_limit']; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12  col-md-6">
                                        <div class="form-group">
                                            <label for="cardExpiry"><span class=" style2">VAT.</span></label>
                                            <img src="../img/help.png" width="16" height="16" data-toggle="tooltip" data-placement="right" title="ราคา vat + Price">
                                            <input name="vat" type="text" class="form-control" placeholder="Ex.5 or 7" value="<?php echo $result['vat']; ?>">

                                        </div>
                                    </div>
                                    <div class="col-xs-12  col-md-6">
                                        <div class="form-group">
                                            <label for="cardCVC"><span class="style2">Server IP</span></label>
                                            <img src="../img/help.png" width="16" height="16" data-toggle="tooltip" data-placement="right" title="IP server Login ด้วยQR">
                                            <input name="server_ip" type="text" class="form-control" placeholder="Ex.192.168.10.1" value="<?php echo $result['server_ip']; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12  col-md-6">
                                        <div class="form-group">
                                            <label for="cardExpiry"><span class=" style2">เบอร์โทร</span></label>
                                            <img src="../img/help.png" width="16" height="16" data-toggle="tooltip" data-placement="right" title="เบอร์ติอต่อ">
                                            <input name="phone" type="text" placeholder="Ex.063-2343965" class="form-control" value="<?php echo $result['phone']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12  col-md-6">
                                        <div class="form-group">
                                            <label for="cardExpiry"><span class=" style2">สีคูปอง</span></label>
                                            <img src="../img/help.png" width="16" height="16" data-toggle="tooltip" data-placement="right" title="กำหนดสีพื้นหลังของบัตร"><br>
                                            <input name="color" id="color" class="jscolor" value="<?php echo $result['color']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 ">
                                        <?php
									    $bottonbtn_success="on";
				$text_success="&nbsp;&nbsp;&nbsp;<i class=\"fa fa-check\"></i>&nbsp;บันทึก&nbsp;&nbsp;&nbsp;";
               echo button_btn_submit_account($account,$text_success,$bottonbtn_success);
				?>
                                            <button id="btnCancel" class="btn btn-danger" type="reset" Onclick="javascript:history.back()">&nbsp;&nbsp;&nbsp;<i class="fa fa-times"></i>&nbsp;ยกเลิก&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;

                                            <span class="hidden-xs"> <button id="btnSave" class="btn btn-warning" type="reset">&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i>&nbsp;รีเซ็ต&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                            </span>

                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
