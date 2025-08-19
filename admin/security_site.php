<?php
$secu=mysql_fetch_array(mysql_query("SELECT admin_pin FROM mt_config"));
	$ad_pin=$secu['admin_pin'];
	$mdadmin_pin=md5($secu['admin_pin']);
    $Empty_pin="000000000";
	$mdEmpty_pin=md5($Empty_pin);
	if(empty($ad_pin)){
	echo "<script language='javascript'>swal('ERROR SECURITY SITE','ท่านยังไม่ได้สร้างไซต์งาน','error').then(function () {
    window.location.href = 'index.php?page';}, function (dismiss) {if (dismiss === 'overlay') {
    window.location.href = 'index.php?page';}})</script>";
	
	
	
	}else{
 	if(!empty($_REQUEST['active'])){


	    $old=md5($_REQUEST['old']);
		$new=md5($_REQUEST['new']);
		$new1=$_REQUEST['new'];
		$con=md5($_REQUEST['con']);
	
	if($ad_pin==$mdEmpty_pin){
			
        if($new!=$con){

			echo "<script language='javascript'>swal('รหัสผ่านใหม่ไม่ตรงกัน!','ลองอีกครั้ง','error')</script>";
			
		}else{
    $sql=mysql_query("SELECT * FROM mt_config where customer_pin='".$_REQUEST['new']."' or user_pin='".$_REQUEST['new']."'");
	 $num=mysql_num_rows($sql);
	 if($num==0){
             $show_adminPIN=$new1;if($new1==""){$show_adminPIN="ว่าง";}
            if($new1==""){$new1="000000000";}
			mysql_query("UPDATE mt_config SET admin_pin='".md5($new1)."'");
			echo "<script language='javascript'>swal('บันทึกค่าสำเร็จแล้ว','รหัส ".$_SESSION['APIUser']." PIN คือ ".$show_adminPIN." ออกจากระบบ','success').then(function () {
    window.location.href = '../admin/logout.php';}, function (dismiss) {
  if (dismiss === 'overlay') {
    window.location.href = '../admin/logout.php';
   }})</script>";
          exit(0);
	 }else{echo "<script language='javascript'>swal('ผิดพลาด!','กรุณาลองอีกครั้ง','error')</script>";}
}
}else{

		$change=mysql_query("SELECT * FROM mt_config WHERE admin_pin='".$old."'");
		$num_pin=mysql_num_rows($change);		
		if($num_pin==0){
			echo "<script language='javascript'>swal('รหัสผ่านเก่าไม่ถูกต้อง!','ลองอีกครั้ง!','error')</script>";
			
		}else if($new!=$con){
			echo "<script language='javascript'>swal('รหัสผ่านใหม่ไม่ตรงกัน!','ลองอีกครั้ง!','error')</script>";
		
		}else{
			$show_adminPIN=$new1;if($new1==""){$show_adminPIN="ว่าง";}
			if($new1==""){$new1="000000000";}
			mysql_query("UPDATE mt_config SET admin_pin='".md5($new1)."'");
			echo "<script language='javascript'>swal('บันทึกค่าสำเร็จแล้ว!','รหัส ".$_SESSION['APIUser']." PIN คือ ".$show_adminPIN." ออกจากระบบ','success').then(function () {
    window.location.href = '../admin/logout.php';}, function (dismiss) {
  if (dismiss === 'overlay') {
    window.location.href = '../admin/logout.php';
   }})</script>";

			
			exit(0);
		}



}


}}	
						  
		?>

    <section class="content">


        <div class="<?php print panel_modify();?>">
            <div class="<?php print $panel_heading;?>"><strong>Security&nbsp;Site</strong>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="well">

                            <form id="pin" method="POST" action="">
                                <?php
						  
						 if(!empty($ad_pin)&&($ad_pin!=$mdEmpty_pin)){ ?>

                                    <div class="form-group">
                                        <label for="username" class="control-label">Old&nbsp;Security&nbsp;PIN</label>
                                        <input type="password" class="form-control" name="old" placeholder="กรุณาใส่รหัส PIN 4-8 หลัก" maxlength="8" required>
                                        <span class="help-block"></span>
                                    </div>
                                    <?php }?>
                                    <div class="form-group">
                                        <label for="username" class="control-label">New&nbsp;Security&nbsp;PIN</label>
                                        <input type="password" class="form-control" name="new" placeholder="กรุณาใส่รหัส PIN 4-8 หลัก" maxlength="8">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="control-label">Confirm&nbsp;New&nbsp;Security&nbsp;PIN</label>
                                        <input type="password" class="form-control" name="con" placeholder="กรุณาใส่รหัส PIN 4-8 หลัก" maxlength="8">
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">

                                            <button id="btnSave" value="pin" name="active" class="btn btn-success btn-block" type="submit"><i class="fa fa-check"></i>&nbsp;บันทึก</button>
                                        </div>
                                        <div class="col-xs-6 col-md-6 pull-right">
                                            <button id="btnSave" class="btn btn-danger  btn-block" type="reset"><i class="fa fa-refresh">&nbsp;&nbsp;</i>รีเซ็ต</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>

                </div>

    </section>
