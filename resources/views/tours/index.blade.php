@extends('layouts.app')

@section('content')
<div class="map-text" style="margin-top: 85px;">
    <div class="main-text">ТУРЫ ПО <span>МИРУ</span></div>
    <div class="desc-text">Запланируйте своё идеальное путешествие за пару кликов</div>
</div>

<form method="GET" action="{{ route('tours.showAll') }}" id="tour-form">
    <div>
        <label for="type">Тип:</label>
        <select name="type" id="type">
            <option value="">Все</option>
            @foreach ($types as $type)
                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
            @endforeach
        </select>
    </div>
    <div>
    <label for="sort_by">Сортировать по:</label>
    <select name="sort_by" id="sort_by">
        <option value="">Без сортировки</option>
        <option value="cost_asc" {{ request('sort_by') == 'cost_asc' ? 'selected' : '' }}>Цена (по возрастанию)</option>
        <option value="cost_desc" {{ request('sort_by') == 'cost_desc' ? 'selected' : '' }}>Цена (по убыванию)</option>
        <option value="duration_asc" {{ request('sort_by') == 'duration_asc' ? 'selected' : '' }}>Длительность (по возрастанию)</option>
        <option value="duration_desc" {{ request('sort_by') == 'duration_desc' ? 'selected' : '' }}>Длительность (по убыванию)</option>
    </select>
</div>

    <div>
        <label for="continent">Континент:</label>
        <select name="continent" id="continent">
            <option value="">Все</option>
            @foreach ($continents as $continent)
                <option value="{{ $continent }}" {{ request('continent') == $continent ? 'selected' : '' }}>{{ $continent }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="language">Язык:</label>
        <select name="language" id="language">
            <option value="">Все</option>
            @foreach ($languages as $language)
                <option value="{{ $language }}" {{ request('language') == $language ? 'selected' : '' }}>{{ $language }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="accommodation_type">Тип проживания:</label>
        <select name="accommodation_type" id="accommodation_type">
            <option value="">Все</option>
            @foreach ($accommodationTypes as $accommodationType)
                <option value="{{ $accommodationType }}" {{ request('accommodation_type') == $accommodationType ? 'selected' : '' }}>{{ $accommodationType }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn-primary">Применить</button>
</form>

<div class="card-container">
    @foreach ($tours as $index => $tour)
        @if ($index % 2 == 0)
            <div class="row">
        @endif
        <div class="card-tour">
            <a href="{{ route('tours.show', $tour->id) }}">
                <img src="{{ asset($tour->image_path) }}" alt="{{ $tour->type }}" class="card-image">
                <div class="card-content">
                    <h2 class="card-title">{{ $tour->name }}</h2>
                    <p class="tour-description">{{ $tour->description }}</p>
                    <div class="row-des" style="margin-top: 10px;">
                        <p class="price">{{ $tour->cost }} руб.</p>
                        <p class="duration"> {{ $tour->duration }} день (ей)</p>
                    </div>
                    <div class="row-des">
                    <p class="duration">{{ $tour->country }}</p>
                    <p class="duration">Язык: {{ $tour->language }}</p>
                    </div>
                </div>
            </a>
        </div>
        @if ($index % 2 == 1 || $index == count($tours) - 1)
            </div>
        @endif
    @endforeach
</div>

<style>

    .row {
        display: flex;
        width: 100%;
        justify-content: center;
        gap: 40px;
        margin-bottom: 20px; 
    }

    @media screen and (max-width:835px){
        .row{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-container{
            margin-top: 80px;
        }

        #tour-form{
            width: 100%;
        }
    }
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        width: 300px;
        overflow: hidden;
        box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        margin: 10px; 
    }
    .card:hover {
        transform: scale(1.05);
    }
    .card-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .card-content {
        padding: 15px;
    }
    .card-title {
        font-size: 1.5em;
        margin: 0 0 10px;
    }
</style>
@endsection




