
<meta name="csrf-token" content="{{ csrf_token() }}">
<header>
    <div class="logo">
        <a href="/">
            <img src="{{ asset('img/logo-orange.png') }}" alt="Логотип" />
        </a>
    </div>
    
    <nav>
        <ul>
            <li><a href="{{ route('tours.showAll') }}">туры</a></li>
            <li><a href="#" id="contacts-btn">контакты</a></li>
            <li><a href="{{ route('profile.index') }}">личный кабинет</a></li>
        </ul>
    </nav>

    @if(Auth::check())
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
           class="btn-primary">выйти</a>
           
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <a href="{{ route('login') }}" class="btn-primary">войти</a>
    @endif
</header>

<!-- Модальное окно для контактов -->
<div id="contact-modal" style="display:none;">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Контакты</h2>
        <p>Электронная почта: poehali@gmail.com</p>
        <p>Телефон: +7 (123) 456-78-90</p>
    </div>
</div>

<script>
    document.getElementById('contacts-btn').onclick = function() {
        document.getElementById('contact-modal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('contact-modal').style.display = 'none';
    }

    // Закрыть модальное окно при нажатии за его пределами
    window.onclick = function(event) {
        if (event.target === document.getElementById('contact-modal')) {
            closeModal();
        }
    }
</script>

<style>
    /* Стиль для модального окна */
    #contact-modal {
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
    }

    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
