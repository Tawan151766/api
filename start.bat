@echo off
echo ========================================
echo  MikroTik API Management System
echo ========================================
echo.
echo กำลังเริ่มระบบ...
echo.

docker-compose up -d --build

echo.
echo ========================================
echo  ระบบเริ่มทำงานแล้ว!
echo ========================================
echo.
echo เข้าใช้งานที่: http://localhost:8080
echo Username: admin
echo Password: 12345
echo.
echo phpMyAdmin: http://localhost:8081
echo Username: myuser  
echo Password: mypassword
echo.
echo กด Enter เพื่อดูสถานะระบบ...
pause > nul

docker-compose ps

echo.
echo กด Enter เพื่อปิดหน้าต่าง...
pause > nul