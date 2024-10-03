@extends('layouts.app')

@section('content')
    <div class="profile">
        <h1>Личный Кабинет</h1>
        <h2>Привет, {{ $user->name }}!</h2>

        <h3>Ваши бронирования:</h3>
        @if($bookings->isEmpty())
            <p>У вас нет активных бронирований.</p>
        @else
        <div class="card-container">
    @foreach($bookings as $booking)
        <div class="card">
            <a href="{{ route('tours.show', $booking->tour->id) }}">
                <h4>{{ $booking->tour->name }}</h4>
                <p><strong>Количество человек:</strong> {{ $booking->number_of_people }}</p>
                <p><strong>Дата начала:</strong> {{ $booking->start_date }}</p>
                <p><strong>Дата окончания:</strong> {{ $booking->end_date }}</p>
            </a>
            <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" style="background-color: white;">
                @csrf
                <button type="submit" class="btn-primary">Отменить</button>
            </form>
            <form action="{{ route('bookings.update', $booking->id) }}" method="POST" style="margin-top: 20px;">
                @csrf
                <label for="number_of_people">Количество человек:</label>
                <input type="number" name="number_of_people" value="{{ $booking->number_of_people }}" required min="1">

                <label for="start_date">Дата начала:</label>
                <input type="date" name="start_date" value="{{ $booking->start_date }}" required>

                <label for="end_date">Дата окончания:</label>
                <input type="date" name="end_date" value="{{ $booking->end_date }}" required>

                <button type="submit" class="btn-primary">Обновить</button>
            </form>
        </div>
    @endforeach
</div>

        @endif
    </div>

    <style>

        h1, h2, h3{
            color: #bf836a;
        }
        .profile {
            padding: 20px;
            text-align: center;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 10px;
            width: 200px;
            transition: box-shadow 0.3s;
            text-decoration: none;
            color: inherit;
        }
        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card h4 {
            margin: 0 0 10px;
        }

        form{
            width: auto;
            height: auto;
        }
    </style>
@endsection
