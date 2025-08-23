<?php
	error_reporting(0);
	session_start();
	if(empty($_SESSION['security']) || empty($_SESSION['APIUser'])){
		echo "<meta http-equiv='refresh' content='0;url=login.php' />";
		exit(0);
	}
	unset($_SESSION['id']);
	require('../config/routeros_api.class.php'); 
	include("../include/class.mysqldb.php");     
	include("../include/config.inc.php");
	include("convert.php");
$secom_admin=mysql_fetch_array(mysql_query("SELECT admin_pin FROM mt_config"));
	 $secom_v1=$secom_admin['admin_pin'];

	   $secom_user=mysql_query("SELECT * FROM mt_config WHERE user_pin='".$_SESSION['security']."'");
           while($Auser_pin=mysql_fetch_array($secom_user)){
			   $secom_v3=$Auser_pin['user_pin'];
			   if(!empty($secom_v3)){$security_account="style=\"color: #ff1c15;\"";}
		   }

		    $secom_customer=mysql_query("SELECT * FROM mt_config WHERE customer_pin='".$_SESSION['security']."'");
           while($Acust=mysql_fetch_array($secom_customer)){
			   $secom_v2=$Acust['customer_pin'];
			   if(!empty($secom_v2)){$security_account="style=\"color: #f7d13c;\"";}
		   }

$secom_admin=mysql_query("SELECT * FROM mt_config WHERE admin_pin='".$_SESSION['security']."'");
           while($admin_pin=mysql_fetch_array($secom_admin)){
			   if(!empty($secom_v1)){$security_account="style=\"color: #00ff00;\"";}
		   }

header("Refresh: 300; URL='../admin/login.php'");
$current = isset($_GET['page']) ? $_GET['page'] : '';
function is_active($key, $current){ return $current === $key ? 'active' : ''; }
	
?>
    <!DOCTYPE html>
<html lang="th">
<head>
    <!-- Script แสดงวันเวลา -->
    <script type="text/javascript">
        function date_time(id) {
            date = new Date;
            year = date.getFullYear();
            month = date.getMonth();
            months = new Array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
            d = date.getDate();
            day = date.getDay();
            days = new Array('วันอาทิตย์ ที่', 'วันจันทร์ ที่', 'วันอังคาร ที่', 'วันพุธ ที่', 'วันพฤหัสบดี ที่', 'วันศุกร์ ที่', 'วันเสาร์ ที่');
            h = date.getHours();
            if (h < 10) { h = "0" + h; }
            m = date.getMinutes();
            if (m < 10) { m = "0" + m; }
            s = date.getSeconds();
            if (s < 10) { s = "0" + s; }
            result = '' + days[day] + ' ' + d + ' ' + months[month] + ' พ.ศ.' + (year + 543) + ' เวลา ' + h + ':' + m + ':' + s;
            document.getElementById(id).innerHTML = result;
            setTimeout('date_time("' + id + '");', '1000');
            return true;
        }
    </script>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ROCKET API - Modern Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- External CSS -->
    <link rel="stylesheet" href="../plugins/bootstrap/cssUI/bootstrap.min.css">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../distUI/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="../assets/css/plugins/dataTables.bootstrap2.css" rel="stylesheet" />
    <link rel="stylesheet" href="../distUI/css/skins/_all-skins-min.min.css">
    <link href="../assets/css/custom3.css" rel="stylesheet" />
    <link href="../img/rkicon.png" rel="shortcut icon" type="image/x-icon" />
    <script src="../plugins/sweetalert/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../plugins/sweetalert/dist/sweetalert2.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <style>
        :root {
            --primary-dark: #003C7F;
            --primary-blue: #0072BC;
            --primary-alt: #003C7E;
            --gradient-bg: linear-gradient(135deg, #003C7F 0%, #0072BC 100%);
            --card-shadow: 0 8px 25px rgba(0, 60, 127, 0.15);
            --hover-shadow: 0 15px 35px rgba(0, 60, 127, 0.25);
            --border-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        /* ขนาด sidebar แบบย่อ */
.sidebar-mini.sidebar-collapse .main-sidebar {
    width: 80px !important;  /* << เปลี่ยนตรงนี้ เช่น 60, 80, 100 px */
}
.sidebar-mini.sidebar-collapse .content-wrapper {
    margin-left: 80px !important; /* ให้ตรงกับด้านบน */
}


        

        /* Header Modernization */
        .main-header {
            background: var(--gradient-bg) !important;
            border: none !important;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }

        .main-header .navbar {
            background: transparent !important;
        }

        .logo {
            background: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
            backdrop-filter: blur(10px);
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
            transition: var(--transition);
        }

        .logo:hover {
            background: rgba(255, 255, 255, 0.2) !important;
            transform: translateX(3px);
        }

        .logo-lg {
            font-weight: 600;
            letter-spacing: 1px;
        }

        /* Sidebar Modernization */
        .main-sidebar {
            background: #003C7E!important;
            box-shadow: var(--card-shadow);
            border-radius: 0 20px 20px 0;
            transition: var(--transition);
        }

        .sidebar {
            padding-top: 20px;
        }

        .user-panel {
            background: var(--gradient-bg);
            margin: 5px;
            padding: 20px;
            width: 90%;
            border-radius: var(--border-radius);
            color: white;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }

        .user-panel:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        .user-panel .image img {
            border: 3px solid rgba(255, 255, 255, 0.3);
            transition: var(--transition);
        }

        .user-panel:hover .image img {
            border-color: white;
            transform: scale(1.05);
        }

        .user-panel .info p {
            color: white !important;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .user-panel .info a {
            color: rgba(255, 255, 255, 0.9) !important;
            text-decoration: none;
            font-size: 13px;
        }

        .user-panel .info a:hover {
            color: white !important;
        }

        /* Search Form */
        .sidebar-form {
            margin: 15px;
        }

        .sidebar-form .form-control {
            border-radius: 25px;
            border: 2px solid transparent;
            background: #f8f9fa;
            padding: 12px 20px;
            transition: var(--transition);
        }

        .sidebar-form .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(0, 114, 188, 0.1);
            background: white;
        }

        .sidebar-form .btn {
            border-radius: 25px;
            background: var(--primary-blue);
            border-color: var(--primary-blue);
            transition: var(--transition);
        }
        
        .sidebar-form .btn:hover {
            background: var(--primary-dark);
            transform: scale(1.05);
        }

        /* Menu Modernization */
        .sidebar-menu {
            padding: 0 15px;
        }

        .sidebar-menu > li.header {
            background: transparent;
            color: var(--primary-dark);
            font-weight: 600;
            font-size: 12px;
            letter-spacing: 1px;
            padding: 15px 20px 10px;
        }

        .sidebar-menu > li > a {
            border-radius: var(--border-radius);
            background: transparent !important;
            margin: 5px 0;
            padding: 15px ;
            transition: background .2s;
            position: relative;
            overflow: hidden;
        }

        .sidebar-menu > li > a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-bg);
            transition: var(--transition);
            z-index: -1;
        }

        .sidebar-menu > li > a:hover {
            background: transparent !important;
            color: white;
            transform: translateX(5px);
            box-shadow: var(--card-shadow);
        }

        .sidebar-menu > li > a:hover::before {
            left: 0;
        }

        .sidebar-menu > li.active > a {
            background:#2b2b2b !important;
            color: white !important;
            box-shadow: var(--card-shadow);
        }

        .sidebar-menu > li > a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            transition: var(--transition);
        }

        .sidebar-menu > li > a:hover i {
            transform: scale(1.7);
        }

        /* Content Area */
        .content-wrapper {
            background: transparent !important;
            margin-left: 250px;
            padding: 20px;
            min-height: calc(100vh - 100px);
        }

        /* Control Sidebar */
        .control-sidebar {
            background: var(--gradient-bg) !important;
            border-radius: 20px 0 0 20px;
        }

        .navbar-custom-menu .nav > li > a {
            color: rgba(255, 255, 255, 0.9) !important;
            transition: var(--transition);
            padding: 15px;
            border-radius: var(--border-radius);
        }

        .navbar-custom-menu .nav > li > a:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
            transform: scale(1.1);
        }

        /* Sidebar Toggle */
        .sidebar-toggle {
            color: rgba(255, 255, 255, 0.9) !important;
            padding: 15px !important;
            transition: var(--transition) !important;
            border-radius: var(--border-radius) !important;
        }

        .sidebar-toggle:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
        }

        /* Responsive Design */
        @media (max-width: 767px) {
            .content-wrapper {
                margin-left: 0;
                padding: 15px;
            }
            
            .main-sidebar {
                border-radius: 0;
            }
            
            .user-panel {
                margin: 10px;
                padding: 15px;
            }
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        .slide-in-left {
            animation: slideInLeft 0.5s ease-out;
        }

        .slide-in-up {
            animation: slideInUp 0.4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInLeft {
            from { 
                opacity: 0;
                transform: translateX(-30px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Page loading animation */
        .page-loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-bg);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .top-monitor{height:50vh;background:#000;border-radius:12px;box-shadow:0 6px 20px rgba(0,0,0,.2);}
.monitor-row{display:flex;gap:20px;align-items:stretch;margin-bottom:20px;}
.monitor-left{flex:1;}
.monitor-right{width:280px;display:flex;flex-direction:column;gap:16px;}
.btn-square{height:120px;border-radius:16px;font-size:18px;font-weight:600;display:flex;align-items:center;justify-content:center;}
.btn-square i{margin-right:8px;}
.hidden-inline{display:none !important;}
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Page Loading -->
    <div class="page-loading" id="pageLoading">
        <div class="loading-spinner"></div>
    </div>

    <div class="wrapper fade-in">
        <header class="main-header slide-in-up">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>RK</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>ROCKET&nbsp;API</b></span>
            </a>
            
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar">
                                <i class="fa fa-gears"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar slide-in-left">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../img/man.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo ($_SESSION['APIUser']); ?></p>
                        <a href="#" data-toggle="modal" data-target="#Detail" data-toggle="tooltip" data-placement="top" title="ดูรายละเอียด">
                            <i class="fa fa-circle text-success"></i>&nbsp;ออนไลน์
                        </a>
                    </div>
                </div>

                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="page" class="form-control" placeholder="ค้นหา...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN&nbsp;NAVIGATION</li>

  <!-- ปุ่มที่ 1: หน้าหลัก -->
  <li class="<?= is_active('', $current) ?>">
    <a href="index.php">
      <i class="fa fa-dashboard text-yellow"></i>
      <span>หน้าหลัก</span>
    </a>
  </li>

  <!-- ปุ่มที่ 2: เพิ่ม Mikrotik -->
  <li class="<?= is_active('add_server', $current) ?>">
    <a href="index.php?page=add_server">
      <i class="fa fa-server text-blue"></i>
      <span>เพิ่ม&nbsp;Mikrotik</span>
    </a>
  </li>

  <!-- ปุ่มที่ 3: เปลี่ยน Password -->
  <li class="<?= is_active('Change-Password', $current) ?>">
    <a href="index.php?page=Change-Password">
      <i class="fa fa-id-card-o text-green"></i>
      <span>เปลี่ยน&nbsp;Password</span>
    </a>
  </li>

  <!-- ปุ่มที่ 4: Security Site (แสดงเมื่อสิทธิ์ผ่าน) -->
  <?php if($secom_v1===$_SESSION['security']){ ?>
  <li class="<?= is_active('security_site', $current) ?>">
    <a href="index.php?page=security_site">
      <i class="fa fa-shield text-aqua"></i>
      <span>Security&nbsp;Site</span>
    </a>
  </li>
  <?php } ?>

  <!-- ออกจากระบบ ไม่ต้อง active -->
  <li>
  <a href="#" onclick="confirmLogout(event)">
    <i class="fa fa-power-off text-red"></i>
    <span>ออกจากระบบ</span>
  </a>
</li>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
.swal2-popup.logout-popup{width:560px!important;padding:28px!important;}
.logout-title{font-size:1.9rem!important;}
.logout-text{font-size:1.4rem!important;}
/* จัดปุ่มให้กึ่งกลางและช่องไฟเท่ากัน */
.logout-actions{display:flex!important;justify-content:center;align-items:center;gap:16px;width:100%;}
/* ทำให้ปุ่มสองอันกว้าง/สูงเท่ากัน */
.btn-same{width:220px;height:54px;margin:0!important;padding:0!important;border-radius:12px;font-size:16px;font-weight:600;}
/* สีปุ่ม */
.logout-cancel{background:#e11919!important;color:#fff!important;}
.logout-confirm{background:#4b4b4b!important;color:#fff!important;}
.logout-cancel:hover{filter:brightness(0.95);}
.logout-confirm:hover{filter:brightness(1.1);}
</style>

<script>
function confirmLogout(e){
  e.preventDefault();
  Swal.fire({
    icon: 'warning',
    title: 'ยืนยันการออกจากระบบ?',
    text: 'คุณต้องการออกจากระบบใช่หรือไม่',
    showCancelButton: true,

    confirmButtonText: 'ใช่, ออกจากระบบ',
    cancelButtonText: 'ยกเลิก',
    confirmButtonColor: 'rgba(59, 59, 59, 1)',      
    cancelButtonColor: '#ff0000ff',
    customClass: {
      popup: 'logout-popup',
      title: 'logout-title',
      htmlContainer: 'logout-text',
      actions: 'logout-actions',
      confirmButton: 'btn-same logout-confirm',
      cancelButton: 'btn-same logout-cancel'
    }
  }).then((r)=>{ if(r.isConfirmed) window.location.href='../admin/logout.php'; });
}
</script>

</ul>
            </section>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper slide-in-up">
            <?php
            // zone list
            if($_REQUEST['page']=="add_customer_server"){include("add_customer_server.php");}
            else if($_REQUEST['page']=="setup_server"){include("setup_server.php");}
            else if($_REQUEST['page']=="add_server"){include("add_server.php");}
            //zone link
            else if($_REQUEST['page']=="system_conn"){include("../system/system_conn.php");}
            // zone edit
            else if($_REQUEST['page']=="editserver"){include("edit_serv.php");}
            else if($_REQUEST['page']=="Change-Password"){include("change_pass.php");}
            else if($_REQUEST['page']=="security_site"){include("security_site.php");}
            // zone delete
            else if($_REQUEST['page']=="deleteserver"){include("delete_server.php");}
            // default not value get page or welcome login
            else{include("listserver.php");}
            ?>
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <div class="tab-content">
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <!-- Settings content here -->
                </div>
            </div>
        </aside>
    </div>

    <!-- JavaScript -->
    <script src="../plugins/jQueryUI/jquery-2.2.3.min.js"></script>
    <script src="../distUI/js/bootstrap.min.js"></script>
    <script src="../distUI/js/app.min.js"></script>
    <script src="../assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="../plugins/jscolor/jscolor.js"></script>
    <script src="../assets/js/admin-custom.js"></script>
    <script src="../distUI/js/demo.min.js"></script>

    <script type="text/javascript">
        // Page loading animation
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('pageLoading').style.opacity = '0';
                setTimeout(function() {
                    document.getElementById('pageLoading').style.display = 'none';
                }, 200);
            }, 200);
        });

        // Initialize date/time
        window.onload = date_time('date_time');

        // Popup function
        function popup(url, name, windowWidth, windowHeight) {
            myleft = (screen.width) ? (screen.width - windowWidth) / 2 : 100;
            mytop = (screen.height) ? (screen.height - windowHeight) / 2 : 100;
            properties = "width=" + windowWidth + ",height=" + windowHeight;
            properties += ",scrollbars=yes, top=" + mytop + ",left=" + myleft;
            window.open(url, name, properties);
        }

        // DataTable initialization
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "language": {
                    "sProcessing": "กำลังดำเนินการ...",
                    "sLengthMenu": "แสดง _MENU_ รายชื่อ",
                    "sZeroRecords": "ไม่พบข้อมูล",
                    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายชื่อ",
                    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายชื่อ",
                    "sInfoFiltered": "(ค้นหาข้อมูลจาก _MAX_ รายชื่อ)",
                    "sInfoPostFix": "",
                    "sSearch": "ค้นหา: ",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sPrevious": "ก่อนหน้า",
                        "sNext": "ถัดไป",
                        "sLast": "หน้าสุดท้าย"
                    }
                }
            });

            // Add smooth page transitions
            $('a').on('click', function(e) {
                const href = $(this).attr('href');
                if (href && href.indexOf('#') !== 0 && href.indexOf('javascript:') !== 0) {
                    e.preventDefault();
                    $('.content-wrapper').fadeOut(200, function() {
                        window.location.href = href;
                    });
                }
            });

            // Add hover effects to menu items
            $('.sidebar-menu li a').hover(
                function() {
                    $(this).find('i').addClass('animated pulse');
                },
                function() {
                    $(this).find('i').removeClass('animated pulse');
                }
            );
        });
    </script>
    
</body>
</html>