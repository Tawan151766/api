<?php
$secu = mysql_fetch_array(mysql_query("SELECT admin_pin FROM mt_config"));
$ad_pin = $secu['admin_pin'];

$Empty_pin = "000000000";
$mdEmpty_pin = md5($Empty_pin);
$is_default = ($ad_pin == $mdEmpty_pin);

if (empty($ad_pin)) {
    echo "<script>Swal.fire({icon:'warning',title:'ERROR SECURITY SITE',text:'ท่านยังไม่ได้สร้างไซต์งาน'}).then(()=>{window.location.href='index.php?page';});</script>";
    return;
} else {
    if (!empty($_REQUEST['active'])) {
        $old = isset($_REQUEST['old']) ? md5($_REQUEST['old']) : '';
        $new = md5($_REQUEST['new']);
        $new1 = $_REQUEST['new'];
        $con = md5($_REQUEST['con']);

        if ($ad_pin == $mdEmpty_pin) {
            if ($new != $con) {
                echo "<script>Swal.fire({icon:'warning',title:'รหัสผ่านใหม่ไม่ตรงกัน!',text:'ลองอีกครั้ง'}).then(()=>{window.location.href='index.php?page=security_site';});</script>";
                return;
            } else {
                $sql = mysql_query("SELECT * FROM mt_config where customer_pin='".$_REQUEST['new']."' or user_pin='".$_REQUEST['new']."'");
                $num = mysql_num_rows($sql);
                if ($num == 0) {
                    $show_adminPIN = $new1; if ($new1=="") { $show_adminPIN="ว่าง"; }
                    if ($new1=="") { $new1="000000000"; }
                    mysql_query("UPDATE mt_config SET admin_pin='".md5($new1)."'");
                    echo "<script>Swal.fire({icon:'success',title:'บันทึกค่าสำเร็จแล้ว',text:'รหัส ".$_SESSION['APIUser']." PIN คือ ".$show_adminPIN." ออกจากระบบ'}).then(()=>{window.location.href='../admin/logout.php';});</script>";
                    return;
                } else {
                    echo "<script>Swal.fire({icon:'warning',title:'ผิดพลาด!',text:'กรุณาลองอีกครั้ง'}).then(()=>{window.location.href='index.php?page=security_site';});</script>";
                    return;
                }
            }
        } else {
            $change = mysql_query("SELECT * FROM mt_config WHERE admin_pin='".$old."'");
            $num_pin = mysql_num_rows($change);
            if ($num_pin == 0) {
                echo "<script>Swal.fire({icon:'warning',title:'รหัสผ่านเก่าไม่ถูกต้อง!',text:'ลองอีกครั้ง!'}).then(()=>{window.location.href='index.php?page=security_site';});</script>";
                return;
            } elseif ($new != $con) {
                echo "<script>Swal.fire({icon:'warning',title:'รหัสผ่านใหม่ไม่ตรงกัน!',text:'ลองอีกครั้ง!'}).then(()=>{window.location.href='index.php?page=security_site';});</script>";
                return;
            } else {
                $show_adminPIN = $new1; if ($new1=="") { $show_adminPIN="ว่าง"; }
                if ($new1=="") { $new1="000000000"; }
                mysql_query("UPDATE mt_config SET admin_pin='".md5($new1)."'");
                echo "<script>Swal.fire({icon:'success',title:'บันทึกค่าสำเร็จแล้ว!',text:'รหัส ".$_SESSION['APIUser']." PIN คือ ".$show_adminPIN." ออกจากระบบ'}).then(()=>{window.location.href='../admin/logout.php';});</script>";
                return;
            }
        }
    }


}



						  
		?>

    <!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตั้งค่า Security Key</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .swal2-icon.swal2-warning {
  font-size: 2.5rem !important; 
  width: 3.5em !important;
  height: 3.5em !important;
  margin: 0 auto 1.2em auto !important; 
}
        
        
        .swal-popup.swal-lg {
    width: 40em !important;
    max-width: 90vw;
    padding: 2rem !important;
    border-radius: 16px !important;
    font-size: 1.6rem !important;
  }
  .swal-title.swal-title-lg {
    font-size: 2rem !important;
    margin-bottom: 1.5rem !important;
  }
  .swal-actions.swal-actions-equal {
    display: flex !important;
    justify-content: center;
    align-items: center;
    gap: 1rem !important;
    margin-top: 1.5rem !important;
  }
  .swal-styled.btn-equal {
    min-width: 12rem; 
    height: 3rem;
    border-radius: 12px !important;
    font-size: 1rem; 
    font-weight: 600;
  }
  .swal-styled.btn-confirm-gray {
    background: #6c757d !important;
    color: #fff !important;
    border: none !important;
  }
  .swal-styled.btn-cancel-red {
    background: #e53935 !important;
    color: #fff !important;
    border: none !important;
  }
        :root {
            --dark: #003C7F;
            --blue: #0072BC;
            --alt: #003C7E;
            --err: #e53935
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: transparent;
            padding: 0;
            margin: 0;
        }
        
        .sec-wrap {
            max-width: 960px;
            margin: 0 auto;
            background: #fff;
            border-radius: 16px;
            padding: 28px;
            border: 2px solid var(--dark);
            box-shadow: 0 16px 40px rgba(0,60,127,.18)
        }
        
        .sec-head {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
            padding: 14px 16px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--dark) 0%, var(--blue) 100%);
            color: #fff
        }
        
        .sec-head .badge {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: #ffffff22;
            display: flex;
            align-items: center;
            justify-content: center
        }
        
        .sec-head .badge i {
            font-size: 20px
        }
        
        .sec-head h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: .4px
        }
        
        .sec-form .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 6px
        }
        
        .sec-form .form-control {
            height: 44px;
            border-radius: 10px;
            border: 2px solid #e9eef3
        }
        
        .sec-form .form-control:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(0,114,188,.15)
        }
        
        .hint {
            font-size: 12px;
            color: #6c7a89;
            margin-top: 6px
        }
        
        .strength {
            height: 10px;
            border-radius: 8px;
            background: #e9eef3;
            overflow: hidden;
            margin-top: 10px
        }
        
        .strength>span {
            display: block;
            height: 100%;
            width: 0;
            transition: width .25s ease
        }
        
        .s0 {
            background: #cfd8dc
        }
        
        .s1 {
            background: #ef5350
        }
        
        .s2 {
            background: #ffb300
        }
        
        .s3 {
            background: #29b6f6
        }
        
        .s4 {
            background: #00c853
        }
        
        .actions {
            display: flex;
            gap: 14px;
            margin-top: 18px;
            align-items: center;
            justify-content: center;
        }
        
        .btn-modern {
            flex: 1;
            height: 48px;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 120px;
            cursor: pointer;
        }
        
        .btn-save {
            background: var(--alt);
            color: #fff;
        }
        
        .btn-save:hover {
            filter: brightness(1.08)
        }
        
        .btn-reset {
            background: #e53935;
            color: #fff
        }
        
        .btn-reset:hover {
            filter: brightness(1.08)
        }
        
        .tool-inline {
            display: flex;
            gap: 8px;
            align-items: center;
            margin-top: 10px;
            flex-wrap: wrap
        }
        
        .select-mini {
            height: 36px;
            border-radius: 8px;
            border: 2px solid #e9eef3;
            padding: 0 10px
        }
        
        .btn-mini {
            height: 36px;
            padding: 0 12px;
            border-radius: 8px;
            border: none;
            font-weight: 700;
            font-size: 14px
        }
        
        .btn-gen {
            background: #0072BC;
            color: #fff
        }
        
        .btn-copy {
            background: #6c757d;
            color: #fff
        }
        
        .btn-mini:hover {
            filter: brightness(1.06)
        }
        
        .pin-input .input-wrap {
            position: relative
        }
        
        .pin-input .input-wrap .form-control {
            padding-right: 48px
        }
        
        .pin-input .toggle-eye {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 32px;
            height: 32px;
            border: none;
            background: transparent;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #6b7c93
        }
        
        .pin-input .toggle-eye i {
            font-size: 22px
        }
        
        .pin-input .toggle-eye:hover {
            color: #003C7F
        }
        
        @keyframes bounceIn {
            0% {
                transform: scale(.5);
                opacity: 0
            }
            60% {
                transform: scale(1.05);
                opacity: 1
            }
            100% {
                transform: scale(1)
            }
        }
        
        .bounce-in {
            animation: bounceIn .4s ease
        }
        
        /* เพิ่มสไตล์สำหรับปรับขนาด Pop-up */
        .swal-popup {
            font-size: 1.6rem !important;
            padding: 2rem !important;
            width: 40em !important;
            border-radius: 16px !important;
        }
        
        .swal-title {
            font-size: 2rem !important;
            margin-bottom: 1.5rem !important;
        }
        
        .swal-actions {
            margin-top: 1.5rem !important;
            gap: 1rem !important;
        }
        
        .swal-confirm, .swal-cancel {
            padding: 1rem 2rem !important;
            font-size: 1.6rem !important;
            border-radius: 12px !important;
        }
        

        
    </style>
</head>
<body>
    <section class="content">
        <div class="sec-wrap">
            <div class="sec-head">
                <div class="badge"><i class="fa fa-lock bounce-in"></i></div>
                <h3>ตั้งค่า Security Key</h3>
            </div>

            <form id="pin" class="sec-form" method="POST" action="">
                <?php if (!$is_default): ?>
                <div class="form-group pin-input">
                    <label class="form-label">รหัสเดิม</label>
                    <div class="input-wrap">
                        <input type="password" class="form-control" name="old" id="oldPin" minlength="12" maxlength="12" placeholder="12 ตัวอักษรพอดี" required>
                        <button type="button" class="toggle-eye" data-target="oldPin" aria-label="แสดง/ซ่อนรหัส"><i class="fa fa-eye"></i></button>
                    </div>
                    <div class="hint">ระบุรหัสเดิม</div>
                </div>
<?php endif; ?>
                <div class="form-group pin-input">
                    <label class="form-label">รหัสใหม่</label>
                    <div class="input-wrap">
                        <input type="password" class="form-control" name="new" id="newPin" minlength="12" maxlength="12" placeholder="12 ตัวอักษรพอดี" required>
                        <button type="button" class="toggle-eye" data-target="newPin" aria-label="แสดง/ซ่อนรหัส"><i class="fa fa-eye"></i></button>
                    </div>

                    <div class="tool-inline">
                        <label class="form-label" style="margin:0">ความยาว</label>
                        
                        <button type="button" id="btnGen" class="btn-mini btn-gen"><i class="fa fa-random"></i> สุ่มรหัส</button>
                        <button type="button" id="btnCopy" class="btn-mini btn-copy"><i class="fa fa-copy"></i> คัดลอก</button>
                    </div>

                    <div class="strength" aria-hidden="true"><span id="strengthBar"></span></div>
                    <div class="hint" id="strengthHint">ความแข็งแรง: —</div>
                </div>

                <div class="form-group pin-input">
                    <label class="form-label">ยืนยันรหัสใหม่</label>
                    <div class="input-wrap">
                        <input type="password" class="form-control" name="con" id="conPin" minlength="12" maxlength="12" placeholder="12 ตัวอักษรพอดี" required>
                        <button type="button" class="toggle-eye" data-target="conPin" aria-label="แสดง/ซ่อนรหัส"><i class="fa fa-eye"></i></button>
                    </div>
                    <div class="hint" id="matchHint">ต้องตรงกับรหัสใหม่</div>
                </div>

                <div class="actions">
                    <button type="submit" name="active" value="pin" class="btn-modern btn-save"><i class="fa fa-check-circle"></i>ยืนยันรหัสใหม่</button> 
                    <button type="reset" class="btn-modern btn-reset"><i class="fa fa-refresh"></i> ยกเลิก</button>
                </div>
            </form>
        </div>
    </section>

    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/zxcvbn@4.4.2/dist/zxcvbn.js"></script>
    
    <script>
        const el = id => document.getElementById(id);

        // score
        function scoreKey(v) {
            if (!v) return 0;
            if (window.zxcvbn) return zxcvbn(v).score;
            let s = 0;
            if (v.length >= 12) s++;
            const hasL = /[a-z]/.test(v), hasU = /[A-Z]/.test(v), hasD = /\d/.test(v), hasS = /[^A-Za-z0-9]/.test(v);
            s += Math.min([hasL, hasU, hasD, hasS].filter(Boolean).length, 3);
            return Math.min(s, 4);
        }
        
        function renderStrength(v) {
            const s = scoreKey(v);
            const map = ['อ่อนมาก', 'อ่อน', 'พอใช้', 'ดี', 'แข็งแรง'];
            const widths = ['10%', '25%', '50%', '75%', '100%'];
            const cls = ['s0', 's1', 's2', 's3', 's4'];
            const bar = el('strengthBar');
            bar.className = cls[s];
            bar.style.width = widths[s];
            el('strengthHint').textContent = 'ความแข็งแรง: ' + map[s];
        }

        // toggle eyes
        document.querySelectorAll('.toggle-eye').forEach(btn => {
            btn.addEventListener('click', () => {
                const target = document.getElementById(btn.dataset.target);
                target.type = target.type === 'password' ? 'text' : 'password';
                const ic = btn.querySelector('i');
                ic.classList.toggle('fa-eye');
                ic.classList.toggle('fa-eye-slash');
            });
        });

        // live validate
        ['newPin', 'conPin'].forEach(id => {
            const k = el(id);
            if (!k) return;
            k.addEventListener('input', () => {
                renderStrength(el('newPin').value);
                const ok = el('newPin').value === el('conPin').value && el('conPin').value.length === 12;
                el('matchHint').textContent = ok ? 'ตรงกัน' : 'ต้องตรงกับรหัสใหม่';
                el('matchHint').style.color = ok ? '#00a152' : '#e53935';
            });
        });

        // generator 
        function getRand(max) {
            if (window.crypto && crypto.getRandomValues) {
                const a = new Uint32Array(1);
                crypto.getRandomValues(a);
                return a[0] % max;
            }
            return Math.floor(Math.random() * max);
        }
        
        function genKey(len) {
            const sets = {
                U: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
                L: 'abcdefghijklmnopqrstuvwxyz',
                D: '0123456789',
                S: '!@#$%^&*()-_=+[]{};:,.?/~'
            };
            const all = sets.U + sets.L + sets.D + sets.S,
                pools = [sets.U, sets.L, sets.D, sets.S];
            let out = [];
            [0, 1, 2].forEach(i => out.push(pools[i][getRand(pools[i].length)]));
            while (out.length < len) {
                out.push(all[getRand(all.length)]);
            }
            for (let i = out.length - 1; i > 0; i--) {
                const j = getRand(i + 1);
                [out[i], out[j]] = [out[j], out[i]];
            }
            return out.join('');
        }
        
        document.getElementById('btnGen').addEventListener('click', () => {
            const key = genKey(12);
            el('newPin').value = key;
            el('conPin').value = key;
            renderStrength(key);
            el('matchHint').textContent = 'ตรงกัน';
            el('matchHint').style.color = '#00a152';
            if (window.Swal) Swal.fire({
                toast: true,
                position: 'top',
                timer: 1400,
                showConfirmButton: false,
                icon: 'success',
                title: 'สร้างรหัสแล้ว'
            });
        });
        
        document.getElementById('btnCopy').addEventListener('click', async () => {
            const key = el('newPin').value.trim();
            if (!key) {
                if (window.Swal) Swal.fire({
                    toast: true,
                    position: 'top',
                    timer: 1200,
                    showConfirmButton: false,
                    icon: 'info',
                    title: 'ยังไม่มีรหัส'
                });
                return;
            }
            try {
                await navigator.clipboard.writeText(key);
            } catch (e) {
                const t = document.createElement('input');
                t.value = key;
                document.body.appendChild(t);
                t.select();
                document.execCommand('copy');
                document.body.removeChild(t);
            }
            if (window.Swal) Swal.fire({
                toast: true,
                position: 'top',
                timer: 1200,
                showConfirmButton: false,
                icon: 'success',
                title: 'คัดลอกแล้ว'
            });
        });

        // submit validate (12 ตัวอักษรพอดี)
        document.getElementById('pin').addEventListener('submit', function(e) {
            
            const newVal = el('newPin').value.trim();
            const conVal = el('conPin').value.trim();
            const oldEl = el('oldPin');
            const oldVal = oldEl ? oldEl.value.trim() : '';

            const errs = [];
            if (oldEl && oldVal.length !== 12) errs.push('รหัสเดิมต้องยาว 12 ตัวอักษรพอดี');
            if (newVal.length !== 12) errs.push('รหัสใหม่ต้องยาว 12 ตัวอักษรพอดี');
            if (conVal.length !== 12) errs.push('ยืนยันรหัสต้องยาว 12 ตัวอักษรพอดี');
            if (newVal !== conVal) errs.push('รหัสใหม่และยืนยันไม่ตรงกัน');

            if (errs.length) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'บันทึกไม่สำเร็จ',
                    html: '<ul style="text-align:left;margin:0 8px">' + errs.map(x => `<li>${x}</li>`).join('') + '</ul>',
                    confirmButtonText: 'ตกลง'
                });
                return;
            }

            const s = scoreKey(newVal);
            if (s < 2) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'รหัสอ่อนเกินไป',
                    text: 'แนะนำใช้ตัวพิมพ์ใหญ่ ตัวพิมพ์เล็ก ตัวเลข และอักขระพิเศษ',
                    showCancelButton: true,
                    confirmButtonText: 'ยืนยันใช้ต่อไป',
                    cancelButtonText: 'แก้ไขก่อน'
                }).then(r => {
                    if (r.isConfirmed) {
                        this.submit();
                    
                    }
                });
            
            }
        });

        // แสดงสถานะหลัง redirect กลับ
        document.addEventListener('DOMContentLoaded', () => {
            const p = new URLSearchParams(location.search);
            const st = p.get('pin_status');
            if (st === 'ok') Swal.fire({
                icon: 'success',
                title: 'บันทึกสำเร็จ',
                timer: 1800,
                showConfirmButton: false
            });
            else if (st === 'fail') Swal.fire({
                icon: 'error',
                title: 'บันทึกไม่สำเร็จ',
                text: p.get('msg') || 'เกิดข้อผิดพลาด'
            });
        });
    </script>
</body>
</html>