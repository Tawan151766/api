<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');
			include_once('../include/account.php');
			include_once('../include/convert.php');
			$ARRAY1 = $API->comm("/ip/hotspot/print");
				
			
?>

    <style type="text/css">
        <!-- .style1 {
            color: #0000FF
        }

        .style2 {
            color: #990000
        }

        }

        -->

    </style>
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="<?php print panel_modify();?>">
                    <div class="<?php print $panel_heading;?>">
                        <strong><i class="fa fa-folder-open"></i>&nbsp;เพิ่มโปรไฟล์ธรรมดา</strong>
                    </div>
                    <div class="panel-body">
                        <form name="login" action="index.php?page=con_addprofile_process" method="post">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="couponCode"><span class="style1">Profile Name</span></label>
                                        <input name="name" type="text" placeholder="Profile Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class=" style1">Price</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดราคา ของ profile"></label>
                                        <input name="price" type="text" placeholder="Ex.150" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class=" style1">Session Timeout</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดเวลาเชื่อมต่อ สูงสุด"></label>
                                        <input name="session" type="text" placeholder="Ex.04:00:00" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class=" style1">Idle Timeout</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดเวลา logout userออกจากระบบถ้าไม่ได้ใช้งาน"></label>
                                        <input name="idle" type="text" placeholder="Ex.00:02:00" class="form-control" value="none">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class=" style1">Keepalive Timeout</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดเวลา logout userออกจากระบบถ้าไม่ได้เชื่อมต่อ"></label>
                                        <input name="keep" type="text" placeholder="Ex.01:00:00" class="form-control" value="01:00:00">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class="style1 ">Status Autorefresh</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="ตั้งเวลาอัพเดทสถานะ ของ user"></label>
                                        <input name="auto" type="text" placeholder="Ex.00:01:00" value="00:01:00" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class=" style1">Rate Limit (rx/tx)</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดค่าความเร็วอินเตอร์เน็ต ของแพ็คเกจ Ex.512K/5M"></label>
                                        <input name="limit" type="text" placeholder="upload/download" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="cardCVC"><span class="style1">Shared Users</span> <img src="../img/help.png" width="16" height="16"  class="no2" data-toggle="tooltip" data-placement="right" title="กำหนดจำนวนเครื่องที่สามารถใช้พร้อมกันได้ ต่อ 1user"></label>
                                        <input name="use" type="text" value="1" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-7 col-md-9 ">
                                    <div class="form-group">
                                        <?php
		                $bottonbtn_success="on";
				$text_success="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class=\"fa fa-check\"></i>&nbsp;บันทึก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
               echo button_btn_submit_account($account,$text_success,$bottonbtn_success);
				?>


                                            <button id="btnSave" class="btn btn-danger" type="reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i>&nbsp;รีเซ็ต&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
