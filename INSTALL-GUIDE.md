# คู่มือติดตั้งระบบ MikroTik API Management

## 📦 สิ่งที่ลูกค้าจะได้รับ

1. โฟลเดอร์โปรเจ็ค (ไฟล์ทั้งหมด)
2. ไฟล์ README.md (คู่มือนี้)
3. ไฟล์ docker-compose.yml (การตั้งค่า Docker)

## 🎯 ขั้นตอนการติดตั้งแบบง่าย

### ขั้นที่ 1: ติดตั้ง Docker

1. ไปที่ https://www.docker.com/products/docker-desktop/
2. ดาวน์โหลดและติดตั้ง Docker Desktop
3. เปิด Docker Desktop และรอให้เริ่มทำงาน

### ขั้นที่ 2: เตรียมโปรเจ็ค

1. แตกไฟล์โปรเจ็คที่ได้รับ
2. เปิด Command Prompt (กด Win+R พิมพ์ cmd)
3. เข้าไปในโฟลเดอร์โปรเจ็ค:
   ```
   cd C:\Users\YourName\Desktop\project-folder
   ```

### ขั้นที่ 3: เริ่มระบบ

พิมพ์คำสั่งนี้:

```
docker-compose up -d --build
```

รอ 3-5 นาที ให้ระบบติดตั้งเสร็จ

### ขั้นที่ 4: เข้าใช้งาน

เปิด browser ไปที่: **http://localhost:8080**

**ข้อมูล Login:**

- Username: `admin`
- Password: `12345`

## ✅ เสร็จแล้ว!

ระบบพร้อมใช้งาน สามารถเริ่มเพิ่ม MikroTik servers และจัดการ users ได้เลย

## 🆘 หากมีปัญหา

### ปัญหาที่พบบ่อย:

**1. Docker ไม่ทำงาน**

- ตรวจสอบว่า Docker Desktop เปิดอยู่
- รีสตาร์ท Docker Desktop

**2. เข้าเว็บไม่ได้**

- ตรวจสอบว่าระบบทำงาน: `docker-compose ps`
- รีสตาร์ท: `docker-compose restart`

**3. Port 8080 ถูกใช้แล้ว**

- เปลี่ยน port ในไฟล์ docker-compose.yml
- จาก `"8080:80"` เป็น `"8090:80"`

## 📋 คำสั่งที่ใช้บ่อย

```bash
# ดูสถานะ
docker-compose ps

# หยุดระบบ
docker-compose down

# เริ่มระบบ
docker-compose up -d

# รีสตาร์ท
docker-compose restart
```

---

**ติดต่อสนับสนุน**: [ใส่ข้อมูลติดต่อของคุณ]

### 📝 หมายเหตุเพิ่มเติม:

**Warning ที่อาจเห็นใน logs (ปกติ ไม่ต้องกังวล):**
- `ServerName warning` - ไม่กระทบการทำงาน
- `version obsolete` - ไม่กระทบการทำงาน
- ระบบยังทำงานปกติ

**การอัพเดทระบบ:**
```bash
# หยุดระบบ
docker-compose down

# อัพเดทและเริ่มใหม่
docker-compose up -d --build
```