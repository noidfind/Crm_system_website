<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Yeni Proje</title>
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

        /* Form Styles */
        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0,53,128,0.1);
        }

        .form-control.error {
            border-color: #dc3545;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
            grid-column: 1 / -1;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
        @media (max-width: 1024px) {
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
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
                <h1>Yeni Proje Oluştur</h1>
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

            <div class="form-container">
                <form action="{{ route('projects.store') }}" method="POST" id="projectForm">
                    @csrf
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-project-diagram"></i> Proje Adı
                            </label>
                            <input type="text" name="title" class="form-control @error('title') error @enderror" 
                                   value="{{ old('title') }}" required>
                            @error('title')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-calendar"></i> Başlangıç Tarihi
                            </label>
                            <input type="date" name="start_date" class="form-control @error('start_date') error @enderror" 
                                   value="{{ old('start_date') }}" required>
                            @error('start_date')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-calendar-check"></i> Bitiş Tarihi
                            </label>
                            <input type="date" name="end_date" class="form-control @error('end_date') error @enderror" 
                                   value="{{ old('end_date') }}" required>
                            @error('end_date')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-tasks"></i> Durum
                            </label>
                            <select name="status" class="form-control @error('status') error @enderror" required>
                                <option value="">Seçiniz</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Tamamlandı</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>İptal Edildi</option>
                            </select>
                            @error('status')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-exclamation-circle"></i> Öncelik
                            </label>
                            <select name="priority" class="form-control @error('priority') error @enderror" required>
                                <option value="">Seçiniz</option>
                                <option value="urgent" {{ old('priority') == 'urgent' ? 'selected' : '' }}>Acil</option>
                                <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>Yüksek</option>
                                <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Orta</option>
                                <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Düşük</option>
                            </select>
                            @error('priority')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user"></i> Müşteri
                            </label>
                            <select name="customer_id" class="form-control @error('customer_id') error @enderror">
                                <option value="">Seçiniz</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user-tie"></i> Atanan Personel
                            </label>
                            <select name="assigned_to" class="form-control @error('assigned_to') error @enderror">
                                <option value="">Seçiniz</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('assigned_to') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('assigned_to')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label class="form-label">
                                <i class="fas fa-align-left"></i> Açıklama
                            </label>
                            <textarea name="description" class="form-control @error('description') error @enderror" 
                                      rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> İptal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Projeyi Kaydet
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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

        // Form validasyonu
        document.getElementById('projectForm').addEventListener('submit', function(e) {
            const startDate = new Date(document.querySelector('input[name="start_date"]').value);
            const endDate = new Date(document.querySelector('input[name="end_date"]').value);
            
            if (endDate < startDate) {
                e.preventDefault();
                alert('Bitiş tarihi başlangıç tarihinden önce olamaz!');
                return false;
            }
        });

        // Tarih alanları için minimum tarih kontrolü
        const today = new Date().toISOString().split('T')[0];
        document.querySelector('input[name="start_date"]').min = today;
        document.querySelector('input[name="end_date"]').min = today;

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