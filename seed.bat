@echo off
cd /d "c:\laragon\www\kartar_pilangsari"
echo Running Anggota Seeder...
echo.
php execute_seeder.php
echo.
if %errorlevel% equ 0 (
    echo.
    echo ========================================
    echo SUCCESS! Data has been seeded.
    echo You can now visit: localhost:3000/anggota
    echo ========================================
) else (
    echo.
    echo ========================================
    echo ERROR! Seeding failed.
    echo Check the error message above.
    echo ========================================
)
echo.
pause
