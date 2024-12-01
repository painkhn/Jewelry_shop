@extends('layouts.app')

@section('content')
    <section id="hero"
        class="flex flex-col bg-[url('../../public/Images/hero/main.png')] w-full h-[calc(100vh-64px)] bg-cover justify-center text-white relative">
        <div class="container mx-auto max-w-[1280px] px-4 flex flex-col gap-6">
            <p class="text-2xl font-Comfortaa">BEYOND</p>
            <p>
                Изысканный стиль, неповторимая красота <br>
                Выбери своё неповторимое украшение
            </p>
            <a href="{{ route('catalog') }}"
                class="animate-pulse px-4 py-2 rounded-xl w-[160px] text-center text-[#111111] border border-white bg-white transition-all duration-500 hover:bg-transparent hover:text-white">Каталог</a>
        </div>
        <a href="#advantages" class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <img src="{{ asset('Images/hero/down.png') }}" alt="">
        </a>
    </section>

    <main class="flex flex-col gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <div class="flex flex-col gap-6" id="advantages">
            <p class="text-2xl font-Comfortaa">Наши преимущества</p>
            <ul class="list-inside list-disc marker:text-[#885041]">
                <li>Эксклюзивные и уникальные дизайны</li>
                <li>Высокое качество и крафтманство</li>
                <li>Индивидуальный подход и консультации:</li>
                <li>Гарантия качества и поддержка:</li>
                <li>Экологическая и социальная ответственность:</li>
                <li>Опыт и репутация:</li>
                <li>Удобство и комфорт:</li>
            </ul>
        </div>
        <div class="flex flex-col gap-6">
            <p class="text-2xl font-Comfortaa">Галерея</p>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <img src="{{ asset('Images/gallery/1.jpg') }}" alt=""
                    class="rounded-xl w-full aspect-video object-cover border border-[#885041]/50 shadow-[0px_0px_13px_-3px_#885041] transition-all duration-500 hover:shadow-none">
                <img src="{{ asset('Images/gallery/2.jpg') }}" alt=""
                    class="rounded-xl w-full aspect-video object-cover border border-[#885041]/50 shadow-[0px_0px_13px_-3px_#885041] transition-all duration-500 hover:shadow-none">
                <img src="{{ asset('Images/gallery/3.jpg') }}" alt=""
                    class="rounded-xl w-full aspect-video object-cover border border-[#885041]/50 shadow-[0px_0px_13px_-3px_#885041] transition-all duration-500 hover:shadow-none"></video>
                <img src="{{ asset('Images/gallery/4.jpg') }}" alt=""
                    class="rounded-xl w-full aspect-video object-cover border border-[#885041]/50 shadow-[0px_0px_13px_-3px_#885041] transition-all duration-500 hover:shadow-none">
                <img src="{{ asset('Images/gallery/5.jpg') }}" alt=""
                    class="rounded-xl w-full aspect-video object-cover border border-[#885041]/50 shadow-[0px_0px_13px_-3px_#885041] transition-all duration-500 hover:shadow-none">
                <img src="{{ asset('Images/gallery/6.jpg') }}" alt=""
                    class="rounded-xl w-full aspect-video object-cover border border-[#885041]/50 shadow-[0px_0px_13px_-3px_#885041] transition-all duration-500 hover:shadow-none">
                <img src="{{ asset('Images/gallery/7.jpg') }}" alt=""
                    class="rounded-xl w-full aspect-video object-cover border border-[#885041]/50 shadow-[0px_0px_13px_-3px_#885041] transition-all duration-500 hover:shadow-none"></video>
                <img src="{{ asset('Images/gallery/8.jpg') }}" alt=""
                    class="rounded-xl w-full aspect-video object-cover border border-[#885041]/50 shadow-[0px_0px_13px_-3px_#885041] transition-all duration-500 hover:shadow-none">
                <img src="{{ asset('Images/gallery/9.jpg') }}" alt=""
                    class="rounded-xl w-full aspect-video object-cover border border-[#885041]/50 shadow-[0px_0px_13px_-3px_#885041] transition-all duration-500 hover:shadow-none">
            </div>
        </div>
        <div class="flex flex-col gap-6">
            <p class="text-2xl font-Comfortaa">FAQ</p>
            <div class="flex flex-col w-full gap-4 FAQ">
                <button
                    class="flex text-left items-center gap-4 justify-between w-full rounded-xl question p-4 text-white bg-[#754133]">
                    <span>Есть ли у вас доставка?</span>
                    <img src="{{ asset('Images/FAQ/arrow.svg') }}" alt="">
                </button>
                <p class="tracking-wider p-4 hidden answer">
                    Да, доставка осуществляется до удобного Вам адреса и в максимально короткие сроки, бесплатно.
                </p>
            </div>
            <div class="flex flex-col w-full gap-4 FAQ">
                <button
                    class="flex text-left items-center gap-4 justify-between w-full rounded-xl question p-4 text-white bg-[#754133]">
                    <span>Можно ли оплатить заказ баллами СПАСИБО от Сбербанка?</span>
                    <img src="{{ asset('Images/FAQ/arrow.svg') }}" alt="">
                </button>
                <p class="tracking-wider p-4 hidden answer">
                    В оплату украшений, произведенных на заказ, принимаются только денежные средства. Баллы, купоны,
                    программа
                    «СПАСИБО от Сбербанка» в оплате не задействуются.
                </p>
            </div>
            <div class="flex flex-col w-full gap-4 FAQ">
                <button
                    class="flex text-left items-center gap-4 justify-between w-full rounded-xl question p-4 text-white bg-[#754133]">
                    <span>С какими драгоценными металлами вы работаете?</span>
                    <img src="{{ asset('Images/FAQ/arrow.svg') }}" alt="">
                </button>
                <p class="tracking-wider p-4 hidden answer">
                    Мы работаем с золотом 585 пробы и 750 пробы, платиной 950 пробы и серебром 925 пробы.
                </p>
            </div>
            <div class="flex flex-col w-full gap-4 FAQ">
                <button
                    class="flex text-left items-center gap-4 justify-between w-full rounded-xl question p-4 text-white bg-[#754133]">
                    <span>С какими камнями вы работаете?</span>
                    <img src="{{ asset('Images/FAQ/arrow.svg') }}" alt="">
                </button>
                <p class="tracking-wider p-4 hidden answer">
                    Мы покупаем драгоценные и полудрагоценные камни любых размеров и параметров по всему миру, в том числе и
                    на
                    российском рынке. Для одного и того же изделия можно использовать камни разных характеристик.
                </p>
            </div>
            <div class="flex flex-col w-full gap-4 FAQ">
                <button
                    class="flex text-left items-center gap-4 justify-between w-full rounded-xl question p-4 text-white bg-[#754133]">
                    <span>Могу ли я принести своё золото или камни?</span>
                    <img src="{{ asset('Images/FAQ/arrow.svg') }}" alt="">
                </button>
                <p class="tracking-wider p-4 hidden answer">
                    Для производства украшений используется только банковский драгоценный металл, поэтому золото Клиента в
                    производстве не используется. Мы принимаем драгоценные камни Клиента в работу.
                </p>
            </div>
        </div>
        <div class="flex flex-col gap-6">
            <p class="text-2xl font-Comfortaa">Наши клиенты</p>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                <img src="{{ asset('Images/clients/1.webp') }}" alt="">
                <img src="{{ asset('Images/clients/2.webp') }}" alt="">
                <img src="{{ asset('Images/clients/3.webp') }}" alt="">
                <img src="{{ asset('Images/clients/4.webp') }}" alt="">
            </div>
        </div>
    </main>
@endsection
