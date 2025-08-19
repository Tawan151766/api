# คู่มือแก้ไขปัญหา - ROCKET API

## 🔍 การตรวจสอบสถานะระบบ

### ตรวจสอบว่าระบบทำงานหรือไม่:
```bash
docker-compose ps
```

**ผลลัพธ์ที่ถูกต้อง:**
- `api-web-1` - Up
- `api-db-1` - Up  
- `api-phpmyadmin-1` - Up

## ⚠️ Warning ที่ไม่ต้องกังวล

### 1. Apache ServerName Warning
```
AH00558: apache2: Could not reliably determine the server's fully qualified domain name
```
**สาเหตุ:** Apache ไม่สามารถระบุ domain name ได้
**ผลกระทบ:** ไม่มี - ระบบทำงานปกติ
**การแก้ไข:** ไม่จำเป็น (แก้ไขแล้วใน version ใหม่)

### 2. Docker Compose Version Warning
```
the attribute `version` is obsolete
```
**สาเหตุ:** Docker Compose รุ่นใหม่ไม่ต้องระบุ version
**ผลกระทบ:** ไม่มี - ระบบทำงานปกติ
**การแก้ไข:** ไม่จำเป็น (แก้ไขแล้วใน version ใหม่)

## 🚨 ปัญหาที่ต้องแก้ไข

### 1. เข้าเว็บไม่ได้ (Connection Refused)
**อาการ:** เปิด http://localhost:8080 ไม่ได้

**วิธีแก้:**
```bash
# 1. ตรวจสอบสถานะ
docker-compose ps

# 2. รีสตาร์ท web container
docker-compose restart web

# 3. ถ้ายังไม่ได้ รีสตาร์ททั้งระบบ
docker-compose down
docker-compose up -d
```

### 2. Database Connection Error
**อาการ:** หน้าเว็บขาว หรือ error เกี่ยวกับ database

**วิธีแก้:**
```bash
# 1. ตรวจสอบ database
docker-compose logs db

# 2. รีสตาร์ท database
docker-compose restart db

# 3. รอ 30 วินาที แล้วลองใหม่
```

### 3. Port 8080 ถูกใช้งานแล้ว
**อาการ:** Error เมื่อ start container

**วิธีแก้:**
1. แก้ไขไฟล์ `docker-compose.yml`
2. เปลี่ยนจาก `"8080:80"` เป็น `"8090:80"`
3. เข้าใช้งานที่ http://localhost:8090

### 4. Docker Desktop ไม่ทำงาน
**อาการ:** คำสั่ง docker ไม่ทำงาน

**วิธีแก้:**
1. เปิด Docker Desktop
2. รอให้สถานะเป็นสีเขียว
3. ลองคำสั่งใหม่

## 🔧 คำสั่งที่มีประโยชน์

### ดู logs แบบ real-time:
```bash
docker-compose logs -f web
docker-compose logs -f db
```

### ลบและสร้างใหม่ทั้งหมด:
```bash
docker-compose down -v
docker-compose up -d --build
```

### เข้าไปใน container:
```bash
# เข้า web container
docker-compose exec web bash

# เข้า database container
docker-compose exec db mysql -u myuser -p mydatabase
```

## 📞 ติดต่อสนับสนุน

หากปัญหายังไม่หายหรือมีข้อสงสัย กรุณาติดต่อ:
- Email: [your-email@domain.com]
- Line: [your-line-id]
- Tel: [your-phone-number]

**ข้อมูลที่ควรแนบมาด้วย:**
1. ผลลัพธ์จาก `docker-compose ps`
2. ผลลัพธ์จาก `docker-compose logs web`
3. Screenshot ของ error (ถ้ามี)