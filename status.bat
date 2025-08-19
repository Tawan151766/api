@echo off
echo ========================================
echo  สถานะระบบ MikroTik API Management
echo ========================================
echo.

docker-compose ps

echo.
echo ========================================
echo  การเข้าใช้งาน
echo ========================================
echo เว็บแอป: http://localhost:8080
echo phpMyAdmin: http://localhost:8081
echo.
echo กด Enter เพื่อปิดหน้าต่าง...
pause > nul