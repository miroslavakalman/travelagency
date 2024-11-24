@extends('layouts.app')

@section('content')
        <div class="map">
            <div class="map-text">
                <p class="main-text">МАРШРУТЫ И ТУРЫ ПО <span>ВСЕМУ МИРУ</span></p>
                <p class="desc-text">для просмотра туров нажмите на указатель</p>
            </div>
            <div class="map-pins">
                <img src="{{ asset('img/main-map-xl.png') }}" alt="" class="map-img">
                <div class="pins">
                <img src="{{ asset('img/pin-xl.png') }}" alt="Пин Северной Америки" class="pin-northamerica" id="pin-northamerica" data-continent="Северная Америка">
                <img src="{{ asset('img/pin-xl.png') }}" alt="Пин Европы" class="pin-europe" id="pin-europe" data-continent="Европа">
                <img src="{{ asset('img/pin-xl.png') }}" alt="Пин Южной Америки" class="pin-southamerica" id="pin-southamerica" data-continent="Южная Америка">
                <img src="{{ asset('img/pin-xl.png') }}" alt="Пин Азии" class="pin-asia" id="pin-asia" data-continent="Азия">
                <img src="{{ asset('img/pin-xl.png') }}" alt="Пин Австралии" class="pin-australia" id="pin-australia" data-continent="Австралия">
                <img src="{{ asset('img/pin-xl.png') }}" alt="Пин Африки" class="pin-africa" id="pin-africa" data-continent="Африка">
            </div>
            </div>
        </div>

        <div class="tours-choice">
            <p class="main-text">ПУТЕШЕСТВИЯ ПО <span>ВАШИМ ЗАПРОСАМ</span></p>
            <div class="wrapper">
                <div class="tours-row">
                    <img src="img/ocean.png" alt="">
                    <img src="img/east.png" alt="">
                    <img src="img/mount.png" alt="">
                </div>
                <div class="tours-row">
                    <img src="img/safari.png" alt="">
                    <img src="img/cruise.png" alt="">
                    <img src="img/weekend.png" alt="">
                </div>
                <div class="tours-row">
                    <img src="img/yoga.png" alt="">
                    <img src="img/cuisine.png" alt="">
                    <img src="img/culture.png" alt="">
                </div>
            </div>
        </div>
        <div class="reviews">
    <p class="main-text">ОТЗЫВЫ <span>ПУТЕШЕСТВЕННИКОВ</span></p>
    <div class="reviews-card">
        <button class="arrow left-arrow">&#10094;</button> 
        <div class="review-card">
            <p class="rev-text">Команда “Поехали!” организовала отличное и незабываемое путешествие!</p>
            <div class="author-arrow">
                <p class="rev-author">София Кузнецова, 12 сентября</p>
            </div>
        </div>
        <button class="arrow right-arrow">&#10095;</button> 
    </div>
</div>
<div class="planning">
    <div class="map-text">
        <p class="main-text">ПЛАНИРОВЩИК <span>ПОЕЗДОК</span></p>
        <p class="desc-text">запланируйте своё идеальное путешествие за пару кликов</p>
    </div>
    <form id="trip-planner-form">
        <select name="destination" id="destination">
            <option value="">выберите направление поездки</option>
            <option value="europe">Европа</option>
            <option value="asia">Азия</option>
            <option value="america">Америка</option>
            <option value="africa">Африка</option>
            <option value="australia">Австралия</option>
        </select>
        <select name="date" id="date">
            <option value="">выберите месяц поездки</option>
            <option value="2024-10-10">декабрь</option>
            <option value="2024-11-15">январь</option>
            <option value="2024-12-20">февраль</option>
            <option value="2025-01-05">март</option>
        </select>
        <select name="travelers" id="travelers">
            <option value="">количество путешественников</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5+</option>
        </select>
        <select name="budget" id="budget">
            <option value="">планируемый бюджет на поездку</option>
            <option value="50000">до 50 тыс.</option>
            <option value="100000">до 100 тыс.</option>
            <option value="200000">до 200 тыс.</option>
            <option value="300000">больше 200 тыс.</option>
        </select>
        <button type="button" class="main-btn" id="get-offers">получить предложения</button>
    </form>
</div>

</div>

<div id="phone-modal" style="display: none;" class="input-btn">
    <p>Пожалуйста, введите ваш номер телефона:</p>
    <input type="text" id="phone-input" placeholder="Ваш номер телефона">
    <button id="submit-phone" class="main-btn" style="width: 149px; height: 59px;">Отправить</button>
</div>

<div id="thank-you-modal" style="display: none;">
    <p>Спасибо! Наши менеджеры свяжутся с вами в ближайшее время.</p>
</div>

         <div class="subscription">
            <div class="map-text">
                <p class="main-text">ПОДПИШИТЕСЬ НА <span>РАССЫЛКУ</span></p>
                <p class="desc-text">подпишитесь и узнайте первыми о наших лучших предложениях</p>
            </div>
            <form action="{{ route('subscribe') }}" method="POST" class="input-btn" style="background: none; height: auto;">
                @csrf
                <input type="email" name="email" placeholder="e-mail" required>
                <button type="submit" class="sub">подписаться</button>
            </form>
        </div>

    </main>

    <script>
    const reviews = [
    {
        text: "Команда “Поехали!” организовала отличное и незабываемое путешествие!",
        author: "София Кузнецова, 12 сентября"
    },
    {
        text: "Это было невероятное приключение, которое я никогда не забуду!",
        author: "Иван Петров, 5 августа"
    },
    {
        text: "Путешествие прошло отлично, все было организовано на высшем уровне!",
        author: "Анна Смирнова, 22 июля"
    }
];

let currentReviewIndex = 0;

const reviewTextElement = document.querySelector('.rev-text');
const reviewAuthorElement = document.querySelector('.rev-author');

function updateReview() {
    reviewTextElement.textContent = reviews[currentReviewIndex].text;
    reviewAuthorElement.textContent = reviews[currentReviewIndex].author;
}

document.querySelector('.right-arrow').addEventListener('click', () => {
    currentReviewIndex = (currentReviewIndex + 1) % reviews.length;
    updateReview();
});

document.querySelector('.left-arrow').addEventListener('click', () => {
    currentReviewIndex = (currentReviewIndex - 1 + reviews.length) % reviews.length;
    updateReview();
});

updateReview();



document.getElementById('get-offers').addEventListener('click', function() {
    const destination = document.getElementById('destination').value;
    const date = document.getElementById('date').value;
    const travelers = document.getElementById('travelers').value;
    const budget = document.getElementById('budget').value;

    if (!destination || !date || !travelers || !budget) {
        alert('Пожалуйста, заполните все поля!');
        return;
    }

    document.getElementById('trip-planner-form').style.display = 'none';
    document.getElementById('phone-modal').style.display = 'block';
});

document.getElementById('submit-phone').addEventListener('click', function() {
    const phone = document.getElementById('phone-input').value;

    fetch('/submit-trip', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            phone: phone,
            destination: document.getElementById('destination').value,
            date: document.getElementById('date').value,
            travelers: document.getElementById('travelers').value,
            budget: document.getElementById('budget').value,
        }),
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('phone-modal').style.display = 'none';
        document.getElementById('thank-you-modal').style.display = 'block';
    })
    .catch(error => {
        console.error('Ошибка:', error);
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const pins = document.querySelectorAll('.pins img');

    pins.forEach(pin => {
        pin.addEventListener('click', function() {
            const continent = this.getAttribute('data-continent');
            const url = `/tours/show?continent=${encodeURIComponent(continent)}`;
            window.location.href = url; 
        });
    });
});


</script>
@endsection