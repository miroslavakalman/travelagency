@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Управление Отзывами</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Тур</th>
            <th>Имя пользователя</th>
            <th>Текст отзыва</th>
            <th>Дата создания</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reviews as $review)
            <tr>
                <td data-label="ID">{{ $review->id }}</td>
                <td data-label="Тур">{{ $review->tour->type }}</td>
                <td data-label="Имя пользователя">{{ $review->user_name }}</td>
                <td data-label="Текст отзыва">{{ $review->text }}</td>
                <td data-label="Дата создания">{{ $review->created_at->format('d.m.Y H:i') }}</td>
                <td data-label="Действия">
                    <form action="{{ route('reviews.destroy', $review) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот отзыв?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>

<style>
    .container {
        margin-top: 20px;
    }
    table {
        width: 100%;
    }
    th, td {
        text-align: left;
        padding: 8px;
    }
</style>

@endsection
