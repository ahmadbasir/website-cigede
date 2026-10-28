<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        :root {
            --biru-tua: #0B3954;
            --biru-air: #087E8B;
            --biru-cerah: #20A4F3;
            --biru-muda: #E8F8FC;
            --background: #F5F8FA;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--background);
            font-family: Arial, Helvetica, sans-serif;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .admin-sidebar {
            width: 260px;
            min-height: 100vh;
            background: var(--biru-tua);
            color: white;
            padding: 25px 18px;
            flex-shrink: 0;
        }

        .admin-brand {
            padding: 5px 12px 30px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            margin-bottom: 25px;
        }

        .admin-brand h4 {
            margin: 0;
            font-weight: 700;
        }

        .admin-brand small {
            display: block;
            margin-top: 5px;
            color: #9edff0;
            font-size: 12px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 15px;
            color: #e8f8fc;
            text-decoration: none;
            border-radius: 7px;
            transition: 0.3s;
            font-size: 14px;
        }

        .sidebar-link:hover {
            background: var(--biru-air);
            color: white;
        }

        .sidebar-link i {
            font-size: 18px;
        }

        /* =========================
           LOGOUT
        ========================== */

        .logout-button {
            margin-top: 35px;
        }

        .logout-button button {
            border: none;
            border-radius: 7px;
            padding: 12px;
            font-weight: 600;
            color: var(--biru-tua);
            transition: 0.3s;
        }

        .logout-button button:hover {
            background: #d8f5fc;
        }

        /* =========================
           MAIN CONTENT
        ========================== */

        .admin-content {
            width: 100%;
            min-height: 100vh;
            padding: 35px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 768px) {

            .admin-sidebar {
                width: 210px;
            }

            .admin-content {
                padding: 20px;
            }

            .admin-brand h4 {
                font-size: 18px;
            }

            .sidebar-link {
                font-size: 13px;
            }

        }

    </style>

</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <aside class="admin-sidebar">

        <div class="admin-brand">

            <h4>
                <i class="bi bi-water"></i>
                Admin CMS
            </h4>

            <small>
                Mata Air Cigede
            </small>

        </div>


        <ul class="sidebar-menu">

            <li>

                <a href="/dashboard"
                   class="sidebar-link">

                    <i class="bi bi-speedometer2"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>


            <li>

                <a href="/admin/galeri"
                   class="sidebar-link">

                    <i class="bi bi-images"></i>

                    <span>
                        Kelola Galeri
                    </span>

                </a>

            </li>


            <li>

                <a href="/admin/informasi"
                   class="sidebar-link">

                    <i class="bi bi-newspaper"></i>

                    <span>
                        Kelola Berita
                    </span>

                </a>

            </li>
<li>

    <a href="/admin/kondisi"
       class="sidebar-link">

        <i class="bi bi-droplet-half"></i>

        <span>
            Kelola Kondisi Wisata
        </span>

    </a>

</li>

            <li>

                <a href="/admin/profil"
                   class="sidebar-link">

                    <i class="bi bi-building"></i>

                    <span>
                        Kelola Profil Destinasi
                    </span>

                </a>

            </li>

            <li>

    <a href="/admin/pengunjung"
       class="sidebar-link">

        <i class="bi bi-people-fill"></i>

        <span>
            Data Pengunjung
        </span>

    </a>

</li>
<li>
    <li>

    <a href="/admin/kritik"
       class="sidebar-link">

        <i class="bi bi-chat-left-text"></i>

        <span>
            Kritik & Saran
        </span>

    </a>

</li>

    <a href="{{ route('admin.lokasi.index') }}"
       class="sidebar-link">

        <i class="bi bi-geo-alt-fill"></i>

        <span>
            Kelola Lokasi
        </span>

    </a>

</li>
<li>

    <a href="{{ route('admin.kontak.index') }}"
       class="sidebar-link">

        <i class="bi bi-envelope-fill"></i>

        <span>
            Kelola Kontak
        </span>

    </a>

</li>

<li>

    <a href="{{ route('admin.users.index') }}"
       class="sidebar-link">

        <i class="bi bi-person-circle"></i>

        <span>
            Kelola Akun
        </span>

    </a>

</li>

            <li class="logout-button">

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                            class="btn btn-light w-100">

                        <i class="bi bi-box-arrow-right"></i>

                        Logout

                    </button>

                </form>

            </li>

        </ul>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="admin-content">

        @yield('content')

    </main>

</div>

</body>

</html>