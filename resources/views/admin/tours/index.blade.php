@extends('layouts.app')

@section('content')
    <h1>Управление турами</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <a href="{{ route('admin.tours.create') }}" class="btn btn-primary">Добавить тур</a>
    <table class="table-responsive" style="margin-top: 40px;">
    <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Тип</th>
            <th>Стоимость</th>
            <th>Длительность</th>
            <th>Континент</th>
            <th>Страна</th>
            <th>Язык</th>
            <th>Тип проживания</th>
            <th>Изображение</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tours as $tour)
            <tr>
                <td>{{ $tour->name }}</td>
                <td>{{ $tour->description }}</td>
                <td>{{ $tour->type }}</td>
                <td>{{ $tour->cost }}</td>
                <td>{{ $tour->duration }}</td>
                <td>{{ $tour->continent }}</td>
                <td>{{ $tour->country }}</td>
                <td>{{ $tour->language }}</td>
                <td>{{ $tour->accommodation_type }}</td>
                <td>
                    @if ($tour->image_path)
                        <img src="{{ asset($tour->image_path) }}" alt="Изображение тура" style="max-width: 100px;">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.tours.edit', $tour) }}">Редактировать</a>
                    <form action="{{ route('admin.tours.destroy', $tour) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
