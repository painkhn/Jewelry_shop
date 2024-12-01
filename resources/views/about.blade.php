@extends('layouts.app')

@section('content')
    <section id="hero" class="w-full text-white text-center font-Comfortaa text-3xl py-4 bg-[#754133]">
        <p>О нас</p>
    </section>
    <main class="flex flex-col gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <div class="flex max-lg:items-center max-lg:flex-col gap-6 text-white bg-[#754133] rounded-xl p-4">
            <img src="{{ asset('Images/about/main.png') }}" alt=""
                class="w-full lg:w-1/3 rounded-xl max-lg:aspect-video object-cover">
            <div
                class="flex flex-col gap-4 justify-center items-center text-center py-10 px-4 w-full lg:w-2/3 border border-white border-dashed">
                <p class="font-Comfortaa text-2xl">О нашем ювелирном магазине</p>
                <p>Мы - команда страстных ценителей ювелирного искусства, которые более 15 лет создают и продают
                    эксклюзивные
                    украшения ручной работы. Каждое наше изделие - это произведение, в которое мы вкладываем частичку своей
                    души.</p>
                <p>Добро пожаловать в мир эксклюзивной ювелирной красоты от нашей компании!</p>
                <a href="{{ route('catalog') }}"
                    class="animate-pulse px-4 py-2 rounded-xl w-[160px] text-center text-[#111111] border border-white bg-white transition-all duration-500 hover:bg-transparent hover:text-white">Каталог</a>
            </div>
        </div>
    </main>
@endsection
