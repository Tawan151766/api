<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- SweetAlert v1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>

<?php 

$showAlert = '';

if(!empty($_REQUEST['old'])){ 
    $id = $_SESSION['APIID']; 
    $old = md5($_REQUEST['old']); 
    $new = md5($_REQUEST['new']); 
    $con = md5($_REQUEST['con']); 
    
    $sql = mysql_query("SELECT am_pass FROM am WHERE am_pass='".$old."'"); 
    $num = mysql_num_rows($sql); 
    
    if($num == 0){ 
        $showAlert = "
        swal({
            title: 'ผิดพลาด!',
            text: 'รหัสผ่านเก่าไม่ถูกต้อง กรุณาตรวจสอบรหัสผ่านเก่าของคุณ',
            type: 'error',
            confirmButtonText: 'ตกลง',
            confirmButtonColor: '#0072BC'
        });";
    } else if($new != $con){ 
        $showAlert = "
        swal({
            title: 'ผิดพลาด!',
            text: 'รหัสผ่านใหม่และการยืนยันรหัสผ่านไม่ตรงกัน',
            type: 'error',
            confirmButtonText: 'ตกลง',
            confirmButtonColor: '#0072BC'
        });";
    } else { 
        mysql_query("UPDATE am SET am_pass='".$new."' WHERE am_id='".$id."'"); 
        $showAlert = "
        swal({
            title: 'สำเร็จ!',
            text: 'รหัสผ่านของคุณได้ถูกเปลี่ยนเรียบร้อยแล้ว',
            type: 'success',
            confirmButtonText: 'ตกลง',
            confirmButtonColor: '#0072BC'
        }, function() {
            window.location.href = 'index.php';
        });";
    } 
} 
?>

<style>
.password-change-container {
    max-width: 720px;
    margin: 0 auto;
    padding: 20px;
}

.password-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
    overflow: hidden;
    transform: scale(1.02);
}

.password-header {
    background: linear-gradient(135deg, #0072BC 0%, #005A9C 100%);
    padding: 30px;
    text-align: center;
    position: relative;
}

.password-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.shield-icon {
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
    position: relative;
    z-index: 1;
}

.shield-icon i {
    font-size: 34px;
    color: white;
}

.password-header h3 {
    color: white;
    font-size: 28px;
    font-weight: 600;
    margin: 0;
    position: relative;
    z-index: 1;
}

.password-body {
    padding: 36px;
}

.alert-info-custom {
    background: #E3F2FD;
    border-left: 4px solid #0072BC;
    padding: 14px 18px;
    border-radius: 6px;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    gap: 14px;
}

.alert-info-custom i {
    color: #0072BC;
    font-size: 20px;
}

.alert-info-custom span {
    color: #1565C0;
    font-size: 15px;
    line-height: 1.6;
}

.form-group {
    margin-bottom: 24px;
}

.form-group label {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
    color: #333;
    font-weight: 500;
    font-size: 16px;
}

.form-group label i {
    color: #0072BC;
    font-size: 18px;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 18px;
    pointer-events: none;
    transition: color 0.3s;
}

.form-control {
    width: 100%;
    padding: 14px 46px 14px 42px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s;
    background: #f8f9fa;
    box-sizing: border-box;
}

.form-control:focus {
    outline: none;
    border-color: #0072BC;
    background: white;
    box-shadow: 0 0 0 3px rgba(0, 114, 188, 0.12);
}

.form-control:focus ~ .input-icon {
    color: #0072BC;
}

.password-toggle {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #999;
    font-size: 18px;
    transition: color 0.3s;
    background: none;
    border: none;
    padding: 5px;
}

.password-toggle:hover {
    color: #0072BC;
}

.strength-meter {
    height: 5px;
    background: #e0e0e0;
    border-radius: 3px;
    margin-top: 8px;
    overflow: hidden;
}

.strength-bar {
    height: 100%;
    width: 0;
    transition: all 0.3s ease;
    border-radius: 3px;
}

.strength-weak {
    background: #f44336;
    width: 33%;
}

.strength-medium {
    background: #ff9800;
    width: 66%;
}

.strength-strong {
    background: #4caf50;
    width: 100%;
}

.help-text {
    font-size: 13px;
    color: #666;
    margin-top: 6px;
    display: none;
}

.help-text.show {
    display: block;
}

.help-text.success {
    color: #4caf50;
}

.help-text.error {
    color: #f44336;
}

.button-group {
    display: flex;
    gap: 14px;
    margin-top: 28px;
}

.btn {
    flex: 1;
    padding: 14px 24px;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-primary {
    background: #0072BC;
    color: white;
}

.btn-primary:hover {
    background: #005A9C;
    transform: translateY(-1px);
    box-shadow: 0 4px 14px rgba(0, 114, 188, 0.3);
}

.btn-secondary {
    background: white;
    color: #666;
    border: 1px solid #ddd;
}

.btn-secondary:hover {
    background: #f5f5f5;
    border-color: #0072BC;
    color: #0072BC;
}

.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.btn.loading {
    position: relative;
    color: transparent;
}

.btn.loading::after {
    content: '';
    position: absolute;
    width: 18px;
    height: 18px;
    top: 50%;
    left: 50%;
    margin-left: -9px;
    margin-top: -9px;
    border: 2px solid #ffffff;
    border-radius: 50%;
    border-top-color: transparent;
    animation: spinner 0.8s linear infinite;
}

@keyframes spinner {
    to { transform: rotate(360deg); }
}

.footer-copyright {
    text-align: center;
    padding: 22px;
    color: #999;
    font-size: 14px;
}

.footer-copyright i {
    color: #0072BC;
}

/* SweetAlert v1 */
.sweet-alert {
    border-radius: 12px !important;
}

.sweet-alert h2 {
    font-size: 24px !important;
    font-weight: 600 !important;
    color: #333 !important;
    margin-bottom: 15px !important;
}

.sweet-alert p {
    font-size: 16px !important;
    line-height: 1.5 !important;
    color: #666 !important;
}

.sweet-alert .sa-icon {
    margin: 20px auto 30px !important;
}

.sweet-alert button {
    background-color: #0072BC !important;
    border: none !important;
    border-radius: 6px !important;
    padding: 12px 30px !important;
    font-weight: 500 !important;
    font-size: 16px !important;
}

.sweet-alert button:hover {
    background-color: #005A9C !important;
}

@media (max-width: 576px) {
    .password-body {
        padding: 24px;
    }
    
    .button-group {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
    }
}
</style>

<section class="content">
    <div class="password-change-container">
        <div class="password-card">
            <div class="password-header">
                <div class="shield-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>เปลี่ยนรหัสผ่าน User</h3>
            </div>
            
            <div class="password-body">
                <div class="alert-info-custom">
                    <i class="fas fa-info-circle"></i>
                    <span>กรุณากำหนดรหัสผ่านที่มีความปลอดภัยสูงเพื่อปกป้องข้อมูลของคุณ</span>
                </div>
                
                <form id="changePasswordForm" method="POST" action="">
                    <div class="form-group">
                        <label for="oldPassword">
                            <i class="fas fa-lock"></i>
                            รหัสผ่านเดิม
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-key input-icon"></i>
                            <input type="password" 
                                   id="oldPassword" 
                                   name="old" 
                                   class="form-control" 
                                   placeholder="กรอกรหัสผ่านเดิมของคุณ" 
                                   required>
                            <button type="button" class="password-toggle" onclick="togglePassword('oldPassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="newPassword">
                            <i class="fas fa-lock"></i>
                            รหัสผ่านใหม่
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-key input-icon"></i>
                            <input type="password" 
                                   id="newPassword" 
                                   name="new" 
                                   class="form-control" 
                                   placeholder="กรอกรหัสผ่านใหม่" 
                                   required 
                                   onkeyup="checkPasswordStrength(this.value)"
                                   onfocus="showHelpText('newPasswordHelp')"
                                   onblur="hideHelpText('newPasswordHelp')">
                            <button type="button" class="password-toggle" onclick="togglePassword('newPassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="strength-meter">
                            <div id="strengthBar" class="strength-bar"></div>
                        </div>
                        <div id="newPasswordHelp" class="help-text">
                            ใช้อักษรตัวใหญ่ ตัวเล็ก ตัวเลข และอักขระพิเศษ อย่างน้อย 8 ตัว
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">
                            <i class="fas fa-lock"></i>
                            ยืนยันรหัสผ่านใหม่
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-key input-icon"></i>
                            <input type="password" 
                                   id="confirmPassword" 
                                   name="con" 
                                   class="form-control" 
                                   placeholder="กรอกรหัสผ่านใหม่อีกครั้ง" 
                                   required 
                                   onkeyup="checkPasswordMatch()">
                            <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div id="matchText" class="help-text"></div>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-check"></i>
                            บันทึกรหัสผ่าน
                        </button>
                        <button type="reset" class="btn btn-secondary" onclick="resetForm()">
                            <i class="fas fa-redo"></i>
                            ล้างข้อมูล
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        
    </div>
</section>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const button = field.nextElementSibling;
    const icon = button.querySelector('i');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function checkPasswordStrength(password) {
    const strengthBar = document.getElementById('strengthBar');
    let strength = 0;
    
    if (password.length >= 8) strength++;
    if (password.match(/[a-z]+/)) strength++;
    if (password.match(/[A-Z]+/)) strength++;
    if (password.match(/[0-9]+/)) strength++;
    if (password.match(/[$@#&!]+/)) strength++;
    
    strengthBar.className = 'strength-bar';
    
    if (password.length > 0) {
        if (strength <= 2) {
            strengthBar.classList.add('strength-weak');
        } else if (strength === 3 || strength === 4) {
            strengthBar.classList.add('strength-medium');
        } else {
            strengthBar.classList.add('strength-strong');
        }
    }
}

function checkPasswordMatch() {
    const newPass = document.getElementById('newPassword').value;
    const confirmPass = document.getElementById('confirmPassword').value;
    const matchText = document.getElementById('matchText');
    
    if (confirmPass.length > 0) {
        matchText.classList.add('show');
        if (newPass === confirmPass) {
            matchText.innerHTML = '<i class="fas fa-check-circle"></i> รหัสผ่านตรงกัน';
            matchText.classList.remove('error');
            matchText.classList.add('success');
        } else {
            matchText.innerHTML = '<i class="fas fa-times-circle"></i> รหัสผ่านไม่ตรงกัน';
            matchText.classList.remove('success');
            matchText.classList.add('error');
        }
    } else {
        matchText.classList.remove('show');
    }
}

function showHelpText(id) {
    document.getElementById(id).classList.add('show');
}

function hideHelpText(id) {
    document.getElementById(id).classList.remove('show');
}

function resetForm() {
    document.getElementById('strengthBar').className = 'strength-bar';
    document.getElementById('matchText').classList.remove('show');
    document.querySelectorAll('.help-text').forEach(el => {
        el.classList.remove('show', 'success', 'error');
    });
}

document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
    const oldPass = document.getElementById('oldPassword').value;
    const newPass = document.getElementById('newPassword').value;
    const confirmPass = document.getElementById('confirmPassword').value;
    
    if (!oldPass.trim()) {
        e.preventDefault();
        swal({
            title: 'แจ้งเตือน!',
            text: 'กรุณากรอกรหัสผ่านเดิม โปรดระบุรหัสผ่านเดิมของคุณ',
            type: 'warning',
            confirmButtonText: 'ตกลง',
            confirmButtonColor: '#0072BC'
        });
        return false;
    }
    
    if (newPass.length < 8) {
        e.preventDefault();
        swal({
            title: 'แจ้งเตือน!',
            text: 'รหัสผ่านสั้นเกินไป รหัสผ่านควรมีความยาวอย่างน้อย 8 ตัวอักษร',
            type: 'warning',
            confirmButtonText: 'ตกลง',
            confirmButtonColor: '#0072BC'
        });
        return false;
    }
    
    if (newPass !== confirmPass) {
        e.preventDefault();
        swal({
            title: 'ผิดพลาด!',
            text: 'รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบรหัสผ่านใหม่และการยืนยันให้ตรงกัน',
            type: 'error',
            confirmButtonText: 'ตกลง',
            confirmButtonColor: '#0072BC'
        });
        return false;
    }
    
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.classList.add('loading');
    submitBtn.disabled = true;
    
    swal({
        title: 'กำลังดำเนินการ...',
        text: 'กรุณารอสักครู่',
        type: 'info',
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false
    });
});

window.addEventListener('DOMContentLoaded', function() {
    document.getElementById('oldPassword').focus();
    
    <?php if($showAlert): ?>
    <?php echo $showAlert; ?>
    <?php endif; ?>
});
</script>