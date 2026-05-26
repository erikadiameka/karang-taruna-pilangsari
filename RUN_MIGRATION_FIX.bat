@echo off
REM ========================================
REM  MIGRATION FIX SCRIPT
REM  Perbaikan Migration Database Kartar Pilangsari
REM ========================================

cd /d %~dp0

echo.
echo ====================================
echo   MIGRATION DATABASE FIX
echo ====================================
echo.

echo [1/3] Menjalankan Fresh Migration...
echo.
C:\laragon\bin\php\php-8.3.16-Win32-vs16-x64\php.exe artisan migrate:fresh --force

if errorlevel 1 (
    echo.
    echo ERROR: Migration gagal!
    echo.
    pause
    exit /b 1
)

echo.
echo [2/3] Migration berhasil! Sekarang menjalankan seeder...
echo.
C:\laragon\bin\php\php-8.3.16-Win32-vs16-x64\php.exe artisan db:seed --force

echo.
echo [3/3] Setup selesai!
echo.
echo ====================================
echo   ✓ SUKSES - Database sudah diperbaiki
echo ====================================
echo.
echo Tekan tombol apapun untuk menutup...
pause
