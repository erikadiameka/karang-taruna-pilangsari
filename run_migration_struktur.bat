@echo off
cd /d "%~dp0"
echo Running migration for struktur organisasi...
php artisan migrate --force
if %errorlevel% equ 0 (
    echo.
    echo Migration completed. Now running seeder...
    php artisan db:seed --class=StrukturOrganisasiSeeder --force
    if %errorlevel% equ 0 (
        echo.
        echo ✓ Seeder completed successfully!
    ) else (
        echo ✗ Seeder failed!
    )
) else (
    echo ✗ Migration failed!
)
pause
