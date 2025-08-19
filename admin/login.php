<?php
include '../include/class.mysqldb.php';
include '../include/config.inc.php';
include ('convert.php');
$secu = mysql_fetch_array(mysql_query('SELECT admin_pin FROM mt_config'));
$ad_pin = $secu['admin_pin'];
$mdEmpty_pin = md5('000000000');
if (empty($ad_pin) || ($ad_pin == $mdEmpty_pin)) {
    // unset($_SESSION['EmpUser']);
    if (isset($_REQUEST['am_user'])) {
        $user = $_REQUEST['am_user'];
        $pass = md5($_REQUEST['am_pass']);
        $conn = new mysqldb();
        $sql = "SELECT * FROM am where am_user = '" . $user . "' and am_pass='" . $pass . "'";
        $query = $conn->query($sql);
        $data = $conn->fetch($query);
        if ($conn->num_rows() == 0) {
            echo "<script language='javascript'>alert('Username or Password incorrect')</script>";
        } else {
            // /unset($_SESSION['EmpUser']);
            $_SESSION['APIUser'] = $data->am_user;
            $_SESSION['APIID'] = $data->am_id;
            $_SESSION['security'] = $mdEmpty_pin;
            // echo "<meta http-equiv='refresh' content='0;url=security_con.php' />";
            echo "<meta http-equiv='refresh' content='0;url=index.php' />";
            exit(0);
        }
    }
} else {
    // ///////////////////////////////////////////////////////////////////////////////
    // /unset($_SESSION['EmpUser']);
    if (isset($_REQUEST['am_user'])) {
        $user = $_REQUEST['am_user'];
        $pass = $_REQUEST['security_pin'];
        $conn = new mysqldb();
        $sql = "SELECT * FROM am where am_user = '" . $user . "'";
        $query = $conn->query($sql);
        $data = $conn->fetch($query);
        if ($conn->num_rows() == 0) {
            echo "<script language='javascript'>alert('Username or Password incorrect')</script>";
        } else {
            // /unset($_SESSION['EmpUser']);
            $_SESSION['APIUser'] = $data->am_user;
            $_SESSION['APIID'] = $data->am_id;
            $admin_secu = mysql_fetch_array(mysql_query('SELECT admin_pin FROM mt_config'));
            $md_security_pin = md5($pass);
            if ($md_security_pin == $admin_secu['admin_pin']) {
                $_SESSION['security'] = $admin_secu['admin_pin'];
                echo "<meta http-equiv='refresh' content='0;url=index.php' />";
                $error = $admin_secu['admin_pin'];
            } else {
                $query = mysql_query("SELECT * FROM mt_config WHERE customer_pin='" . $pass . "'");
                $i = 0;
                while ($result = mysql_fetch_array($query)) {
                    $i++;
                    $pass_cus = $result['customer_pin'];
                }
                if (!empty($pass_cus)) {
                    $_SESSION['security'] = $pass_cus;
                    echo "<meta http-equiv='refresh' content='0;url=index.php' />";
                    $error = $pass_cus;
                } else {
                    $query = mysql_query("SELECT * FROM mt_config WHERE user_pin='" . $pass . "'");
                    $i = 0;
                    while ($result = mysql_fetch_array($query)) {
                        $i++;
                        $pass_user = $result['user_pin'];
                    }
                    if (!empty($pass_user)) {
                        $_SESSION['security'] = $pass_user;
                        echo "<meta http-equiv='refresh' content='0;url=index.php' />";
                        $error = $pass_user;
                    }
                }
            }  // no admin
            if (empty($error)) {
                echo "<script language='javascript'>alert('Username or Password incorrect')</script>";
            }
        }
    }
    // ///////////////////////////////////////////////////////////////////////////////////////
}
?>
    <!DOCTYPE html>
    <html lang="th">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ROCKET API - Modern Login</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="../img/rkicon.png" rel="shortcut icon" type="image/x-icon" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: #f8fafc;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }

            .login-container {
                background: white;
                border-radius: 24px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 1000px;
                min-height: 600px;
                display: flex;
                overflow: hidden;
                position: relative;
            }

            /* Left Side - Illustration */
            .left-side {
                flex: 1;
                background: linear-gradient(135deg, #003C7F 0%, #0072BC 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            .illustration {
                text-align: center;
                color: white;
                z-index: 2;
                position: relative;
            }

            .illustration h1 {
                font-size: 48px;
                font-weight: 700;
                margin-bottom: 16px;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .illustration .rocket {
                color: #ffffff;
            }

            .illustration p {
                font-size: 18px;
                opacity: 0.9;
                margin-bottom: 32px;
            }

            .illustration-graphic {
                width: 300px;
                height: 300px;
                margin: 0 auto;
                position: relative;
            }

            /* Decorative elements */
            .left-side::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
                animation: float 20s ease-in-out infinite;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(1deg); }
            }

            /* Right Side - Form */
            .right-side {
                flex: 1;
                padding: 64px 48px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .form-header {
                margin-bottom: 48px;
            }

            .form-header h2 {
                font-size: 32px;
                font-weight: 700;
                color: #1f2937;
                margin-bottom: 8px;
            }

            .form-header p {
                color: #6b7280;
                font-size: 16px;
                line-height: 1.5;
            }

            .form-group {
                margin-bottom: 24px;
                position: relative;
            }

            .form-group label {
                display: block;
                font-size: 14px;
                font-weight: 500;
                color: #374151;
                margin-bottom: 8px;
            }

            .input-wrapper {
                position: relative;
            }

            .form-control {
                width: 100%;
                padding: 16px 16px 16px 48px;
                border: 2px solid #e5e7eb;
                border-radius: 12px;
                font-size: 16px;
                font-weight: 400;
                color: #1f2937;
                background: #ffffff;
                transition: all 0.3s ease;
                outline: none;
            }

            .form-control:focus {
                border-color: #0072BC;
                box-shadow: 0 0 0 3px rgba(0, 114, 188, 0.1);
            }

            .form-control::placeholder {
                color: #9ca3af;
                font-weight: 400;
            }

            .input-icon {
                position: absolute;
                left: 16px;
                top: 50%;
                transform: translateY(-50%);
                color: #9ca3af;
                font-size: 18px;
                transition: color 0.3s ease;
            }

            .form-control:focus + .input-icon {
                color: #0072BC;
            }

            .remember-me {
                display: flex;
                align-items: center;
                margin-bottom: 32px;
            }

            .remember-me input[type="checkbox"] {
                width: 18px;
                height: 18px;
                margin-right: 12px;
                accent-color: #0072BC;
            }

            .remember-me label {
                font-size: 14px;
                color: #6b7280;
                cursor: pointer;
                margin-bottom: 0;
            }

            .login-btn {
                width: 100%;
                padding: 16px;
                background: linear-gradient(135deg, #003C7F 0%, #0072BC 100%);
                border: none;
                border-radius: 12px;
                color: white;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .login-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0, 114, 188, 0.3);
            }

            .login-btn:active {
                transform: translateY(0);
            }

            .login-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: left 0.5s;
            }

            .login-btn:hover::before {
                left: 100%;
            }

            .divider {
                text-align: center;
                margin: 32px 0;
                position: relative;
            }

            .divider::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 0;
                right: 0;
                height: 1px;
                background: #e5e7eb;
            }

            .divider span {
                background: rgba(255, 255, 255, 0.95);
                padding: 0 16px;
                color: #9ca3af;
                font-size: 14px;
            }

            .footer-text {
                text-align: center;
                color: #9ca3af;
                font-size: 12px;
                margin-top: 24px;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .login-container {
                    flex-direction: column;
                    max-width: 420px;
                }
                
                .left-side {
                    min-height: 200px;
                    padding: 32px 24px;
                }
                
                .illustration h1 {
                    font-size: 32px;
                }
                
                .illustration p {
                    font-size: 16px;
                }
                
                .illustration-graphic {
                    width: 200px;
                    height: 200px;
                }
                
                .right-side {
                    padding: 32px 24px;
                }
                
                .form-header h2 {
                    font-size: 24px;
                }
            }

            /* Animation */
            .login-container {
                animation: slideUp 0.6s ease-out;
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
    </head>

    <body>
        <div class="login-container">
            <!-- Left Side - Illustration -->
            <div class="left-side">
                <div class="illustration">
                    <h1><span class="rocket">ROCKET</span> API</h1>
                    <p>MikroTik Management System</p>
                    
                    <!-- SVG Illustration -->
                    <div class="illustration-graphic">
                        <svg viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                            <!-- Background elements -->
                            <circle cx="100" cy="80" r="40" fill="rgba(255,255,255,0.1)" />
                            <circle cx="320" cy="200" r="30" fill="rgba(255,255,255,0.1)" />
                            <rect x="50" y="150" width="60" height="40" rx="8" fill="rgba(255,255,255,0.15)" />
                            
                            <!-- Main illustration -->
                            <g transform="translate(50, 50)">
                                <!-- Person -->
                                <circle cx="80" cy="60" r="25" fill="#ffffff" />
                                <rect x="60" y="85" width="40" height="60" rx="20" fill="#0072BC" />
                                <rect x="65" y="90" width="30" height="8" rx="4" fill="#ffffff" opacity="0.3" />
                                
                                <!-- Computer/Dashboard -->
                                <rect x="150" y="100" width="120" height="80" rx="8" fill="#ffffff" />
                                <rect x="160" y="110" width="100" height="50" rx="4" fill="#f1f5f9" />
                                <rect x="165" y="115" width="90" height="6" rx="3" fill="#0072BC" />
                                <rect x="165" y="125" width="60" height="4" rx="2" fill="#cbd5e1" />
                                <rect x="165" y="135" width="70" height="4" rx="2" fill="#cbd5e1" />
                                
                                <!-- Security elements -->
                                <circle cx="300" cy="140" r="20" fill="#ffffff" />
                                <path d="M290 135 L295 140 L310 125" stroke="#0072BC" stroke-width="3" fill="none" stroke-linecap="round" />
                                
                                <!-- Network connections -->
                                <path d="M100 120 Q125 100 150 120" stroke="rgba(255,255,255,0.5)" stroke-width="2" fill="none" stroke-dasharray="5,5" />
                                <path d="M270 140 Q290 120 300 140" stroke="rgba(255,255,255,0.5)" stroke-width="2" fill="none" stroke-dasharray="5,5" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="right-side">
                <div class="form-header">
                    <h2>ยินดีต้อนรับ</h2>
                    <?php if (empty($ad_pin) || ($ad_pin == $mdEmpty_pin)): ?>
                        <p>กรุณาเข้าสู่ระบบด้วย <strong>Username</strong> และ <strong>Password</strong> ของคุณ</p>
                    <?php else: ?>
                        <p>กรุณาเข้าสู่ระบบด้วย <strong>Username</strong> และ <strong>PIN</strong> ของคุณ</p>
                    <?php endif; ?>
                </div>

                <!-- Login Form -->
                <form role="form" action="" method="post" name="login" class="login-form">
                <!-- Username Field -->
                <div class="form-group">
                    <label for="am_user">ชื่อผู้ใช้</label>
                    <div class="input-wrapper">
                        <input type="text" 
                               id="am_user" 
                               name="am_user" 
                               class="form-control" 
                               placeholder="กรอกชื่อผู้ใช้"
                               required>
                        <i class="fas fa-user input-icon"></i>
                    </div>
                </div>

                <!-- Password/PIN Field -->
                <?php if (empty($ad_pin) || ($ad_pin == $mdEmpty_pin)): ?>
                    <div class="form-group">
                        <label for="am_pass">รหัสผ่าน</label>
                        <div class="input-wrapper">
                            <input type="password" 
                                   id="am_pass" 
                                   name="am_pass" 
                                   class="form-control" 
                                   placeholder="กรอกรหัสผ่าน"
                                   required>
                            <i class="fas fa-lock input-icon"></i>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <label for="security_pin">รหัส PIN</label>
                        <div class="input-wrapper">
                            <input type="password" 
                                   id="security_pin" 
                                   name="security_pin" 
                                   class="form-control" 
                                   placeholder="กรอกรหัส PIN"
                                   required>
                            <i class="fas fa-key input-icon"></i>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Remember Me -->
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="r2">
                    <label for="remember">จดจำการเข้าสู่ระบบ</label>
                </div>

                <!-- Login Button -->
                <button type="submit" name="singlebutton" class="login-btn">
                    <i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i>
                    เข้าสู่ระบบ
                </button>
                </form>

                <!-- Footer -->
                <div class="footer-text">
                    <p>© 2025 ROCKET API. สงวนลิขสิทธิ์</p>
                </div>
            </div>
        </div>
        <script>
            // Modern form interactions
            document.addEventListener('DOMContentLoaded', function() {
                // Add focus effects
                const inputs = document.querySelectorAll('.form-control');
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        this.parentElement.classList.add('focused');
                    });
                    
                    input.addEventListener('blur', function() {
                        this.parentElement.classList.remove('focused');
                    });
                });

                // Form validation
                const form = document.querySelector('.login-form');
                form.addEventListener('submit', function(e) {
                    const username = document.getElementById('am_user').value;
                    const password = document.getElementById('am_pass') || document.getElementById('security_pin');
                    
                    if (!username.trim()) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'กรุณากรอกชื่อผู้ใช้',
                            text: 'ชื่อผู้ใช้เป็นข้อมูลที่จำเป็น',
                            confirmButtonColor: '#0072BC'
                        });
                        return;
                    }
                    
                    if (password && !password.value.trim()) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'กรุณากรอกรหัสผ่าน',
                            text: 'รหัสผ่านเป็นข้อมูลที่จำเป็น',
                            confirmButtonColor: '#0072BC'
                        });
                        return;
                    }
                });

                // Replace alert with SweetAlert2
                <?php if (isset($_REQUEST['am_user']) && ((empty($ad_pin) || ($ad_pin == $mdEmpty_pin) && $conn->num_rows() == 0) || (!empty($ad_pin) && $ad_pin != $mdEmpty_pin && empty($error)))): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'เข้าสู่ระบบไม่สำเร็จ',
                    text: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
                    confirmButtonColor: '#0072BC'
                });
                <?php endif; ?>
            });
        </script>
    </body>

    </html>
