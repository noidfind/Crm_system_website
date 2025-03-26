@extends('layouts.app')

@section('title', 'Müşteri Dashboard')

@section('content')
<!-- İstatistik Kartları -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <div class="text-gray-500 text-sm">Açık Destek Talepleri</div>
            <div class="text-2xl font-semibold">{{ $openTickets }}</div>
        </div>
    </div>
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <div class="text-gray-500 text-sm">Toplam Rezervasyon</div>
            <div class="text-2xl font-semibold">{{ $totalBookings }}</div>
        </div>
    </div>
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <div class="text-gray-500 text-sm">Toplam Harcama</div>
            <div class="text-2xl font-semibold">{{ number_format($totalSpent, 2) }} TL</div>
        </div>
    </div>
</div>

<!-- Ana İçerik Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Son Rezervasyonlar -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4">Son Rezervasyonlarınız</h3>
            <div class="space-y-4">
                @foreach($recentBookings as $booking)
                <div class="flex items-center justify-between border-b pb-2">
                    <div>
                        <div class="font-medium">{{ $booking->hotel_name }}</div>
                        <div class="text-sm text-gray-500">
                            {{ $booking->check_in->format('d.m.Y') }} - {{ $booking->check_out->format('d.m.Y') }}
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="font-medium">{{ number_format($booking->total_price, 2) }} {{ $booking->currency }}</div>
                        <div class="text-sm text-gray-500">{{ $booking->status }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Destek Talepleri -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4">Destek Talepleriniz</h3>
            <div class="space-y-4">
                @foreach($supportTickets as $ticket)
                <div class="flex items-center justify-between border-b pb-2">
                    <div>
                        <div class="font-medium">{{ $ticket->subject }}</div>
                        <div class="text-sm text-gray-500">
                            {{ $ticket->ticket_number }}
                            <span class="ml-2 px-2 py-1 text-xs rounded-full 
                                @if($ticket->status === 'open') bg-green-100 text-green-800
                                @elseif($ticket->status === 'pending') bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($ticket->status) }}
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('tickets.show', $ticket) }}" class="text-indigo-600 hover:text-indigo-900">Detay</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Özel Teklifler -->
<div class="mt-6">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4">Size Özel Teklifler</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($specialOffers as $offer)
                <div class="border rounded-lg p-4">
                    <img src="{{ $offer->image_url }}" alt="{{ $offer->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h4 class="font-medium mb-2">{{ $offer->title }}</h4>
                    <p class="text-gray-600 text-sm mb-4">{{ $offer->description }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-indigo-600">{{ number_format($offer->price, 2) }} TL</span>
                        <a href="{{ $offer->booking_url }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                            Rezervasyon Yap
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection 