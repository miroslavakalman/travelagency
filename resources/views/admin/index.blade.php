@extends('layouts.app')

@section('content')
    <div class="admin-dashboard">
        <h1>Админ Панель</h1>
        <div class="admin-links">
            <h2>Управление</h2>
            <ul>
                <li><a href="{{ route('admin.tours.index') }}">Управление Турами</a></li>
                <li><a href="{{ route('admin.reviews.index') }}">Управление Отзывами</a></li>
            </ul>
        </div>
    </div>

    <style>
        .admin-dashboard {
            text-align: center;
            padding: 20px;
        }
        .admin-links ul {
            list-style-type: none;
            padding: 0;
        }
        .admin-links li {
            margin: 10px 0;
        }
        .admin-links a {
            text-decoration: none;
            color: #007bff;
        }
        .admin-links a:hover {
            text-decoration: underline;
        }
    </style>
@endsection
