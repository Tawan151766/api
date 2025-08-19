<?php	
	if(!empty($_REQUEST['old'])){///827ccb0eea8a706c4c34a16891f84e7b////12345
		$id=$_SESSION['APIID'];
		$old=md5($_REQUEST['old']);
		$new=md5($_REQUEST['new']);
		$con=md5($_REQUEST['con']);		
		$sql=mysql_query("SELECT am_pass FROM am WHERE am_pass='".$old."'");
		$num=mysql_num_rows($sql);		
		if($num==0){
			echo "<script language='javascript'>swal('รหัสผ่านเก่าไม่ถูกต้อง!','กรุณาลองอีกครั้ง','error')</script>";
			//echo "<script language='javascript'>swal('Bad Old Password.')</script>";
			//echo "<script language='javascript'>window.history.back()</script>";
		}else if($new!=$con){
			echo "<script language='javascript'>swal('รหัสผ่านใหม่ไม่ตรงกัน',''กรุณาลองอีกครั้ง','error')</script>";
			//echo "<script language='javascript'>alert('Password Not Match')</script>";
			//echo "<script language='javascript'>window.history.back()</script>";
		}else{
			mysql_query("UPDATE am SET am_pass='".$new."' WHERE am_id='".$id."'");
			echo "<script language='javascript'>swal('บันทึกสำเร็จ!','บันทึกสำเร็จแล้ว Passward ใหม่คือ ".$_REQUEST['new']."','success').then(function () {
    window.location.href = 'index.php';}, function (dismiss) {
  if (dismiss === 'overlay') {
    window.location.href = 'index.php';
   }})</script>";

			//echo "<script language='javascript'>alert('Save Done')</script>";
			//echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
			exit(0);
		}
	}									   								
?>

    <section class="content">


        <div class="<?php print panel_modify();?>">
            <div class="<?php print $panel_heading;?>"><strong>เปลี่ยน&nbsp;Password</strong>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="well">

                            <form id="change_pass" method="POST" action="">
                                <div class="form-group">
                                    <label for="username" class="control-label">Password&nbsp;เดิม</label>
                                    <input type="password" class="form-control" name="old" placeholder="Old password.." required>
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="control-label">Password&nbsp;ใหม่</label>
                                    <input type="password" class="form-control" name="new" placeholder="New password.." required>
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="control-label">Password&nbsp;ใหม่อีกครั้ง</label>
                                    <input type="password" class="form-control" name="con" placeholder="Confirm password.." required>
                                    <span class="help-block"></span>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-md-6">

                                        <button id="btnSave" class="btn btn-success btn-block" type="submit"><i class="fa fa-check"></i>&nbsp;บันทึก</button>
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
