@extends('layouts.app')

@section('content')

    <div class="tour-detail">
        <div class="tour-details-col">
        <h1 class="tour-name-h1">{{ $tour->name }}</h1>
        <img src="{{ asset($tour->image_path) }}" alt="{{ $tour->type }}" class="tour-image">
        <!-- <p><strong>Континент:</strong> {{ $tour->continent }}</p>
        <p><strong>Страна:</strong> {{ $tour->country }}</p>
        <p><strong>Язык:</strong> {{ $tour->language }}</p>
        <p><strong>Тип проживания:</strong> {{ $tour->accommodation_type }}</p> -->
        <p class="tour-description-c">{{ $tour->description ?? 'Описание отсутствует.' }}</p>
        </div>

        @auth
            <form action="{{ route('tours.book', $tour) }}" method="POST">
                @csrf
                <div class="form-row">
                <p class="tour-cost">{{ $tour->cost }}₽</p>
                <p class="tour-duration">{{ $tour->duration }} дней</p>
                </div>
                <label for="number_of_people" class="label2">Количество человек (макс. {{ $tour->max_people }}):</label>
                <input type="number" name="number_of_people" class="number-input" required min="1" max="{{ $tour->max_people }}">

                <label for="date" class="label2">Выберите дату:</label>
                <select name="start_date" required>
                    @for ($i = 0; $i < $tour->duration; $i++)
                        <option value="{{ \Carbon\Carbon::now()->addDays($i)->toDateString() }}">
                            {{ \Carbon\Carbon::now()->addDays($i)->format('d.m.Y') }}
                        </option>
                    @endfor
                </select>

                <button type="submit" class="main-btn" style="width: 310px;">Забронировать</button>
            </form>


      
    </div>
    
    <form action="{{ route('tours.review', $tour) }}" method="POST">
                @csrf
                <h1 class="tour-name-h1">Оставить отзыв</h1>
                <input type="text" name="user_name" placeholder="Ваше имя" class="review-name" required>
                <textarea name="text" placeholder="Ваш отзыв" required class="review-name"></textarea>
                <button type="submit" class="main-btn" style="width: 310px;">Оставить отзыв</button>
            </form>
        @else
            <p>Чтобы оставить отзыв, вам нужно <a href="{{ route('login') }}">войти</a>.</p>
        @endauth
    <h2>Отзывы о туре:</h2>
        <div class="reviews">
            @forelse ($tour->reviews as $review)
                <div class="review">
                    <strong>{{ $review->user_name }}</strong>
                    <p>{{ $review->text }}</p>
                    <small>Дата: {{ $review->created_at->format('d.m.Y H:i') }}</small>
                </div>
            @empty
                <p>Нет отзывов на данный тур.</p>
            @endforelse
        </div>

    <style>
        @media screen and (max-width:1300px){
            .tour-detail{
                display: flex;
                flex-direction: column;
            }

            form{
                width: 320px !important;
            }

            .review-name{
                width: 280px;
            }

            .select{
                width: 180px !important;   
            }

            .main-btn{
                width: 205px !important;
            }
        }
        .tour-cost{
            font-weight: 700;
            font-size: 36px;
            color: #7b7b7b;
        }

        .tour-duration{
            font-weight: 350;
            font-size: 24px;
            color: #7b7b7b;
        }
        .tour-details-col img{
            width: 320px;
        }
        .tour-detail {
            text-align: center;
            padding: 20px;
        }
         
        form {
            margin: 20px 0;
            width: 548px;
            height: 607px;
            border-radius: 20px;
            background: none !important;
        }
        .reviews {
            margin-top: 30px;
            text-align: left;
        }
        .review {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        select{
                width: 180px !important;   
        }

    </style>
@endsection
