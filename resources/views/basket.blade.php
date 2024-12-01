@extends('layouts.app')

@section('content')
    <section id="hero" class="w-full text-white text-center font-Comfortaa text-3xl py-4 bg-[#754133]">
        <p>Корзина</p>
    </section>

    <main class="flex flex-col gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <div class="flex flex-col gap-6 w-full">
            @foreach ($baskets as $basket)
                @foreach ($basket->positions as $position)
                    <div class="flex max-lg:flex-col gap-6 w-full md:w-1/2 rounded-xl bg-white p-4">
                        <a href="{{ route('product', ['product_id' => $position->id]) }}"
                            class="hover:animate-pulse w-full lg:w-1/2">
                            <img src="{{ asset($position->photo) }}" alt=""
                                class="w-full border border-black border-dashed rounded-xl">
                        </a>
                        <div class="flex flex-col gap-4 w-full lg:w-1/2">
                            <p class="font-Comfortaa">{{ $position->name }}</p>
                            <p class="text-lg">от {{ $position->price }} рублей </p>
                            {{-- <div class="flex items-center gap-2">
                                <button
                                    class="flex items-center justify-center w-8 h-8 border border-black/10 rounded-xl">-</button>
                                <p>1</p>
                                <button
                                    class="flex items-center justify-center w-8 h-8 border border-black/10 rounded-xl">+</button>
                            </div> --}}
                            <a href="{{ route('ToBasket', ['product_id' => $position->id]) }}"
                                class="w-full md:w-[260px] px-4 py-1 rounded-xl border border-black border-dashed text-center">Удалить</a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
        <div class="flex flex-col gap-6 bg-white p-4 rounded-xl">
            <div class="flex flex-col gap-2">
                <p class="font-Comfortaa">Адрес доставки</p>
                <input type="text" class="px-4 py-1 border border-[#885041]/50 rounded-xl" placeholder="Адрес">
            </div>
            <div class="flex flex-col gap-2">
                <p class="font-Comfortaa">Комментарий к доставке</p>
                <textarea class="px-4 py-1 border border-[#885041]/50 rounded-xl" placeholder="Комментарий"></textarea>
            </div>
            <div class="flex flex-col gap-2">
                <p class="font-Comfortaa">Способ оплаты</p>
                <div class="flex items-center gap-2">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="payment">
                        <span>Картой</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="payment">
                        <span>Наличными</span>
                    </label>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <p>Итого:</p>
                <p class="font-PoiretOne">{{ $summ }} ₽</p>
            </div>
            <button
                class="w-full md:w-[260px] px-4 py-1 rounded-xl bg-[#885041] 
                text-white transition-all duration-500 border border-[#885041] 
                hover:text-[#885041] hover:bg-transparent text-center">Оформить заказ
            </button>
        </div>
    </main>
@endsection
