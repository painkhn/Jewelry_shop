<header class="flex w-full bg-white py-4 relative">
    <div class="container mx-auto max-w-[1280px] px-4 flex items-center justify-between">
        <a href="{{ route('index') }}" class="text-2xl md:text-2xl font-Comfortaa">BEYOND</a>
        <nav id="menu"
            class="flex items-center gap-4 z-[4] transition-all duration-500 max-lg:border-t max-lg:border-[#885041] max-lg:flex-col max-lg:absolute max-lg:top-0 max-lg:-translate-y-full max-lg:left-0 max-lg:bg-white max-lg:py-6 max-lg:w-full">
            <a href="{{ route('catalog') }}"
                class="flex flex-col after:w-0 after:h-px after:bg-[#111111] after:transition-all after:duration-300 hover:after:w-full">Каталог</a>
            <div class="w-0.5 h-0.5 rounded-full bg-[#111111]"></div>
            <a href="{{ route('about') }}"
                class="flex flex-col after:w-0 after:h-px after:bg-[#111111] after:transition-all after:duration-300 hover:after:w-full">О
                нас </a>
            <div class="w-0.5 h-0.5 rounded-full bg-[#111111]"></div>
            <a href="{{ route('delivery') }}"
                class="flex flex-col after:w-0 after:h-px after:bg-[#111111] after:transition-all after:duration-300 hover:after:w-full">Доставка
                и оплата</a>
            @guest
                <div class="w-0.5 h-0.5 rounded-full bg-[#111111]"></div>
                <a href="{{ route('login') }}"
                    class="flex flex-col after:w-0 after:h-px after:bg-[#111111] after:transition-all after:duration-300 hover:after:w-full">Вход</a>
            @endguest
        </nav>
        <div class="flex items-center gap-2">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <input type="text" name="word" class="px-2 py-1 rounded-xl border ">
                <button class="max-md:hidden" type="submit">
                    {{-- <img src="{{ asset('Images/header/search.png') }}" alt="" class="w-7 h-7"> --}}
                </button>
            </form>
            <a href="{{ route('profile') }}">
                <img src="{{ asset('Images/header/profile.png') }}" alt="" class="w-7 h-7">
            </a>
            <a href="{{ route('OpenLike') }}">
                <img src="{{ asset('Images/header/favourites.png') }}" alt="" class="w-7 h-7">
            </a>
            <a href="{{ route('OpenBasket') }}">
                <img src="{{ asset('Images/header/cart.png') }}" alt="" class="w-7 h-7">
            </a>
            <button id="toggler" class="lg:hidden">
                <img src="{{ asset('Images/header/menu.png') }}" alt="" class="w-7 h-7">
            </button>
        </div>
    </div>
    <div id="overlay" class="inset-0 bg-black/70 fixed z-[3] top-16 hidden lg:hidden"></div>
</header>
