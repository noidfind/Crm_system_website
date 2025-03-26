<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proje Düzenle</title>
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
        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input:focus, textarea:focus, select:focus {
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
            background-color: #28a745;
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
            background-color: #218838;
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
        <h1>Proje Düzenle</h1>

        <form action="{{ route('projects.update', $project->id) }}" method="POST" id="projectForm">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Proje Adı:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Açıklama:</label>
                <textarea id="description" name="description">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_date">Başlangıç Tarihi:</label>
                <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date->format('Y-m-d')) }}" required>
                @error('start_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_date">Bitiş Tarihi:</label>
                <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $project->end_date->format('Y-m-d')) }}" required>
                @error('end_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Durum:</label>
                <select id="status" name="status" required>
                    <option value="active" {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Tamamlandı</option>
                    <option value="cancelled" {{ old('status', $project->status) == 'cancelled' ? 'selected' : '' }}>İptal Edildi</option>
                </select>
                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="priority">Öncelik:</label>
                <select id="priority" name="priority" required>
                    <option value="urgent" {{ old('priority', $project->priority) == 'urgent' ? 'selected' : '' }}>Acil</option>
                    <option value="high" {{ old('priority', $project->priority) == 'high' ? 'selected' : '' }}>Yüksek</option>
                    <option value="medium" {{ old('priority', $project->priority) == 'medium' ? 'selected' : '' }}>Orta</option>
                    <option value="low" {{ old('priority', $project->priority) == 'low' ? 'selected' : '' }}>Düşük</option>
                </select>
                @error('priority')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="customer_id">Müşteri:</label>
                <select id="customer_id" name="customer_id">
                    <option value="">Seçiniz</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id', $project->customer_id) == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="assigned_to">Atanan Personel:</label>
                <select id="assigned_to" name="assigned_to" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('assigned_to', $project->assigned_to) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('assigned_to')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-group">
                <button type="submit" class="submit-button">Değişiklikleri Kaydet</button>
                <a href="{{ route('projects.index') }}" class="back-button">Geri Dön</a>
            </div>
        </form>
    </div>

    <script>
        // Form doğrulama
        document.getElementById('projectForm').addEventListener('submit', function(e) {
            const startDate = new Date(document.getElementById('start_date').value);
            const endDate = new Date(document.getElementById('end_date').value);
            
            if (endDate < startDate) {
                e.preventDefault();
                alert('Bitiş tarihi başlangıç tarihinden önce olamaz!');
                return false;
            }
        });
    </script>
</body>
</html> 