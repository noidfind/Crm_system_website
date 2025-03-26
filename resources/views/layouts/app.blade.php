<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Sistemi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-indigo-700 text-white">
            <div class="p-6">
                <h2 class="text-2xl font-semibold">CRM Sistemi</h2>
                <p class="text-sm mt-1">Hoş geldiniz</p>
            </div>
            <nav class="mt-6">
                <div class="px-4 space-y-2">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-600 transition-colors">
                        <i class="fas fa-home mr-2"></i> Dashboard
                    </a>
                    @if(session('user_id'))
                        @php
                            $user = \App\Models\User::find(session('user_id'));
                        @endphp
                        @if($user && ($user->role == 'admin' || $user->role == 'user'))
                            <a href="{{ route('customers.index') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-600 transition-colors">
                                <i class="fas fa-users mr-2"></i> Müşteriler
                            </a>
                            <a href="{{ route('opportunities.index') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-600 transition-colors">
                                <i class="fas fa-chart-line mr-2"></i> Fırsatlar
                            </a>
                            <a href="{{ route('tasks.index') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-600 transition-colors">
                                <i class="fas fa-tasks mr-2"></i> Görevler
                            </a>
                        @endif
                        <a href="{{ route('tickets.index') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-600 transition-colors">
                            <i class="fas fa-ticket-alt mr-2"></i> Destek Talepleri
                        </a>
                    @endif
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <h1 class="text-xl font-semibold">@yield('title', 'Dashboard')</h1>
                        </div>
                        <div class="flex items-center">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="px-4 py-2 text-sm bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Çıkış Yap
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html> 