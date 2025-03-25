@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-100 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-2">Müşteri Yönetimi</h2>
                        <p class="text-gray-600 mb-4">Müşteri listesi ve detayları</p>
                        <a href="{{ route('customers.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Müşterileri Görüntüle
                        </a>
                    </div>

                    <div class="bg-green-100 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-2">Yeni Müşteri</h2>
                        <p class="text-gray-600 mb-4">Yeni müşteri kaydı oluştur</p>
                        <a href="{{ route('customers.create') }}" class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Müşteri Ekle
                        </a>
                    </div>

                    <div class="bg-purple-100 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-2">Sistem Durumu</h2>
                        <p class="text-gray-600">Toplam Müşteri: {{ \App\Models\Customer::count() }}</p>
                        <p class="text-gray-600">Toplam Kullanıcı: {{ \App\Models\User::where('role', 'user')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 