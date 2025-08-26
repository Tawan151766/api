<style>
    /*  Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .panel-heading .btn-box-tool,
    .panel-heading .box-tools,
    .dashboard-custom-header .close,
    .dashboard-custom-header .btn-close {
        display: none !important;
    }

    .server-wrapper {
        border-radius: 20px !important;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        background: white;
        margin: 20px;
    }

    .dashboard-custom-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px;
        border-radius: 20px 20px 0 0;
        margin-bottom: 0;
        position: relative;
    }

    .dashboard-custom-header h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 600;
        display: inline-block;
    }

    .dashboard-custom-header h1 i {
        margin-right: 12px;
    }

    .dashboard-datetime {
        opacity: 0.95;
        font-size: 16px;
        margin-top: 10px;
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
        gap: 10px;
        padding: 10px 20px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        background: rgba(255,255,255,0.2);
        color: white !important;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s;
    }

    .dashboard-security-badge:hover {
        background: rgba(255,255,255,0.3);
        transform: scale(1.05);
        color: white !important;
        text-decoration: none;
    }

    .dashboard-security-badge i {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.6; }
        100% { opacity: 1; }
    }

    .server-custom-container {
        background: white;
        border-radius: 0 0 20px 20px;
    }

    .server-table-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        padding: 20px 30px;
        border-bottom: 1px solid #e5e7eb;
        font-weight: 600;
        font-size: 18px;
        color: #374151;
    }

    .server-table-header i {
        margin-right: 10px;
        color: #6b7280;
    }

    /* Table styling */
    .server-custom-table {
        margin: 0;
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .server-custom-table thead th {
        background: #f9fafb;
        border: none;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
        padding: 18px 20px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .server-custom-table thead th:first-child {
        padding-left: 30px;
    }

    .server-custom-table thead th:last-child {
        padding-right: 30px;
        text-align: center;
    }

    .server-custom-table tbody tr {
        border-bottom: 1px solid #f3f4f6;
        transition: all 0.2s;
    }

    .server-custom-table tbody tr:hover {
        background: #f9fafb;
    }

    .server-custom-table tbody tr:last-child {
        border-bottom: none;
    }

    /* Rounded corners for last row */
    .server-custom-table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 20px;
    }

    .server-custom-table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 20px;
    }

    .server-custom-table td {
        padding: 20px;
        vertical-align: middle;
        border: none;
        color: #374151;
        font-size: 14px;
    }

    .server-custom-table td:first-child {
        padding-left: 30px;
    }

    .server-custom-table td:last-child {
        padding-right: 30px;
    }

    /* Status badges */
    .badge-online {
        background: linear-gradient(135deg, #34d399, #10b981);
        color: white;
        padding: 6px 18px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
    }

    .badge-offline {
        background: linear-gradient(135deg, #f87171, #ef4444);
        color: white;
        padding: 6px 18px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
    }

    /* Action buttons */
    .btn-custom-action {
        padding: 8px 16px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 500;
        margin: 0 3px;
        border: none;
        transition: all 0.3s;
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
        box-shadow: 0 4px 12px rgba(253, 230, 138, 0.4);
        color: #92400e !important;
    }

    .btn-custom-manage {
        background: #dbeafe;
        color: #1e40af !important;
    }

    .btn-custom-manage:hover {
        background: #bfdbfe;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(191, 219, 254, 0.4);
        color: #1e40af !important;
    }

    .btn-custom-web {
        background: #1f2937;
        color: white !important;
    }

    .btn-custom-web:hover {
        background: #111827;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(31, 41, 55, 0.4);
        color: white !important;
    }

    .btn-custom-delete {
        background: #fee2e2;
        color: #991b1b !important;
    }

    .btn-custom-delete:hover {
        background: #fecaca;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(254, 202, 202, 0.4);
        color: #991b1b !important;
    }

    .btn-custom-login {
        background: linear-gradient(135deg, #34d399, #10b981);
        color: white !important;
    }

    .btn-custom-login:hover {
        background: linear-gradient(135deg, #10b981, #059669);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        color: white !important;
    }

    .btn-custom-disabled {
        background: #e5e7eb;
        color: #9ca3af !important;
        cursor: not-allowed;
        pointer-events: none;
    }

    /* Panel body padding adjustment */
    .panel-body {
        padding: 0 !important;
        border-radius: 0 0 20px 20px;
        overflow: hidden;
    }

    /* Modal styling with rounded corners */
    .modal-dialog .panel {
        border-radius: 20px !important;
        overflow: hidden;
    }

    .modal-dialog .panel-heading {
        border-radius: 20px 20px 0 0 !important;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .server-wrapper {
            border-radius: 15px;
            margin: 10px;
        }

        .dashboard-custom-header {
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }

        .server-custom-container {
            border-radius: 0 0 15px 15px;
        }

        .dashboard-security-badge {
            position: relative;
            margin-top: 15px;
            display: inline-flex;
        }

        .btn-custom-action {
            padding: 6px 12px;
            font-size: 11px;
            margin: 2px;
        }

        .server-custom-table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 15px;
        }

        .server-custom-table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 15px;
        }
    }
</style>

<section class="content">
    <div class="<?php print panel_modify();?> server-wrapper">
        <!-- Header -->
        <div class="dashboard-custom-header">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                <div>
                    <h1><i class="fa fa-server"></i>Dashboard</h1>
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

        <div class="server-custom-container">
            <div class="server-table-header">
                <i class="fa fa-list"></i>รายการ Server
            </div>

            <div class="panel-body">
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
                        $secu = mysql_fetch_array(mysql_query("SELECT admin_pin FROM mt_config"));
                        $admin_pin = $secu['admin_pin'];

                        if (!empty($admin_pin) && ($admin_pin == $_SESSION['security'])) {
                            $session_login = "admin_pin";
                        } else {
                            if ($secom_v2 == $_SESSION['security']) {
                                $session_login = "customer_pin";
                            } else if ($secom_v3 == $_SESSION['security']) {
                                $session_login = "user_pin";
                            }
                        }

                        $sql = mysql_query("SELECT * FROM mt_config WHERE ".$session_login."='".$_SESSION['security']."'");

                        while ($result = mysql_fetch_array($sql)) {
                            $API = new routeros_api();
                            $API->debug = false;

                            $is_connected = $API->connect($result['mt_ip'], $result['mt_user'], $result['mt_pass'], $result['port_api']);
                            $conn = $is_connected ? "connect" : "disconnect";

                            echo "<tr>";

                            if ($result['mt_num'] == $result['mt_id']) {
                                echo "<td>";
                                if ($is_connected) {
                                    echo "<span class='badge-online'>ออนไลน์</span>";
                                } else {
                                    echo "<span class='badge-offline'>ออฟไลน์</span>";
                                }
                                echo "</td>";
                                echo "<td class='text-center'>".$result['mt_ip']."</td>";
                                echo "<td>".$result['site_name']."</td>";
                                echo "<td>".$result['mt_user']."</td>";

                                echo "<td class='text-center'>";
                                echo "<a class='btn-custom-action btn-custom-edit' title='click to edit' href='index.php?page=editserver&id=".$result['mt_num']."'><span class='fa fa-edit'></span> แก้ไข</a> ";
                                echo "<a class='btn-custom-action btn-custom-manage' href='index.php?page=add_customer_server&id=".$result['mt_num']."'><span class='fa fa-tasks'></span> เพิ่มผู้ดูแล Server ".$result['mt_id']."</a> ";
                                echo "<a class='btn-custom-action btn-custom-web' href='//".$result['mt_ip'].":".$result['port_web']."' target='_blank'><span class='fa fa-globe'></span> webconfig</a> ";
                                echo "<a onclick=\"swal({
                                    title: 'Are you sure?',
                                    text: 'ต้องการจะลบ SERVER ID> ".$result['mt_num']." <จริงหรือไม่ ?',
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!',
                                    cancelButtonText: 'No, cancel!'
                                    }).then(function () {
                                        window.location.href = 'index.php?page=deleteserver&id=".$result['mt_num']."';
                                    })\"
                                    class='btn-custom-action btn-custom-delete' title='click to remove'><span class='fa fa-remove'></span> ลบ</a> ";

                                if ($is_connected) {
                                    echo "<a class='btn-custom-action btn-custom-login' title='status $conn' href='index.php?page=system_conn&id=".$result['mt_id']."&status=".$result['mt_num']."&conn=$conn'><span class='fa fa-sign-in'></span> เข้าสู่ระบบ</a>";
                                } else {
                                    echo "<a class='btn-custom-action btn-custom-disabled' title='status $conn' href='index.php?page=system_conn&id=".$result['mt_id']."&status=".$result['mt_num']."&conn=$conn'><span class='fa fa-sign-in'></span> เข้าสู่ระบบ</a>";
                                }
                                echo "</td>";
                            } else {
                                echo "<td>";
                                if ($is_connected) {
                                    echo "<span class='badge-online'>ออนไลน์</span>";
                                } else {
                                    echo "<span class='badge-offline'>ออฟไลน์</span>";
                                }
                                echo "</td>";
                                echo "<td class='text-center'>".$result['mt_ip']."</td>";
                                echo "<td>".$result['site_name']."</td>";
                                echo "<td>".$result['mt_user']."</td>";

                                echo "<td class='text-center'>";
                                echo "<a class='btn-custom-action btn-custom-edit' title='click to edit' href='index.php?page=editserver&id=".$result['mt_num']."'><span class='fa fa-edit'></span> แก้ไข</a> ";
                                echo "<a class='btn-custom-action btn-custom-manage'><span class='fa fa-tasks'></span> ผู้ดูแล Server ".$result['mt_id']."</a> ";
                                echo "<a class='btn-custom-action btn-custom-web' href='//".$result['mt_ip'].":".$result['port_web']."' target='_blank'><span class='fa fa-globe'></span> webconfig</a> ";
                                echo "<a onclick=\"swal({
                                    title: 'Are you sure?',
                                    text: 'ต้องการจะลบ SERVER ID> ".$result['mt_num']." <จริงหรือไม่ ?',
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!',
                                    cancelButtonText: 'No, cancel!'
                                    }).then(function () {
                                        window.location.href = 'index.php?page=deleteserver&id=".$result['mt_num']."';
                                    })\"
                                    class='btn-custom-action btn-custom-delete' title='click to remove'><span class='fa fa-remove'></span> ลบ</a> ";

                                if ($is_connected) {
                                    echo "<a class='btn-custom-action btn-custom-login' title='status $conn' href='index.php?page=system_conn&id=".$result['mt_id']."&status=".$result['mt_num']."&conn=$conn'><span class='fa fa-sign-in'></span> เข้าสู่ระบบ</a>";
                                } else {
                                    echo "<a class='btn-custom-action btn-custom-disabled' title='status $conn' href='index.php?page=system_conn&id=".$result['mt_id']."&status=".$result['mt_num']."&conn=$conn'><span class='fa fa-sign-in'></span> เข้าสู่ระบบ</a>";
                                }
                                echo "</td>";
                            }

                            echo "</tr>";

                            if ($is_connected) {
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
            <div class="<?php print panel_modify();?> panel">
                <div class="<?php print $panel_heading;?> panel-heading">
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
                                    <td>5</td>
                                    <td>แก้ไข รหัส PIN ไซต์ที่สร้างเอง</td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>มองเห็น ทุกไซต์งาน</td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>แก้ไข ทุกไซต์งาน</td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-close" style="color: #ff1c15;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                    <td class="text-center"><i class="fa fa-check" style="color: #00c600;"></i></td>
                                </tr>
                                <tr>
                                    <td>8</td>
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

    <!-- Modal PIN Detail -->
    <div class="modal fade" id="PINDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 1000px;">
            <div class="<?php print panel_modify();?> panel">
                <div class="<?php print $panel_heading;?> panel-heading">
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
                            $secu = mysql_fetch_array(mysql_query("SELECT admin_pin FROM mt_config"));
                            $admin_pin = $secu['admin_pin'];

                            if (!empty($admin_pin) && ($admin_pin == $_SESSION['security'])) {
                                $session_login = "admin_pin";
                            } else {
                                if ($secom_v2 == $_SESSION['security']) {
                                    $session_login = "customer_pin";
                                } else if ($secom_v3 == $_SESSION['security']) {
                                    $session_login = "user_pin";
                                }
                            }

                            $sql = mysql_query("SELECT * FROM mt_config WHERE ".$session_login."='".$_SESSION['security']."'");

                            $no = 0;
                            while ($result = mysql_fetch_array($sql)) {
                                $no++;
                                echo "<tr>";
                                echo "<td>".$no."</td>";
                                echo "<td>".$result['site_name']."</td>";
                                echo "<td>".$result['mt_id']."</td>";
                                echo "<td>".$_SESSION['APIUser']."</td>";
                                echo "<td>****</td>";
                                if ($secom_v3 == $_SESSION['security']) {
                                    echo "<td>****</td>";
                                } else {
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