@extends('layouts.app')

@section('content')
    <h1>Редактировать тур</h1>
    <form action="{{ route('admin.tours.update', $tour) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Название тура</label>
            <input type="text" name="name" id="name" value="{{ $tour->name }}" required>
        </div>
        <div>
            <label for="description">Описание тура</label>
            <textarea name="description" id="description" required>{{ $tour->description }}</textarea>
        </div>
        <div>
            <label for="type">Тип</label>
            <input type="text" name="type" id="type" value="{{ $tour->type }}" required>
        </div>
        <div>
            <label for="cost">Стоимость</label>
            <input type="number" name="cost" id="cost" value="{{ $tour->cost }}" step="0.01" required>
        </div>
        <div>
            <label for="duration">Длительность</label>
            <input type="number" name="duration" id="duration" value="{{ $tour->duration }}" required>
        </div>
        <div>
            <label for="continent">Континент</label>
            <input type="text" name="continent" id="continent" value="{{ $tour->continent }}" required>
        </div>
        <div>
            <label for="country">Страна</label>
            <input type="text" name="country" id="country" value="{{ $tour->country }}" required>
        </div>
        <div>
            <label for="language">Язык</label>
            <input type="text" name="language" id="language" value="{{ $tour->language }}" required>
        </div>
        <div>
            <label for="accommodation_type">Тип проживания</label>
            <input type="text" name="accommodation_type" id="accommodation_type" value="{{ $tour->accommodation_type }}" required>
        </div>
        <div>
        <label for="max_people">Максимальное количество людей:</label>
        <input type="number" id="max_people" name="max_people" required min="1">
    </div>
    <div>
        <label for="start_date">Дата начала:</label>
        <input type="date" id="start_date" name="start_date">
    </div>
    <div>
        <label for="end_date">Дата окончания:</label>
        <input type="date" id="end_date" name="end_date">
    </div>

        <div>
            <label for="image_path">Изображение</label>
            <input type="file" name="image_path" id="image_path" accept="image/*">
            @if ($tour->image_path)
                <div>
                    <img src="{{ asset($tour->image_path) }}" alt="Изображение тура" style="max-width: 200px; margin-top: 10px;">
                </div>
            @endif
        </div>
        <button type="submit">Обновить тур</button>
    </form>
@endsection
