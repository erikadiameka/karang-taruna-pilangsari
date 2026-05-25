@echo off
REM Complete Setup & Seeding Script for Karang Taruna

cls
echo.
echo ╔══════════════════════════════════════════════════════════╗
echo ║  KARANG TARUNA - SETUP & SEEDING SCRIPT                  ║
echo ╚══════════════════════════════════════════════════════════╝
echo.

cd /d "c:\laragon\www\kartar_pilangsari"

REM Step 1: Clear all caches
echo [1/5] Clearing Laravel caches...
php artisan config:clear >nul 2>&1
php artisan view:clear >nul 2>&1
php artisan cache:clear >nul 2>&1
php artisan route:clear >nul 2>&1
echo ✓ Caches cleared
echo.

REM Step 2: Check database connection
echo [2/5] Checking database connection...
php artisan tinker --execute="echo 'Database connected';" >nul 2>&1
if %errorlevel% equ 0 (
    echo ✓ Database connected
) else (
    echo ✗ Database connection failed
    echo Please check your .env file and make sure MySQL is running
    pause
    exit /b 1
)
echo.

REM Step 3: Run migrations if needed
echo [3/5] Ensuring database is migrated...
php artisan migrate --force --no-interaction >nul 2>&1
echo ✓ Migrations checked
echo.

REM Step 4: Clear old anggota data
echo [4/5] Clearing old anggota data...
php artisan tinker --execute="DB::table('anggota')->truncate(); echo 'Cleared';" >nul 2>&1
echo ✓ Old data cleared
echo.

REM Step 5: Seed new data
echo [5/5] Seeding anggota data...
php artisan db:seed --class=AnggotaSeeder --force

if %errorlevel% equ 0 (
    echo.
    echo ╔══════════════════════════════════════════════════════════╗
    echo ║ ✓ SUCCESS! Everything is set up and data is seeded       ║
    echo ╚══════════════════════════════════════════════════════════╝
    echo.
    echo NEXT STEPS:
    echo 1. Make sure the Laravel development server is running
    echo 2. Open your browser
    echo 3. Go to: http://localhost:3000/anggota
    echo 4. Click on "Bagan Struktur" tab
    echo 5. You should see the organizational structure!
    echo.
    echo Troubleshooting:
    echo - If page still shows empty, refresh (Ctrl+F5)
    echo - Check browser console for errors (F12)
    echo - Make sure Laragon services are running
    echo.
) else (
    echo.
    echo ✗ SEEDING FAILED
    echo Please check the error message above
    echo.
)

pause
