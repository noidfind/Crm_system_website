<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Gösterge Paneli</title>
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

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .stat-icon.blue { background-color: #e3f2fd; color: #1976d2; }
        .stat-icon.green { background-color: #e8f5e9; color: #2e7d32; }
        .stat-icon.purple { background-color: #f3e5f5; color: #7b1fa2; }
        .stat-icon.orange { background-color: #fff3e0; color: #f57c00; }
        .stat-icon.red { background-color: #ffebee; color: #c62828; }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-size: 0.875rem;
        }

        /* Table Cards */
        .table-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
        }

        /* Footer */
        .footer {
            margin-top: auto;
            width: 100%;
            height: 60px;
            padding: 1rem;
            text-align: center;
            color: #666;
            font-size: 0.875rem;
            border-top: 1px solid #eee;
            background: white;
        }

        .footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: var(--secondary-color);
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

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 3px;
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

        .brand-logo:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
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

        .nav-item span {
            font-weight: 500;
        }

        /* Tables */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #666;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }

            .brand span, .nav-item span {
                display: none;
            }

            .main-content {
                margin-left: 60px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
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

        .profile-trigger:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
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

        .profile-menu::before {
            content: '';
            position: absolute;
            top: -6px;
            right: 20px;
            width: 12px;
            height: 12px;
            background: white;
            transform: rotate(45deg);
            border-radius: 2px;
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
                <div class="user-role">{{ auth()->user()->role === 'admin' ? 'Yönetici' : 'Kullanıcı' }}</div>
            </div>
            <nav class="nav-menu">
                <div class="nav-section">
                    <a href="/dashboard" class="nav-item active">
                        <i class="fas fa-home"></i>
                        <span>Gösterge Paneli</span>
                    </a>
                    <a href="/customers" class="nav-item">
                        <i class="fas fa-users"></i>
                        <span>Müşteriler</span>
                    </a>
                    <a href="/opportunities" class="nav-item">
                        <i class="fas fa-user-plus"></i>
                        <span>Potansiyel Müşteriler</span>
                    </a>
                    <a href="/projects" class="nav-item">
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
                <h1>Gösterge Paneli</h1>
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
                        <a href="{{ route('logout') }}" 
                           class="profile-menu-item logout"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Çıkış Yap</span>
                        </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-value">{{ $totalCustomers ?? 0 }}</div>
                    <div class="stat-label">Toplam Müşteri</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="stat-value">{{ $potentialCustomers ?? 0 }}</div>
                    <div class="stat-label">Potansiyel Müşteri</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon purple">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="stat-value">{{ $activeProjects ?? 0 }}</div>
                    <div class="stat-label">Aktif Projeler</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon orange">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="stat-value">{{ $pendingTasks ?? 0 }}</div>
                    <div class="stat-label">Bekleyen Görevler</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon red">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="stat-value">{{ $openTickets ?? 0 }}</div>
                    <div class="stat-label">Açık Destek Talepleri</div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="content-grid">
                <!-- Recent Customers -->
                <div class="table-card">
                    <div class="table-header">
                        <h2 class="table-title">Son Eklenen Müşteriler</h2>
                        <a href="/customers" class="nav-item">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    @if(isset($recentCustomers) && count($recentCustomers) > 0)
                        <!-- Müşteri listesi buraya gelecek -->
                    @else
                        <div class="empty-state">
                            <i class="fas fa-users"></i>
                            <p>Henüz müşteri bulunmamaktadır.</p>
                        </div>
                    @endif
                </div>

                <!-- Upcoming Tasks -->
                <div class="table-card">
                    <div class="table-header">
                        <h2 class="table-title">Yaklaşan Görevler</h2>
                        <a href="/tasks" class="nav-item">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    @if(isset($upcomingTasks) && count($upcomingTasks) > 0)
                        <!-- Görev listesi buraya gelecek -->
                    @else
                        <div class="empty-state">
                            <i class="fas fa-tasks"></i>
                            <p>Yaklaşan görev bulunmamaktadır.</p>
                        </div>
                    @endif
                </div>
            </div>

            <footer class="footer">
                <p>Developed by <a href="https://github.com/cagri" target="_blank">Çağrı Açıkgöz</a> &copy; {{ date('Y') }}</p>
            </footer>
        </div>
    </div>

    <script>
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

        // Menü öğelerine hover efekti
        const menuItems = document.querySelectorAll('.nav-item');
        menuItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
    </script>
</body>
</html> 