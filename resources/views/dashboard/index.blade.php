@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@auth
<div class="p-6 space-y-6">
    <!-- Üst Başlık -->
    <div class="flex flex-col lg:flex-row justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 lg:mb-0">
            Hoş Geldiniz, {{ Auth::user()->name }}
        </h1>
        <div class="flex items-center space-x-3">
            <span class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg font-medium">
                <i class="fas fa-user-shield mr-2"></i>{{ ucfirst(Auth::user()->role) }}
            </span>
            <span class="px-4 py-2 bg-emerald-100 text-emerald-700 rounded-lg font-medium">
                <i class="fas fa-clock mr-2"></i>{{ now()->format('d.m.Y') }}
            </span>
        </div>
    </div>

    <!-- İstatistik Kartları -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
                <span class="text-sm font-medium text-blue-600 bg-blue-50 px-2.5 py-1 rounded-lg">+12%</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $totalCustomers }}</h3>
            <p class="text-gray-500 text-sm">Toplam Müşteri</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-indigo-100 p-3 rounded-lg">
                    <i class="fas fa-handshake text-indigo-600 text-xl"></i>
                </div>
                <span class="text-sm font-medium text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-lg">+5%</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $activeOpportunities }}</h3>
            <p class="text-gray-500 text-sm">Aktif Fırsatlar</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-emerald-100 p-3 rounded-lg">
                    <i class="fas fa-tasks text-emerald-600 text-xl"></i>
                </div>
                <span class="text-sm font-medium text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-lg">+8%</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $openTasks }}</h3>
            <p class="text-gray-500 text-sm">Açık Görevler</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-purple-100 p-3 rounded-lg">
                    <i class="fas fa-ticket-alt text-purple-600 text-xl"></i>
                </div>
                <span class="text-sm font-medium text-purple-600 bg-purple-50 px-2.5 py-1 rounded-lg">+15%</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $openTickets }}</h3>
            <p class="text-gray-500 text-sm">Açık Destek Talepleri</p>
        </div>
    </div>

    <!-- Ana İçerik Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Son Eklenen Müşteriler -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-800">Son Eklenen Müşteriler</h2>
                    <a href="{{ route('customers.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                        Tümünü Gör
                    </a>
                </div>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($recentCustomers as $customer)
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="bg-gray-100 w-10 h-10 rounded-full flex items-center justify-center">
                                <span class="text-gray-600 font-medium">{{ strtoupper(substr($customer->company_name, 0, 2)) }}</span>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-800">{{ $customer->company_name }}</h3>
                                <p class="text-xs text-gray-500">{{ $customer->city }}, {{ $customer->country }}</p>
                            </div>
                        </div>
                        <a href="{{ route('customers.show', $customer) }}" class="text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Yaklaşan Görevler -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-800">Yaklaşan Görevler</h2>
                    <a href="{{ route('tasks.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                        Tümünü Gör
                    </a>
                </div>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($upcomingTasks as $task)
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-gray-800">{{ $task->title }}</h3>
                            <div class="flex items-center mt-1 space-x-2">
                                <span class="text-xs text-gray-500">
                                    <i class="far fa-calendar mr-1"></i>
                                    {{ $task->due_date->format('d.m.Y') }}
                                </span>
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($task->priority === 'high') bg-red-100 text-red-800
                                    @elseif($task->priority === 'medium') bg-yellow-100 text-yellow-800
                                    @else bg-green-100 text-green-800 @endif">
                                    {{ ucfirst($task->priority) }}
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('tasks.show', $task) }}" class="text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Alt Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Satış Fırsatları -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-800">Aktif Satış Fırsatları</h2>
                    <a href="{{ route('opportunities.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                        Tümünü Gör
                    </a>
                </div>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($opportunities as $opportunity)
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-gray-800">{{ $opportunity->title }}</h3>
                            <div class="flex items-center mt-1 space-x-2">
                                <span class="text-xs text-gray-500">
                                    {{ number_format($opportunity->value, 2) }} {{ $opportunity->currency }}
                                </span>
                                <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                    {{ ucfirst($opportunity->stage) }}
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('opportunities.show', $opportunity) }}" class="text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- İstatistikler -->
        <div class="col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600 mb-2">
                            {{ number_format($stats['totalRevenue'], 2) }} TL
                        </div>
                        <p class="text-sm text-gray-500">Toplam Gelir</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">
                            {{ number_format($stats['averageDealSize'], 2) }} TL
                        </div>
                        <p class="text-sm text-gray-500">Ortalama Satış Tutarı</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-purple-600 mb-2">
                            {{ number_format($stats['ticketResolutionTime'], 1) }} Saat
                        </div>
                        <p class="text-sm text-gray-500">Ort. Destek Çözüm Süresi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<script>window.location = "{{ route('login') }}";</script>
@endauth

@push('styles')
<style>
    /* Animasyonlar için CSS */
    .hover\:shadow-lg {
        transition: all 0.3s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fadeIn {
        animation: fadeIn 0.5s ease-out forwards;
    }

    .grid > * {
        animation: fadeIn 0.5s ease-out forwards;
    }

    .grid > *:nth-child(1) { animation-delay: 0.1s; }
    .grid > *:nth-child(2) { animation-delay: 0.2s; }
    .grid > *:nth-child(3) { animation-delay: 0.3s; }
    .grid > *:nth-child(4) { animation-delay: 0.4s; }
</style>
@endpush
@endsection 