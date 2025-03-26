<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Otel Ekle</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f5f5f5;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
        }
        textarea {
            height: 120px;
            resize: vertical;
        }
        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        .submit-button {
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            flex: 1;
        }
        .submit-button:hover {
            background-color: #0056b3;
        }
        .back-button {
            background-color: #6c757d;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s;
            flex: 1;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Yeni Otel Ekle</h1>

        <form action="/hotels" method="POST" id="hotelForm">
            @csrf
            <div class="form-group">
                <label for="name">Otel Adı:</label>
                <input type="text" id="name" name="name" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Adres:</label>
                <input type="text" id="address" name="address" required>
                @error('address')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Telefon:</label>
                <input type="text" id="phone" name="phone" required>
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Açıklama:</label>
                <textarea id="description" name="description"></textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-group">
                <button type="submit" class="submit-button">Otel Ekle</button>
                <a href="/hotels" class="back-button">Geri Dön</a>
            </div>
        </form>
    </div>

    <script>
        // Form doğrulama
        document.getElementById('hotelForm').addEventListener('submit', function(e) {
            let isValid = true;
            const name = document.getElementById('name').value.trim();
            const address = document.getElementById('address').value.trim();
            const phone = document.getElementById('phone').value.trim();

            // Telefon numarası formatı kontrolü
            const phoneRegex = /^[0-9\s\-\+]{10,20}$/;
            
            if (name.length < 3) {
                alert('Otel adı en az 3 karakter olmalıdır.');
                isValid = false;
            }
            
            if (address.length < 5) {
                alert('Lütfen geçerli bir adres giriniz.');
                isValid = false;
            }
            
            if (!phoneRegex.test(phone)) {
                alert('Lütfen geçerli bir telefon numarası giriniz.');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });

        // Telefon numarası formatı
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                if (value.length > 10) {
                    value = value.substr(0, 10);
                }
                const matches = value.match(/^(\d{3})(\d{3})(\d{4})$/);
                if (matches) {
                    e.target.value = `${matches[1]} ${matches[2]} ${matches[3]}`;
                } else {
                    e.target.value = value;
                }
            }
        });
    </script>
</body>
</html>
