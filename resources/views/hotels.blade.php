<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oteller - En İyi Fiyat Garantisi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .header {
            background-color: #003580;
            color: white;
            padding: 20px 0;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: #004b9c;
        }

        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 30px;
        }

        .filters {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            height: fit-content;
        }

        .filter-section {
            margin-bottom: 20px;
        }

        .filter-section h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .filter-option input[type="checkbox"] {
            margin-right: 10px;
        }

        .price-range {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .price-range input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .hotel-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .hotel-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            transition: transform 0.3s;
        }

        .hotel-card:hover {
            transform: translateY(-5px);
        }

        .hotel-image {
            width: 300px;
            height: 200px;
            overflow: hidden;
        }

        .hotel-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hotel-info {
            padding: 20px;
            flex: 1;
            display: flex;
            justify-content: space-between;
        }

        .hotel-details {
            flex: 1;
        }

        .hotel-name {
            font-size: 20px;
            color: #0071c2;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .hotel-location {
            color: #666;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .hotel-features {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
        }

        .hotel-price {
            text-align: right;
            min-width: 150px;
        }

        .price-value {
            font-size: 24px;
            color: #0071c2;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .book-button {
            background-color: #0071c2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .book-button:hover {
            background-color: #005999;
        }

        .rating {
            background-color: #003580;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            margin-bottom: 10px;
            display: inline-block;
        }

        @media (max-width: 1024px) {
            .main-content {
                grid-template-columns: 1fr;
            }

            .filters {
                order: 2;
            }

            .hotel-card {
                flex-direction: column;
            }

            .hotel-image {
                width: 100%;
            }

            .hotel-info {
                flex-direction: column;
            }

            .hotel-price {
                text-align: left;
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <a href="/" class="logo">HotelBooking</a>
            <nav class="nav-links">
                <a href="/oteller">Oteller</a>
                <a href="/kampanyalar">Kampanyalar</a>
                <a href="/iletisim">İletişim</a>
                <a href="/giris">Giriş Yap</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Filters -->
        <aside class="filters">
            <div class="filter-section">
                <h3>Fiyat Aralığı</h3>
                <div class="price-range">
                    <input type="number" placeholder="Min ₺" min="0">
                    <input type="number" placeholder="Max ₺" min="0">
                </div>
            </div>

            <div class="filter-section">
                <h3>Yıldız Sayısı</h3>
                <div class="filter-option">
                    <input type="checkbox" id="star5">
                    <label for="star5">5 Yıldız</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="star4">
                    <label for="star4">4 Yıldız</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="star3">
                    <label for="star3">3 Yıldız</label>
                </div>
            </div>

            <div class="filter-section">
                <h3>Özellikler</h3>
                <div class="filter-option">
                    <input type="checkbox" id="wifi">
                    <label for="wifi">Ücretsiz WiFi</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="pool">
                    <label for="pool">Havuz</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="breakfast">
                    <label for="breakfast">Kahvaltı Dahil</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="parking">
                    <label for="parking">Ücretsiz Otopark</label>
                </div>
            </div>
        </aside>

        <!-- Hotel List -->
        <div class="hotel-list">
            @foreach ($hotels as $hotel)
            <div class="hotel-card">
                <div class="hotel-image">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945" alt="{{ $hotel->name }}">
                </div>
                <div class="hotel-info">
                    <div class="hotel-details">
                        <a href="#" class="hotel-name">{{ $hotel->name }}</a>
                        <div class="rating">8.9 Mükemmel</div>
                        <div class="hotel-location">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $hotel->address }}
                        </div>
                        <div class="hotel-features">
                            <span class="feature">
                                <i class="fas fa-wifi"></i>
                                Ücretsiz WiFi
                            </span>
                            <span class="feature">
                                <i class="fas fa-parking"></i>
                                Ücretsiz Otopark
                            </span>
                        </div>
                        <p>{{ $hotel->description }}</p>
                    </div>
                    <div class="hotel-price">
                        <div class="price-value">₺500</div>
                        <p>Gecelik Fiyat</p>
                        <a href="#" class="book-button">Rezervasyon Yap</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <script>
        // Filtreleme işlemleri için JavaScript
        document.querySelectorAll('.filter-option input').forEach(input => {
            input.addEventListener('change', function() {
                // Burada filtreleme mantığı eklenebilir
                console.log('Filter changed:', this.id, this.checked);
            });
        });

        // Fiyat aralığı için
        const priceInputs = document.querySelectorAll('.price-range input');
        priceInputs.forEach(input => {
            input.addEventListener('input', function() {
                // Burada fiyat filtreleme mantığı eklenebilir
                console.log('Price range changed:', this.value);
            });
        });
    </script>
</body>
</html> 