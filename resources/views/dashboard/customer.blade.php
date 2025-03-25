@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-6">Müşteri Dashboard</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-blue-100 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-2">Firma Bilgileri</h2>
                        <div class="space-y-2">
                            <p class="text-gray-600">Şirket Adı: {{ auth()->guard('customer')->user()->company_name }}</p>
                            <p class="text-gray-600">İletişim Kişisi: {{ auth()->guard('customer')->user()->contact_name }}</p>
                            <p class="text-gray-600">E-posta: {{ auth()->guard('customer')->user()->email }}</p>
                            <p class="text-gray-600">Telefon: {{ auth()->guard('customer')->user()->phone }}</p>
                            <p class="text-gray-600">Adres: {{ auth()->guard('customer')->user()->address }}</p>
                            <p class="text-gray-600">Vergi No: {{ auth()->guard('customer')->user()->tax_number }}</p>
                            <p class="text-gray-600">Vergi Dairesi: {{ auth()->guard('customer')->user()->tax_office }}</p>
                        </div>
                    </div>

                    <div class="bg-green-100 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-2">Son İşlemler</h2>
                        <p class="text-gray-600">Henüz işlem bulunmuyor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 