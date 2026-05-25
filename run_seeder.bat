@echo off
cd /d "c:\laragon\www\kartar_pilangsari"
php artisan db:seed --class=AnggotaSeeder
pause
