@extends('layouts.app')

@section('content')
<form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Название тура</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="description">Описание тура</label>
        <textarea name="description" id="description" required></textarea>
    </div>
    <div>
        <label for="type">Тип</label>
        <input type="text" name="type" id="type" required>
    </div>
    <div>
        <label for="cost">Стоимость</label>
        <input type="number" name="cost" id="cost" step="0.01" required>
    </div>
    <div>
        <label for="duration">Длительность</label>
        <input type="number" name="duration" id="duration" required>
    </div>
    <div>
        <label for="continent">Континент</label>
        <input type="text" name="continent" id="continent" required>
    </div>
    <div>
        <label for="country">Страна</label>
        <input type="text" name="country" id="country" required>
    </div>
    <div>
        <label for="language">Язык</label>
        <input type="text" name="language" id="language" required>
    </div>
    <div>
        <label for="accommodation_type">Тип проживания</label>
        <input type="text" name="accommodation_type" id="accommodation_type" required>
    </div>
    <div>
        <label for="image_path">Путь к изображению</label>
        <input type="text" name="image_path" id="image_path" required>
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

    <button type="submit">Создать тур</button>
</form>

@endsection
