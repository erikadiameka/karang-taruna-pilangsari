@echo off
REM Quick Seeding Guide
REM This file will help you run the anggota seeder

cls
echo.
echo ╔═══════════════════════════════════════════════════════╗
echo ║   KARANG TARUNA ANGGOTA SEEDER                        ║
echo ║   Run this to populate member data and structure      ║
echo ╚═══════════════════════════════════════════════════════╝
echo.

cd /d "c:\laragon\www\kartar_pilangsari"

REM Check PHP
php -v >nul 2>&1
if errorlevel 1 (
    echo ERROR: PHP is not installed or not in PATH
    echo Please install PHP or add it to PATH
    pause
    exit /b 1
)

echo.
echo Running Anggota Seeder...
echo.

REM Run seeder
php artisan db:seed --class=AnggotaSeeder

if %errorlevel% equ 0 (
    echo.
    echo ════════════════════════════════════════════════════════
    echo ✓ SUCCESS! Data has been seeded.
    echo ════════════════════════════════════════════════════════
    echo.
    echo Next steps:
    echo 1. Open your browser
    echo 2. Visit: http://localhost:3000/anggota
    echo 3. You will see the organizational structure!
    echo.
    echo The "Bagan Struktur" tab shows:
    echo   • Ketua at the top
    echo   • Wakil Ketua below
    echo   • Sekretaris & Bendahara
    echo   • 6 Operational Divisions with coordinators
    echo.
) else (
    echo.
    echo ════════════════════════════════════════════════════════
    echo ERROR! Seeding failed.
    echo ════════════════════════════════════════════════════════
    echo.
    echo Troubleshooting:
    echo - Make sure database is running
    echo - Check .env file for correct database credentials
    echo - Try running: php artisan migrate
    echo.
)

pause
