@echo off
echo ========================================
echo  หยุดระบบ MikroTik API Management
echo ========================================
echo.
echo กำลังหยุดระบบ...

docker-compose down

echo.
echo ระบบหยุดทำงานแล้ว
echo.
echo กด Enter เพื่อปิดหน้าต่าง...
pause > nul