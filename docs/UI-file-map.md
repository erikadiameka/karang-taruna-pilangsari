# UI File Map — Karang Taruna (quick reference)

This file lists important frontend templates, components, controllers and assets used for the navbar and dashboard UI. Open these files when you need to change labels, logos, menu items, or dashboard widgets.

- **Navbar (main)**: [resources/views/partials/navbar.blade.php](resources/views/partials/navbar.blade.php)
  - Desktop + mobile markup, Login/Dashboard button, mobile menu toggle script (bottom of file).

- **Profile Navbar**: [resources/views/profile/partials/navbar.blade.php](resources/views/profile/partials/navbar.blade.php)
  - Navbar used in profile pages.

- **Application Logo (component)**: [resources/views/components/application-logo.blade.php](resources/views/components/application-logo.blade.php)
  - Reusable SVG component referenced by `x-application-logo`.

- **Front layout (meta / favicon / OG)**: [resources/views/layouts/app.blade.php](resources/views/layouts/app.blade.php)
  - `og:image` and favicon use assets in `public/images/`.

- **Dashboard (admin) layout / sidebar / topbar**: [resources/views/layouts/admin.blade.php](resources/views/layouts/admin.blade.php)
  - Sidebar logo (now references `public/images/ikkapii-logo.png`), menu links, topbar date (`now()->format(...)`).

- **Admin dashboard view**: [resources/views/admin/dashboard.blade.php](resources/views/admin/dashboard.blade.php)
  - Main dashboard widgets and cards.

- **Admin Anggota controller**: [app/Http/Controllers/Admin/AnggotaController.php](app/Http/Controllers/Admin/AnggotaController.php)
  - Server-side logic for `admin.anggota` routes; `index()` now supports `divisi`, `status`, and `search` filters.

- **Admin Anggota view**: [resources/views/admin/anggota/index.blade.php](resources/views/admin/anggota/index.blade.php)
  - List view, filter UI, header stats, `Tambah Anggota` button.

- **Landing Anggota (public)**: [resources/views/anggota/index.blade.php](resources/views/anggota/index.blade.php)
  - Public-facing members page and structure view.

- **Model Anggota**: [app/Models/Anggota.php](app/Models/Anggota.php)
  - Fields: `divisi`, `posisi_inti`, `status`, etc.

- **Routes**: [routes/web.php](routes/web.php)
  - Admin routes live under `prefix('dashboard')->name('admin.')` and `Route::resource('anggota', ...)`.

- **Assets**: `public/images/` — current files:
  - [public/images/Logo2.png](public/images/Logo2.png)
  - [public/images/ikkapii-logo.png](public/images/ikkapii-logo.png)
  - [public/images/ikkapilogo.png](public/images/ikkapilogo.png)

Notes & tips
- To change the sidebar logo: edit [resources/views/layouts/admin.blade.php](resources/views/layouts/admin.blade.php) or replace `public/images/ikkapii-logo.png` with your new image.
- To change the nav label `Admin` → `Dashboard`: update [resources/views/partials/navbar.blade.php](resources/views/partials/navbar.blade.php) and [resources/views/profile/partials/navbar.blade.php](resources/views/profile/partials/navbar.blade.php).
- Mobile menu behavior is implemented inline in the main navbar file; if you move it, keep `openMenu()` / `closeMenu()` logic.

If you'd like, I can also:
- Add direct line references to each file (e.g., where the label appears),
- Create a `docs/UI-file-map.md` entry in the repo (already created), or
- Generate a short HOWTO for typical edits (change logo, rename nav item, add menu link).

-- End of file
