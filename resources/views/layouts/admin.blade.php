<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #0d6efd;
            padding-top: 20px;
            color: white;
        }

        .sidebar a {
            color: white;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: white;
            color: #0d6efd;
            border-left: 4px solid #69a5ff;
        }

        /* Topbar */
        .topbar {
            height: 60px;
            margin-left: 250px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 20px;
            border-bottom: 1px solid #ddd;
        }

        /* Content */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .profile-img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4 class="text-center mb-4">Admin</h4>

    <a href="/admin/dashboard">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <a href="/admin/employer/create">
        <i class="bi bi-person-plus"></i> Add Employer
    </a>
    <a href="/admin/employers">
        <i class="bi bi-building"></i> Companies
    </a>

    <a href="#">
        <i class="bi bi-people"></i> Users
    </a>

    <a href="#">
        <i class="bi bi-building"></i> Companies
    </a>

</div>

<!-- TOPBAR -->
<div class="topbar">

    <!-- Profile Dropdown -->
    <div class="dropdown">
        <a class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            
            <!-- Profile Image -->
                <i class="bi bi-person-circle fs-4 me-2"></i>

            <!-- Username -->
            <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
        </a>

        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </div>

</div>

<!-- CONTENT -->
<div class="content">
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>