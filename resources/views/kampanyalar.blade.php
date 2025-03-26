<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kampanyalar - En İyi Fiyat Garantisi</title>
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
        }

        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 60px 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 40px;
        }

        .hero-section h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.2em;
            max-width: 600px;
            margin: 0 auto;
        }

        .campaigns {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .campaign-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .campaign-card:hover {
            transform: translateY(-5px);
        }

        .campaign-image {
            height: 200px;
            overflow: hidden;
        }

        .campaign-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .campaign-content {
            padding: 20px;
        }

        .campaign-title {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .campaign-description {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .campaign-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .campaign-price {
            color: #0071c2;
            font-size: 24px;
            font-weight: bold;
        }

        .campaign-button {
            background-color: #0071c2;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .campaign-button:hover {
            background-color: #005999;
        }

        .discount-badge {
            background-color: #e31c5f;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
        }

        .campaign-dates {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-section {
                padding: 40px 20px;
            }

            .hero-section h1 {
                font-size: 2em;
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

    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <h1>Özel Kampanyalar</h1>
            <p>En avantajlı fiyatlar ve unutulmaz tatil deneyimleri için kampanyalarımızı keşfedin.</p>
        </section>

        <!-- Campaigns -->
        <div class="campaigns">
            <!-- Erken Rezervasyon -->
            <div class="campaign-card">
                <div class="campaign-image">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945" alt="Erken Rezervasyon">
                </div>
                <div class="campaign-content">
                    <div class="discount-badge">%25 İNDİRİM</div>
                    <h2 class="campaign-title">Erken Rezervasyon Fırsatı</h2>
                    <div class="campaign-dates">
                        <i class="far fa-calendar-alt"></i>
                        1 Haziran - 30 Eylül 2024
                    </div>
                    <p class="campaign-description">Yaz tatilinizi şimdiden planlayın, %25'e varan erken rezervasyon indirimi fırsatını kaçırmayın!</p>
                    <div class="campaign-details">
                        <span class="campaign-price">₺500'den başlayan fiyatlarla</span>
                        <a href="#" class="campaign-button">İncele</a>
                    </div>
                </div>
            </div>

            <!-- Aile Paketi -->
            <div class="campaign-card">
                <div class="campaign-image">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945" alt="Aile Paketi">
                </div>
                <div class="campaign-content">
                    <div class="discount-badge">ÇOCUKLAR ÜCRETSİZ</div>
                    <h2 class="campaign-title">Aile Tatil Paketi</h2>
                    <div class="campaign-dates">
                        <i class="far fa-calendar-alt"></i>
                        Tüm Yıl Geçerli
                    </div>
                    <p class="campaign-description">12 yaş altı çocuklar ücretsiz! Ailece unutulmaz bir tatil için hemen rezervasyon yapın.</p>
                    <div class="campaign-details">
                        <span class="campaign-price">₺750'den başlayan fiyatlarla</span>
                        <a href="#" class="campaign-button">İncele</a>
                    </div>
                </div>
            </div>

            <!-- Balayı Paketi -->
            <div class="campaign-card">
                <div class="campaign-image">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945" alt="Balayı Paketi">
                </div>
                <div class="campaign-content">
                    <div class="discount-badge">ÖZEL PAKET</div>
                    <h2 class="campaign-title">Balayı Özel Paketi</h2>
                    <div class="campaign-dates">
                        <i class="far fa-calendar-alt"></i>
                        Tüm Yıl Geçerli
                    </div>
                    <p class="campaign-description">Özel balayı süiti, romantik akşam yemeği ve spa hizmetleri dahil özel paket!</p>
                    <div class="campaign-details">
                        <span class="campaign-price">₺1000'den başlayan fiyatlarla</span>
                        <a href="#" class="campaign-button">İncele</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Kampanya kartları için hover efekti
        document.querySelectorAll('.campaign-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Kampanya butonları için tıklama olayı
        document.querySelectorAll('.campaign-button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                alert('Bu kampanya detayları yakında açılacaktır!');
            });
        });
    </script>
</body>
</html> 