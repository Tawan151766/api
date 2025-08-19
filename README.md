# MikroTik API Management System

ระบบจัดการ MikroTik RouterOS ผ่าน API สำหรับ Hotspot และ PPPoE

## 🚀 วิธีการติดตั้งและใช้งาน

### ความต้องการของระบบ
- Windows 10/11
- Docker Desktop
- RAM อย่างน้อย 4GB
- พื้นที่ว่าง 2GB

### ขั้นตอนการติดตั้ง

#### 1. ติดตั้ง Docker Desktop
1. ดาวน์โหลด Docker Desktop จาก: https://www.docker.com/products/docker-desktop/
2. ติดตั้งและเปิดโปรแกรม Docker Desktop
3. รอให้ Docker เริ่มทำงาน (จะมีไอคอนสีเขียวใน system tray)

#### 2. เตรียมโปรเจ็ค
1. แตกไฟล์โปรเจ็คที่ได้รับ
2. เปิด Command Prompt หรือ PowerShell
3. เข้าไปในโฟลเดอร์โปรเจ็ค:
   ```cmd
   cd C:\path\to\your\project
   ```

#### 3. เริ่มระบบ
```cmd
docker-compose up -d --build
```

รอประมาณ 2-3 นาที ให้ระบบติดตั้งเสร็จ

### 🌐 การเข้าใช้งาน

#### เข้าระบบหลัก
- **URL**: http://localhost:8080
- **Username**: admin
- **Password**: 12345

#### เข้าจัดการฐานข้อมูล (phpMyAdmin)
- **URL**: http://localhost:8081
- **Username**: myuser
- **Password**: mypassword

### 🔧 คำสั่งจัดการระบบ

#### ดูสถานะระบบ
```cmd
docker-compose ps
```

#### หยุดระบบ
```cmd
docker-compose down
```

#### เริ่มระบบใหม่
```cmd
docker-compose up -d
```

#### ดู logs หากมีปัญหา
```cmd
docker-compose logs web
docker-compose logs db
```

#### รีสตาร์ทระบบ
```cmd
docker-compose restart
```

### 📋 ฟีเจอร์หลัก

- **จัดการ MikroTik Servers**: เพิ่ม/ลบ/แก้ไข MikroTik routers
- **Hotspot Management**: สร้างและจัดการ hotspot users
- **PPPoE Management**: จัดการ PPPoE connections
- **Profile Management**: ตั้งค่า bandwidth profiles
- **User Generation**: สร้าง user แบบ bulk
- **Reporting**: รายงานการใช้งานและรายได้
- **Multi-Server**: รองรับหลาย MikroTik servers

### 🛠️ การแก้ไขปัญหา

#### ปัญหา: เข้าเว็บไม่ได้
```cmd
# ตรวจสอบสถานะ
docker-compose ps

# รีสตาร์ท
docker-compose restart web
```

#### ปัญหา: Database connection error
```cmd
# รีสตาร์ท database
docker-compose restart db

# ดู logs
docker-compose logs db
```

#### ปัญหา: Port ถูกใช้งานแล้ว
แก้ไขไฟล์ `docker-compose.yml`:
```yaml
ports:
  - "8080:80"  # เปลี่ยนเป็น "8090:80" หรือ port อื่น
```

### 🔒 ความปลอดภัย

- เปลี่ยนรหัสผ่าน admin ทันทีหลังติดตั้ง
- ใช้งานใน network ที่ปลอดภัย
- สำรองข้อมูลสม่ำเสมอ

### 📞 การสนับสนุน

หากมีปัญหาการใช้งาน กรุณาติดต่อ:
- Email: [your-email@domain.com]
- Line: [your-line-id]
- Tel: [your-phone-number]

---

**หมายเหตุ**: ระบบนี้ใช้ PHP 5.6 และ MySQL 5.7 เพื่อรองรับ legacy code