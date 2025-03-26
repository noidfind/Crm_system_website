<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Projeler</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #003580;
            --secondary-color: #002855;
            --background-color: #f5f5f5;
            --text-color: #333;
            --sidebar-width: 250px;
            --header-height: 60px;
            --card-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 1.5rem;
            color: var(--text-color);
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }

        .brand {
            padding: 2rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            background: rgba(0,0,0,0.1);
        }

        .brand-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            background: white;
            padding: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .user-info {
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            background: rgba(0,0,0,0.05);
        }

        .user-name {
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: white;
        }

        .user-role {
            font-size: 0.875rem;
            opacity: 0.8;
            padding: 0.25rem 1rem;
            background: rgba(255,255,255,0.1);
            border-radius: 15px;
            display: inline-block;
        }

        .nav-menu {
            padding: 1rem 0;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .nav-menu .nav-section {
            flex: 1;
        }

        .nav-menu .nav-section.bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 1rem;
        }

        .nav-item {
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: white;
            transform: scaleY(0);
            transition: transform 0.2s;
        }

        .nav-item:hover::before,
        .nav-item.active::before {
            transform: scaleY(1);
        }

        .nav-item:hover, 
        .nav-item.active {
            background: rgba(255,255,255,0.1);
            color: white;
            padding-left: 2rem;
        }

        .nav-item i {
            width: 20px;
            margin-right: 10px;
            font-size: 1.1rem;
        }

        /* User Profile Menu */
        .user-profile {
            position: relative;
        }

        .profile-trigger {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border: 2px solid rgba(255,255,255,0.1);
        }

        .profile-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            min-width: 220px;
            margin-top: 0.75rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s;
        }

        .profile-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .profile-menu-header {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        .profile-menu-name {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.25rem;
        }

        .profile-menu-email {
            font-size: 0.875rem;
            color: #666;
        }

        .profile-menu-item {
            padding: 0.875rem 1.25rem;
            display: flex;
            align-items: center;
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.3s;
        }

        .profile-menu-item:hover {
            background: var(--background-color);
            padding-left: 1.5rem;
        }

        .profile-menu-item i {
            width: 20px;
            margin-right: 12px;
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        .profile-menu-item.logout {
            color: #dc3545;
            border-top: 1px solid #eee;
        }

        .profile-menu-item.logout i {
            color: #dc3545;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }

            .brand span,
            .nav-item span {
                display: none;
            }

            .main-content {
                margin-left: 60px;
            }
        }

        /* Project Table Styles */
        .project-table {
            width: 100%;
            background: white;
            border-radius: 8px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .project-table th {
            background: #f8f9fa;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #495057;
            border-bottom: 2px solid #e9ecef;
        }

        .project-table td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        .project-table tr:hover {
            background: #f8f9fa;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-active {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .status-completed {
            background: #e3f2fd;
            color: #1976d2;
        }

        .status-cancelled {
            background: #ffebee;
            color: #c62828;
        }

        .priority-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .priority-urgent {
            background: #ffebee;
            color: #c62828;
        }

        .priority-high {
            background: #fff3e0;
            color: #f57c00;
        }

        .priority-medium {
            background: #fff8e1;
            color: #ffa000;
        }

        .priority-low {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-button {
            padding: 0.5rem;
            border-radius: 4px;
            color: white;
            transition: all 0.3s;
        }

        .action-button.view {
            background: #1976d2;
        }

        .action-button.edit {
            background: #f57c00;
        }

        .action-button.delete {
            background: #c62828;
        }

        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .success-message {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="brand">
                <img src="data:image/svg+xml;base64,{{ base64_encode('
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
                        <circle cx="100" cy="100" r="90" fill="#4169E1"/>
                        <path d="M100 40 C60 40 40 70 40 100 C40 130 60 160 100 160 C140 160 160 130 160 100 C160 70 140 40 100 40 Z M100 140 C70 140 60 120 60 100 C60 80 70 60 100 60 C130 60 140 80 140 100 C140 120 130 140 100 140 Z" fill="white"/>
                        <circle cx="100" cy="100" r="30" fill="#4169E1"/>
                    </svg>
                ') }}" alt="Logo" class="brand-logo">
            </div>
            <div class="user-info">
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-role">{{ auth()->user()->role === 'admin' ? 'Yönetici' : 'Personel' }}</div>
            </div>
            <nav class="nav-menu">
                <div class="nav-section">
                    <a href="/dashboard" class="nav-item">
                        <i class="fas fa-home"></i>
                        <span>Gösterge Paneli</span>
                    </a>
                    @if(auth()->user()->role === 'admin')
                    <a href="/customers" class="nav-item">
                        <i class="fas fa-users"></i>
                        <span>Müşteriler</span>
                    </a>
                    <a href="/opportunities" class="nav-item">
                        <i class="fas fa-user-plus"></i>
                        <span>Potansiyel Müşteriler</span>
                    </a>
                    @endif
                    <a href="/projects" class="nav-item active">
                        <i class="fas fa-project-diagram"></i>
                        <span>Projeler</span>
                    </a>
                    <a href="/tasks" class="nav-item">
                        <i class="fas fa-tasks"></i>
                        <span>Görevler</span>
                    </a>
                    <a href="/calendar" class="nav-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Takvim</span>
                    </a>
                    <a href="/support" class="nav-item">
                        <i class="fas fa-headset"></i>
                        <span>Destek Talepleri</span>
                    </a>
                    @if(auth()->user()->role === 'admin')
                    <a href="/staff" class="nav-item">
                        <i class="fas fa-user-tie"></i>
                        <span>Personel Yönetimi</span>
                    </a>
                    @endif
                </div>
                <div class="nav-section bottom">
                    <a href="/settings" class="nav-item">
                        <i class="fas fa-cog"></i>
                        <span>Ayarlar</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Projeler</h1>
                @can('create', App\Models\Project::class)
                <a href="{{ route('projects.create') }}" class="action-button" style="background: #2e7d32;">
                    <i class="fas fa-plus"></i> Yeni Proje
                </a>
                @endcan
                <div class="user-profile">
                    <div class="profile-trigger" onclick="toggleProfileMenu()">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="profile-menu" id="profileMenu">
                        <div class="profile-menu-header">
                            <div class="profile-menu-name">{{ auth()->user()->name }}</div>
                            <div class="profile-menu-email">{{ auth()->user()->email }}</div>
                        </div>
                        <a href="/profile" class="profile-menu-item">
                            <i class="fas fa-user"></i>
                            <span>Profil</span>
                        </a>
                        <a href="/settings" class="profile-menu-item">
                            <i class="fas fa-cog"></i>
                            <span>Ayarlar</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" 
                           class="profile-menu-item logout"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Çıkış Yap</span>
                        </a>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
            @endif

            @if($projects->isEmpty())
            <div class="empty-state">
                <i class="fas fa-project-diagram"></i>
                <p>Henüz proje bulunmamaktadır.</p>
            </div>
            @else
            <div class="project-table">
                <table>
                    <thead>
                        <tr>
                            <th>Proje Adı</th>
                            <th>Müşteri</th>
                            <th>Durum</th>
                            <th>Öncelik</th>
                            <th>Başlangıç</th>
                            <th>Bitiş</th>
                            <th>Atanan</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->customer ? $project->customer->name : '-' }}</td>
                            <td>
                                <span class="status-badge status-{{ $project->status }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </td>
                            <td>
                                <span class="priority-badge priority-{{ $project->priority }}">
                                    {{ ucfirst($project->priority) }}
                                </span>
                            </td>
                            <td>{{ $project->start_date->format('d.m.Y') }}</td>
                            <td>{{ $project->end_date->format('d.m.Y') }}</td>
                            <td>{{ $project->assignedTo ? $project->assignedTo->name : '-' }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('projects.show', $project) }}" class="action-button view" title="Görüntüle">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @can('update', $project)
                                    <a href="{{ route('projects.edit', $project) }}" class="action-button edit" title="Düzenle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('delete', $project)
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button delete" title="Sil" onclick="return confirm('Bu projeyi silmek istediğinizden emin misiniz?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
            @endif
        </div>
    </div>

    <script>
        // Profil menüsü kontrolü
        function toggleProfileMenu() {
            const menu = document.getElementById('profileMenu');
            menu.classList.toggle('active');
        }

        // Dışarı tıklandığında profil menüsünü kapatma
        document.addEventListener('click', function(event) {
            const profile = document.querySelector('.user-profile');
            const menu = document.getElementById('profileMenu');
            
            if (!profile.contains(event.target)) {
                menu.classList.remove('active');
            }
        });

        // Aktif menü öğesini işaretleme
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const menuItems = document.querySelectorAll('.nav-item');
            
            menuItems.forEach(item => {
                if (item.getAttribute('href') === currentPath) {
                    item.classList.add('active');
                }
            });
        });
    </script>
</body>
</html> 