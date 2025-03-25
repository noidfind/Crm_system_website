@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-6">Müşteri Düzenle</h1>

                <form action="{{ route('customers.update', $customer) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="company_name" class="block text-sm font-medium text-gray-700">Şirket Adı</label>
                        <input type="text" name="company_name" id="company_name" value="{{ $customer->company_name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <div>
                        <label for="contact_name" class="block text-sm font-medium text-gray-700">İletişim Kişisi</label>
                        <input type="text" name="contact_name" id="contact_name" value="{{ $customer->contact_name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E-posta</label>
                        <input type="email" name="email" id="email" value="{{ $customer->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Şifre (Boş bırakırsanız değişmeyecek)</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Telefon</label>
                        <input type="text" name="phone" id="phone" value="{{ $customer->phone }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Adres</label>
                        <textarea name="address" id="address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ $customer->address }}</textarea>
                    </div>

                    <div>
                        <label for="tax_number" class="block text-sm font-medium text-gray-700">Vergi Numarası</label>
                        <input type="text" name="tax_number" id="tax_number" value="{{ $customer->tax_number }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="tax_office" class="block text-sm font-medium text-gray-700">Vergi Dairesi</label>
                        <input type="text" name="tax_office" id="tax_office" value="{{ $customer->tax_office }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700">Notlar</label>
                        <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $customer->notes }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Değişiklikleri Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 