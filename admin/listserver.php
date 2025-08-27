<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #f3f4f6;
        }

        .panel-heading .btn-box-tool,
        .panel-heading .box-tools,
        .dashboard-custom-header .close,
        .dashboard-custom-header .btn-close {
            display: none !important;
        }

        /* Main container */
        .server-wrapper {
            border-radius: 20px !important;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            background: white;
            margin: 20px;
        }

        /* Header section */
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
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .dashboard-datetime {
            opacity: 0.95;
            font-size: 16px;
            margin-top: 10px;
            font-weight: 400;
            letter-spacing: 0.5px;
        }

        .dashboard-security-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.2);
            color: white !important;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
        }

        .dashboard-security-badge:hover,
        .dashboard-security-badge:active {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
            color: white !important;
            text-decoration: none;
        }

        .dashboard-security-badge i {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                opacity: 1;
            }

            50% {
                opacity: .6;
            }

            100% {
                opacity: 1;
            }
        }

        /* Table container */
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
            position: relative;
            z-index: 5;
        }

        .server-table-header i {
            margin-right: 10px;
            color: #6b7280;
        }

        /* Table wrapper for mobile scroll */
        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Table styling */
        .server-custom-table {
            margin: 0;
            width: 100%;
            min-width: 720px;
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
            white-space: nowrap;
        }

        .server-custom-table tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.2s;
        }

        .server-custom-table tbody tr:hover {
            background: #f9fafb;
        }

        .server-custom-table td {
            padding: 20px;
            vertical-align: middle;
            border: none;
            color: #374151;
            font-size: 14px;
        }

        /* Status badges */
        .badge-online,
        .badge-offline {
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            white-space: nowrap;
        }

        .badge-online {
            background: linear-gradient(135deg, #34d399, #10b981);
            color: white;
            box-shadow: 0 2px 8px rgba(16, 185, 129, .3);
        }

        .badge-offline {
            background: linear-gradient(135deg, #f87171, #ef4444);
            color: white;
            box-shadow: 0 2px 8px rgba(239, 68, 68, .3);
        }

        /* Action buttons */
        .btn-custom-action {
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            margin: 3px;
            border: none;
            transition: all 0.3s;
            text-decoration: none !important;
            display: inline-block;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-custom-edit {
            background: #fef3c7;
            color: #92400e !important;
        }

        .btn-custom-manage {
            background: #dbeafe;
            color: #1e40af !important;
        }

        .btn-custom-web {
            background: #1f2937;
            color: white !important;
        }

        .btn-custom-delete {
            background: #fee2e2;
            color: #991b1b !important;
        }

        .btn-custom-login {
            background: linear-gradient(135deg, #34d399, #10b981);
            color: white !important;
        }

        .btn-custom-disabled {
            background: #e5e7eb;
            color: #9ca3af !important;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Panel body */
        .panel-body {
            padding: 0 !important;
            border-radius: 0 0 20px 20px;
            overflow: hidden;
        }

        /* Mobile Card Layout */
        .mobile-cards {
            display: none;
            padding: 15px;
        }

        .mobile-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            padding: 16px;
            margin-bottom: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.2s;
        }

        .mobile-card:active {
            transform: scale(0.985);
        }

        .mobile-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f3f4f6;
        }

        .mobile-card-title {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
        }

        .mobile-card-body {
            display: grid;
            gap: 6px;
        }

        .mobile-card-row {
            display: flex;
            justify-content: space-between;
            gap: 8px;
        }

        .mobile-card-label {
            font-size: 13px;
            color: #6b7280;
            font-weight: 500;
        }

        .mobile-card-value {
            font-size: 14px;
            color: #374151;
            text-align: right;
            max-width: 60%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .mobile-card-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #f3f4f6;
        }

        .mobile-card-actions .btn-custom-action {
            text-align: center;
            padding: 12px 8px;
            margin: 0;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .mobile-card-actions .btn-custom-action.full-width {
            grid-column: 1 / -1;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .table-wrapper {
                position: relative;
            }

            .table-wrapper::after {
                content: '→';
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                font-size: 24px;
                color: #9ca3af;
                pointer-events: none;
                animation: slideRight 1.5s infinite;
            }

            @keyframes slideRight {

                0%,
                100% {
                    transform: translateY(-50%) translateX(0)
                }

                50% {
                    transform: translateY(-50%) translateX(5px)
                }
            }

            .table-wrapper::-webkit-scrollbar {
                height: 8px;
            }

            .table-wrapper::-webkit-scrollbar-track {
                background: #f3f4f6;
                border-radius: 10px;
            }

            .table-wrapper::-webkit-scrollbar-thumb {
                background: #9ca3af;
                border-radius: 10px;
            }
        }

        @media (max-width: 768px) {
            body {
                background: #f3f4f6;
            }

            .server-wrapper {
                border-radius: 0;
                margin: 0;
                box-shadow: none;
            }

            .dashboard-custom-header {
                border-radius: 0;
                padding: 20px 15px;
            }

            .dashboard-custom-header h1 {
                font-size: 22px;
            }

            .dashboard-datetime {
                font-size: 14px;
                margin-top: 8px;
            }

            .dashboard-security-badge {
                margin-top: 12px;
                padding: 8px 16px;
                font-size: 13px;
            }

            .server-table-header {
                padding: 15px;
                font-size: 16px;
                position: sticky;
                top: 0;
                z-index: 10;
                background: white;
            }

            /* Hide table, show cards */
            .table-wrapper {
                display: none;
            }

            .mobile-cards {
                display: block;
            }

            /* Modal adjustments */
            .modal-dialog {
                margin: 10px;
                width: auto !important;
                max-width: 95vw;
            }

            .modal-dialog .panel {
                border-radius: 15px !important;
            }

            .modal-dialog .panel-heading {
                padding: 14px;
                font-size: 16px;
            }

            .modal-dialog .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .modal-dialog table {
                font-size: 12px;
            }

            .modal-dialog td,
            .modal-dialog th {
                padding: 8px;
                white-space: nowrap;
            }
        }

        @media (max-width: 480px) {
            .dashboard-custom-header h1 {
                font-size: 20px;
            }

            .mobile-card {
                padding: 14px;
            }

            .mobile-card-actions {
                grid-template-columns: 1fr;
            }

            .mobile-card-actions .btn-custom-action {
                padding: 12px;
            }
        }

        /* Touch-friendly */
        @media (hover: none) and (pointer: coarse) {
            .btn-custom-action {
                min-height: 44px;
                min-width: 44px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .dashboard-security-badge {
                min-height: 44px;
            }

            .mobile-card {
                cursor: pointer;
            }
        }

        .dashboard-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
        }

        .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: .2px;
            text-decoration: none !important;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, opacity .2s ease;
            user-select: none;
            -webkit-user-drag: none;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .08);
            color: #fff !important;
            backdrop-filter: blur(6px);
        }

        .badge-pill:active {
            transform: scale(.98);
        }

        .badge-admin {
            background: linear-gradient(135deg, #60a5fa 0%, #7c3aed 100%);
        }

        .badge-admin:hover {
            box-shadow: 0 10px 22px rgba(124, 58, 237, .35);
            transform: translateY(-1px);
        }


        .badge-pin {
            background: linear-gradient(135deg, #60a5fa 0%, #7c3aed 100%);
            border: none;
            color: #ffffff !important;
        }

        .badge-pin:hover {
            box-shadow: 0 10px 22px rgba(124, 58, 237, .35);
            transform: translateY(-1px);
        }


        .badge-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: inline-grid;
            place-items: center;
            background: rgba(255, 255, 255, .22);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .35);
            font-size: 14px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, .18);
            display: inline-block;
            margin-right: 6px;
        }

        @media(max-width:768px) {
            .dashboard-actions {
                gap: 10px;
            }

            .badge-pill {
                padding: 9px 14px;
                font-size: 13px;
            }

            .badge-icon {
                width: 26px;
                height: 26px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <section class="content">
        <div class="<?php print panel_modify(); ?> server-wrapper">
            <!-- Header -->

            <div class="dashboard-custom-header">
                <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;">
                    <div>
                        <h1><i class="fa fa-server"></i>Dashboard</h1>
                        <div class="dashboard-datetime">
                            <i class="fa fa-clock-o"></i><?php print $date_time_show; ?>
                        </div>
                    </div>

                    <div class="dashboard-actions">
                        <a href="#" class="badge-pill badge-admin" data-toggle="modal" data-target="#Detail">
                            <i class="fa fa-user"></i>
                            รายละเอียด ADMIN LOGIN
                        </a>


                        <a href="#" class="badge-pill badge-pin" data-toggle="modal" data-target="#PINDetail" title="ดูรายละเอียดสิทธิ์">
                            <span class="dot"></span> ดูรายละเอียดสิทธิ์
                        </a>
                    </div>
                </div>
            </div>



            <div class="server-custom-container">
                <div class="server-table-header">
                    <i class="fa fa-list"></i>รายการ Server
                </div>

                <div class="panel-body">

                    <!-- TABLE  -->
                    <div class="table-wrapper">
                        <table class="table server-custom-table">
                            <thead>
                                <tr>
                                    <th>STATUS <a href="#" data-toggle="modal" data-target="#PINDetail" title="ดูรายละเอียด"><i class="fa fa-circle" <?php echo $security_account; ?>></i></a></th>
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

                                $sql = mysql_query("SELECT * FROM mt_config WHERE " . $session_login . "='" . $_SESSION['security'] . "'");

                                while ($result = mysql_fetch_array($sql)) {
                                    $API = new routeros_api();
                                    $API->debug = false;
                                    $is_connected = $API->connect($result['mt_ip'], $result['mt_user'], $result['mt_pass'], $result['port_api']);
                                    $conn = $is_connected ? "connect" : "disconnect";

                                    echo "<tr>";

                                    echo "<td>";
                                    if ($is_connected) {
                                        echo "<span class='badge-online'>ออนไลน์</span>";
                                    } else {
                                        echo "<span class='badge-offline'>ออฟไลน์</span>";
                                    }
                                    echo "</td>";

                                    echo "<td class='text-center'>" . $result['mt_ip'] . "</td>";
                                    echo "<td>" . $result['site_name'] . "</td>";
                                    echo "<td>" . $result['mt_user'] . "</td>";

                                    echo "<td class='text-center'>";
                                    echo "<a class='btn-custom-action btn-custom-edit' title='click to edit' href='index.php?page=editserver&id=" . $result['mt_num'] . "'><span class='fa fa-edit'></span> แก้ไข</a> ";
                                    echo "<a class='btn-custom-action btn-custom-manage' href='index.php?page=add_customer_server&id=" . $result['mt_num'] . "'><span class='fa fa-tasks'></span> เพิ่มผู้ดูแล Server " . $result['mt_id'] . "</a> ";
                                    echo "<a class='btn-custom-action btn-custom-web' href='//" . $result['mt_ip'] . ":" . $result['port_web'] . "' target='_blank'><span class='fa fa-globe'></span> webconfig</a> ";
                                    echo "<a onclick=\"Swal.fire({
                                        title: 'Are you sure?',
                                        text: 'ต้องการจะลบ SERVER ID> " . $result['mt_num'] . " <จริงหรือไม่ ?',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!',
                                        cancelButtonText: 'No, cancel!'
                                    }).then(function(rs){ if(rs.isConfirmed){ window.location.href = 'index.php?page=deleteserver&id=" . $result['mt_num'] . "'; } })\"
                                    class='btn-custom-action btn-custom-delete' title='click to remove'><span class='fa fa-remove'></span> ลบ</a> ";

                                    if ($is_connected) {
                                        echo "<a class='btn-custom-action btn-custom-login' title='status $conn' href='index.php?page=system_conn&id=" . $result['mt_id'] . "&status=" . $result['mt_num'] . "&conn=$conn'><span class='fa fa-sign-in'></span> เข้าสู่ระบบ</a>";
                                    } else {
                                        echo "<a class='btn-custom-action btn-custom-disabled' title='status $conn' href='index.php?page=system_conn&id=" . $result['mt_id'] . "&status=" . $result['mt_num'] . "&conn=$conn'><span class='fa fa-sign-in'></span> เข้าสู่ระบบ</a>";
                                    }
                                    echo "</td>";

                                    echo "</tr>";

                                    if ($is_connected) {
                                        $API->disconnect();
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!--(Phone) -->
                    <div class="mobile-cards">
                        <?php
                        $sql2 = mysql_query("SELECT * FROM mt_config WHERE " . $session_login . "='" . $_SESSION['security'] . "'");
                        while ($r = mysql_fetch_array($sql2)) {
                            $API2 = new routeros_api();
                            $API2->debug = false;
                            $ok = $API2->connect($r['mt_ip'], $r['mt_user'], $r['mt_pass'], $r['port_api']);
                            $conn2 = $ok ? "connect" : "disconnect";
                        ?>
                            <div class="mobile-card">
                                <div class="mobile-card-header">
                                    <div class="mobile-card-title">
                                        <?php echo htmlspecialchars($r['site_name']); ?>
                                    </div>
                                    <div>
                                        <?php if ($ok) { ?>
                                            <span class="badge-online">ออนไลน์</span>
                                        <?php } else { ?>
                                            <span class="badge-offline">ออฟไลน์</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="mobile-card-body">
                                    <div class="mobile-card-row">
                                        <div class="mobile-card-label">IP / DNS</div>
                                        <div class="mobile-card-value"><?php echo htmlspecialchars($r['mt_ip']); ?></div>
                                    </div>
                                    <div class="mobile-card-row">
                                        <div class="mobile-card-label">ผู้ดูแล</div>
                                        <div class="mobile-card-value"><?php echo htmlspecialchars($r['mt_user']); ?></div>
                                    </div>
                                    <div class="mobile-card-row">
                                        <div class="mobile-card-label">SERVER ID</div>
                                        <div class="mobile-card-value"><?php echo htmlspecialchars($r['mt_id']); ?></div>
                                    </div>
                                </div>
                                <div class="mobile-card-actions">
                                    <a class="btn-custom-action btn-custom-edit" href="index.php?page=editserver&id=<?php echo $r['mt_num']; ?>">
                                        <span class="fa fa-edit"></span> แก้ไข
                                    </a>
                                    <a class="btn-custom-action btn-custom-manage" href="index.php?page=add_customer_server&id=<?php echo $r['mt_num']; ?>">
                                        <span class="fa fa-tasks"></span> ผู้ดูแล
                                    </a>
                                    <a class="btn-custom-action btn-custom-web full-width" target="_blank" href="//<?php echo $r['mt_ip'] . ':' . $r['port_web']; ?>">
                                        <span class="fa fa-globe"></span> webconfig
                                    </a>
                                    <?php if ($ok) { ?>
                                        <a class="btn-custom-action btn-custom-login full-width" href="index.php?page=system_conn&id=<?php echo $r['mt_id']; ?>&status=<?php echo $r['mt_num']; ?>&conn=<?php echo $conn2; ?>">
                                            <span class="fa fa-sign-in"></span> เข้าสู่ระบบ
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn-custom-action btn-custom-disabled full-width" href="index.php?page=system_conn&id=<?php echo $r['mt_id']; ?>&status=<?php echo $r['mt_num']; ?>&conn=<?php echo $conn2; ?>">
                                            <span class="fa fa-sign-in"></span> เข้าสู่ระบบ
                                        </a>
                                    <?php } ?>
                                    <a class="btn-custom-action btn-custom-delete full-width"
                                        onclick="Swal.fire({
                                   title:'Are you sure?',
                                   text:'ต้องการจะลบ SERVER ID> <?php echo $r['mt_num']; ?> <จริงหรือไม่ ?',
                                   icon:'warning', showCancelButton:true,
                                   confirmButtonColor:'#3085d6', cancelButtonColor:'#d33',
                                   confirmButtonText:'Yes, delete it!', cancelButtonText:'No, cancel!'
                               }).then(function(rs){ if(rs.isConfirmed){ window.location.href='index.php?page=deleteserver&id=<?php echo $r['mt_num']; ?>'; }})">
                                        <span class="fa fa-remove"></span> ลบ
                                    </a>
                                </div>
                            </div>
                        <?php
                            if ($ok) {
                                $API2->disconnect();
                            }
                        }
                        ?>
                    </div>


                </div>
            </div><!-- /server-custom-container -->
        </div>

        <!-- Modal Detail -->
        <div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="height:auto; width:auto; max-width:1000px;">
                <div class="<?php print panel_modify(); ?> panel">
                    <div class="<?php print $panel_heading; ?> panel-heading">
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
                        </div><!-- /table-responsive -->
                    </div><!-- /panel-body -->
                </div><!-- /panel -->
            </div><!-- /modal-dialog -->
        </div><!-- /Modal Detail -->

        <!-- Modal PIN Detail -->
        <div class="modal fade" id="PINDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width:auto; max-width:1000px;">
                <div class="<?php print panel_modify(); ?> panel">
                    <div class="<?php print $panel_heading; ?> panel-heading">
                        <h3 class="box-title">รายละเอียด SITE PIN</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
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

                                    $sql = mysql_query("SELECT * FROM mt_config WHERE " . $session_login . "='" . $_SESSION['security'] . "'");
                                    $no = 0;
                                    while ($result = mysql_fetch_array($sql)) {
                                        $no++;
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . htmlspecialchars($result['site_name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($result['mt_id']) . "</td>";
                                        echo "<td>" . htmlspecialchars($_SESSION['APIUser']) . "</td>";
                                        echo "<td>****</td>";
                                        if ($secom_v3 == $_SESSION['security']) {
                                            echo "<td>****</td>";
                                        } else {
                                            echo "<td>" . htmlspecialchars($result['customer_pin']) . "</td>";
                                        }
                                        echo "<td>" . htmlspecialchars($result['user_pin']) . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div><!-- /table-responsive -->
                    </div><!-- /panel-body -->
                </div><!-- /panel -->
            </div><!-- /modal-dialog -->
        </div><!-- /Modal PIN Detail -->
    </section>

</body>

</html>