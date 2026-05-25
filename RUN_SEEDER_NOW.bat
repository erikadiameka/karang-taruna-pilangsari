@echo off
REM Direct execution - no questions, just do it!
cd /d "c:\laragon\www\kartar_pilangsari"
php artisan db:seed --class=AnggotaSeeder --force
echo.
echo Done! Refresh your browser now (Ctrl+F5)
pause
