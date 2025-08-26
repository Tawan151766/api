<style>
    /*  styles for dashboard */
    
    .panel-heading .btn-box-tool,
    .panel-heading .box-tools,
    .dashboard-custom-header .close,
    .dashboard-custom-header .btn-close {
        display: none !important;
    }
    
    .dashboard-custom-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 25px;
        border-radius: 15px;
        margin-bottom: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .dashboard-custom-header h1 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
        display: inline-block;
    }

    .dashboard-datetime {
        opacity: 0.95;
        font-size: 16px;
        margin-top: 8px;
        font-weight: 400;
        letter-spacing: 0.5px;
    }

    .dashboard-datetime i {
        font-size: 16px;
        margin-right: 8px;
    }

    .dashboard-security-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        background: rgba(255,255,255,0.2);
        color: white !important;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s;
    }

    .dashboard-security-badge:hover {
        background: rgba(255,255,255,0.3);
        transform: scale(1.05);
        color: white !important;
        text-decoration: none;
    }

    .server-custom-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .server-table-header {
        background: linear-gradient(135deg, #f6f8fb 0%, #ffffff 100%);
        padding: 18px 25px;
        border-bottom: 1px solid #e5e7eb;
        font-weight: 600;
        font-size: 16px;
    }

    .server-custom-table {
        margin: 0;
        width: 100%;
    }

    .server-custom-table thead th {
        background: #f8f9fa;
        border: none;
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
        padding: 15px;
    }

    .server-custom-table tbody tr {
        border-bottom: 1px solid #f1f3f5;
        transition: all 0.2s;
    }

    .server-custom-table tbody tr:hover {
        background: #f8f9fa;
    }

    .server-custom-table tbody tr:last-child {
        border-bottom: none;
    }

    .server-custom-table td {
        padding: 15px;
        vertical-align: middle;
        border: none;
    }

    .badge-online {
        background: linear-gradient(135deg, #34d399, #10b981);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .badge-offline {
        background: linear-gradient(135deg, #f87171, #ef4444);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .btn-custom-action {
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        margin: 2px;
        border: none;
        transition: all 0.2s;
        text-decoration: none !important;
        display: inline-block;
        cursor: pointer;
    }

    .btn-custom-edit {
        background: #fef3c7;
        color: #92400e !important;
    }

    .btn-custom-edit:hover {
        background: #fde68a;
        transform: translateY(-2px);
        color: #92400e !important;
    }

    .btn-custom-manage {
        background: #dbeafe;
        color: #1e40af !important;
    }

    .btn-custom-manage:hover {
        background: #bfdbfe;
        transform: translateY(-2px);
        color: #1e40af !important;
    }

    .btn-custom-web {
        background: #1f2937;
        color: white !important;
    }

    .btn-custom-web:hover {
        background: #111827;
        transform: translateY(-2px);
        color: white !important;
    }

    .btn-custom-delete {
        background: #fee2e2;
        color: #991b1b !important;
    }

    .btn-custom-delete:hover {
        background: #fecaca;
        transform: translateY(-2px);
        color: #991b1b !important;
    }

    .btn-custom-login {
        background: linear-gradient(135deg, #34d399, #10b981);
        color: white !important;
    }

    .btn-custom-login:hover {
        background: linear-gradient(135deg, #10b981, #059669);
        transform: translateY(-2px);
        color: white !important;
    }

    .btn-custom-disabled {
        background: #e5e7eb;
        color: #9ca3af !important;
        cursor: not-allowed;
        pointer-events: none;
    }
</style>

<section class="content"> 
    <div class="<?php print panel_modify();?>">
        <!-- Custom Dashboard Header -->
        <div class="dashboard-custom-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h1><i class="fa fa-server" style="margin-right: 10px;"></i>Dashboard</h1>
                    <div class="dashboard-datetime">
                        <i class="fa fa-clock-o"></i><?php print $date_time_show;?>
                    </div>
                </div>
                <div>
                    <a href="#" class="dashboard-security-badge" data-toggle="modal" data-target="#PINDetail">
                        <i class="fa fa-circle"<?php echo $security_account;?>></i>
                        ดูรายละเอียดสิทธิ์
                    </a>
                </div>
            </div>
        </div>

        <!-- Server  Container -->
        <div class="server-custom-container">
            <div class="server-table-header">
                <i class="fa fa-list" style="margin-right: 10px;"></i>รายการ Server
            </div>
            <div class="panel-body" style="padding: 0;">
                <table class="table server-custom-table">
                    <thead>
                        <tr>
                            <th>STATUS <a href="#" data-toggle="modal" data-target="#PINDetail" data-toggle="tooltip" data-placement="top" title="ดูรายละเอียด"><i class="fa fa-circle"<?php echo $security_account;?>></i></a></th>
                            <th class="text-center">IP / DNS</th>
                            <th>ชื่อไซต์งาน</th>
                            <th>ชื่อผู้ดูแล</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $secu=mysql_fetch_array(mysql_query("SELECT admin_pin FROM mt_config"));
                        $admin_pin=$secu['admin_pin'];

                        if(!empty($admin_pin)&&($admin_pin==$_SESSION['security'])){
                            $session_login="admin_pin";
                        }else{
                            if($secom_v2==$_SESSION['security']){
                                $session_login="customer_pin";
                            }else if($secom_v3==$_SESSION['security']){
                                $session_login="user_pin";
                            }     
                        }
                       
                        $sql=mysql_query("SELECT * FROM mt_config WHERE ".$session_login."='".$_SESSION['security']."'");

                        while($result = mysql_fetch_array($sql)){
                            $API = new routeros_api();              
                            $API->debug = false;
                            
                            $is_connected = $API->connect($result['mt_ip'], $result['mt_user'], $result['mt_pass'], $result['port_api']);
                            $conn = $is_connected ? "connect" : "disconnect";
                            
                            echo "<tr>";
                            
                            if($result['mt_num']==$result['mt_id']){
                                echo "<td>";
                                if($is_connected){
                                    echo "<span class='badge-online'>ออนไลน์</span>";
                                } else { 
                                    echo "<span class='badge-offline'>ออฟไลน์</span>";
                                }
                                echo "</td>";
                                echo "<td><center>".$result[mt_ip]."</td>";
                                echo "<td>".$result[site_name]."</td>";
                                echo "<td>".$result[mt_user]."</td>";
                                
                                echo "<td class='text-center'>";
                                echo "<a class='btn-custom-action btn-custom-edit' title='click to edit' href='index.php?page=editserver&id=".$result[mt_num]."'><span class='fa fa-edit'></span> แก้ไข</a>&nbsp;";
                                echo "<a class='btn-custom-action btn-custom-manage' href='index.php?page=add_customer_server&id=".$result[mt_num]."'><span class='fa fa-tasks'></span> เพิ่มผู้ดูแล Server ".$result[mt_id]."</a>&nbsp;";
                                echo "<a class='btn-custom-action btn-custom-web' href='//".$result[mt_ip].":".$result[port_web]."' target='_blank'><span class='fa fa-globe'></span> webconfig</a>&nbsp;";
                                echo "<a onclick=\"swal({
                                    title: 'Are you sure?',
                                    text: 'ต้องการจะลบ SERVER ID> ".$result[mt_num]." <จริงหรือไม่ ?',
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!',
                                    cancelButtonText: 'No, cancel!',
                                    }).then(
                                    function () {
                                    window.location.href = 'index.php?page=deleteserver&id=".$result[mt_num]."';})\"
                                    class='btn-custom-action btn-custom-delete' title='click to remove'><span class='fa fa-remove'></span> ลบ</a>&nbsp;";
                                
                                if($is_connected){
                                    echo "<a class='btn-custom-action btn-custom-login' title='status $conn' href='index.php?page=system_conn&id=".$result[mt_id]."&status=".$result[mt_num]."&conn=$conn'><span class='fa fa-sign-in'></span> เข้าสู่ระบบ</a>";
                                }else{
                                    echo "<a class='btn-custom-action btn-custom-disabled' title='status $conn' href='index.php?page=system_conn&id=".$result[mt_id]."&status=".$result[mt_num]."&conn=$conn'><span class='fa fa-sign-in'></span> เข้าสู่ระบบ</a>";
                                }
                                echo "</td>";
                            }else{
                                echo "<td>";
                                if($is_connected){
                                    echo "<span class='badge-online'>ออนไลน์</span>";
                                } else { 
                                    echo "<span class='badge-offline'>ออฟไลน์</span>";
                                }
                                echo "</td>";
                                echo "<td><center>".$result[mt_ip]."</td>";
                                echo "<td>".$result[site_name]."</td>";
                                echo "<td>".$result[mt_user]."</td>";
                                
                                echo "<td class='text-center'>";
                                echo "<a class='btn-custom-action btn-custom-edit' title='click to edit' href='index.php?page=editserver&id=".$result[mt_num]."'><span class='fa fa-edit'></span> แก้ไข</a>&nbsp;";
                                echo "<a class='btn-custom-action btn-custom-manage'><span class='fa fa-tasks'></span> ผู้ดูแล Server ".$result[mt_id]."&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;";
                                echo "<a class='btn-custom-action btn-custom-web' href='//".$result[mt_ip].":".$result[port_web]."' target='_blank'><span class='fa fa-globe'></span> webconfig</a>&nbsp;";
                                echo "<a onclick=\"swal({
                                    title: 'Are you sure?',
                                    text: 'ต้องการจะลบ SERVER ID> ".$result[mt_num]." <จริงหรือไม่ ?',
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!',
                                    cancelButtonText: 'No, cancel!',
                                    }).then(
                                    function () {
                                    window.location.href = 'index.php?page=deleteserver&id=".$result[mt_num]."';})\"
                                    class='btn-custom-action btn-custom-delete' title='click to remove'><span class='fa fa-remove'></span> ลบ</a>&nbsp;";
                                
                                if($is_connected){
                                    echo "<a class='btn-custom-action btn-custom-login' title='status $conn' href='index.php?page=system_conn&id=".$result[mt_id]."&status=".$result[mt_num]."&conn=$conn'><span class='fa fa-sign-in'></span> เข้าสู่ระบบ</a>";
                                }else{
                                    echo "<a class='btn-custom-action btn-custom-disabled' title='status $conn' href='index.php?page=system_conn&id=".$result[mt_id]."&status=".$result[mt_num]."&conn=$conn'><span class='fa fa-sign-in'></span> เข้าสู่ระบบ</a>";
                                }
                                echo "</td>";
                            }
                            echo "</tr>";
                            
                            if($is_connected) {
                                $API->disconnect();
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="height: 600px; width: 800px;">
            <div class="<?php print panel_modify();?>">
                <div class="<?php print $panel_heading;?>">
                    <h3 class="box-title">รายละเอียด ADMIN LOGIN ด้วย PIN สามารถจัดการได้ในระบบ</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Security Site Levels</th>
                                    <th><i class="fa fa-circle" style="color: #ff1c15;"></i> Lower Class</th>
                                    <th><i class="fa fa-circle" style="color: #f7d13c;"></i> Middle Class</th>
                                    <th><i class="fa fa-circle" style="color: #00ff00;"></i> High Class</th>
                                    <th><i class="fa fa-circle" style="color: #00ff00;"></i> None Security</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>สร้าง ไซต์งานเพิ่ม</td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>แก้ไข ไซต์งาน</td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>ลบ ไซต์งาน</td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>แก้ไข รหัส PIN ของตัวเอง</td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>แก้ไข รหัส PIN ไซต์ที่สร้างเอง</td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>มองเห็น ทุกไซต์งาน</td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>แก้ไข ทุกไซต์งาน</td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>ปิด-เปิดระบบ Security Site</td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="PINDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 1000px;">
            <div class="<?php print panel_modify();?>">
                <div class="<?php print $panel_heading;?>">
                    <h3 class="box-title">รายละเอียด SITE PIN</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Site Name</th>
                                <th>SERVER</th>
                                <th>USERNAME</th>
                                <th><i class="fa fa-circle" style="color: #00ff00;"></i> PIN High Class</th>
                                <th><i class="fa fa-circle" style="color: #f7d13c;"></i> PIN Middle Class</th>
                                <th><i class="fa fa-circle" style="color: #ff1c15;"></i> PIN Lower Class</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $secu=mysql_fetch_array(mysql_query("SELECT admin_pin FROM mt_config"));
                            $admin_pin=$secu['admin_pin'];

                            if(!empty($admin_pin)&&($admin_pin==$_SESSION['security'])){
                                $session_login="admin_pin";
                            }else{
                                if($secom_v2==$_SESSION['security']){
                                    $session_login="customer_pin";
                                }else if($secom_v3==$_SESSION['security']){
                                    $session_login="user_pin";
                                }     
                            }
                           
                            $sql=mysql_query("SELECT * FROM mt_config WHERE ".$session_login."='".$_SESSION['security']."'");
                            
                            $no==1;
                            while($result = mysql_fetch_array($sql)){
                                $no++;
                                echo "<tr>";
                                echo "<td>".$no."</td>"; 
                                echo "<td>".$result['site_name']."</td>";
                                echo "<td>".$result['mt_id']."</td>";
                                echo "<td>".$_SESSION['APIUser']."</td>";
                                echo "<td>****</td>";
                                if($secom_v3==$_SESSION['security']){
                                    echo "<td>****</td>";
                                }else{
                                    echo "<td>".$result['customer_pin']."</td>";
                                }
                                echo "<td>".$result['user_pin']."</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
