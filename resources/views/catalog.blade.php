@extends('layouts.app')

@section('content')
    <section id="hero" class="w-full text-white text-center font-Comfortaa text-3xl py-4 bg-[#754133]">
        <p>Каталог</p>
    </section>

    <main class="flex flex-col gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <div class="flex max-lg:flex-col gap-6">
            <div
                class="flex flex-col gap-6 p-4 rounded-xl bg-white shadow-[0px_0px_13px_-3px_#885041] w-full lg:w-1/3 h-fit">
                <form action="{{ route('catalog.filter') }}" method="post" class="flex flex-col gap-6 p-4">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <p>Тип украшения</p>
                        <select class="w-full rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-1"
                            name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p>Металл</p>
                        <select class="w-full rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-1"
                            name="type">
                            <option value="Розовое золото">Розовое золото</option>
                            <option value="Серебро">Серебро</option>
                            <option value="Золото">Золото</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-1 rounded-xl bg-[#885041] text-white transition-all duration-500 border border-[#885041] hover:text-[#885041] hover:bg-transparent text-center">Применить
                    </button>
                </form>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full lg:w-2/3 h-fit">
                @foreach ($positions as $item)
                    <div class="rounded-xl flex flex-col items-center text-center gap-4 bg-white p-4">
                        <a href="{{ route('product', ['product_id' => $item->id]) }}" class="hover:animate-pulse">
                            <img src="{{ asset($item->photo) }}" alt=""
                                class="w-full border border-black border-dashed rounded-xl">
                        </a>
                        <p class="font-Comfortaa">{{ $item->name }}</p>
                        <p class="text-lg">от {{ $item->price }} рублей </p>
                        @if (in_array($item->id, $basket))
                            <a href="{{ route('ToBasket', ['product_id' => $item->id]) }}"
                                class="w-full px-4 py-1 rounded-xl border border-black border-dashed text-center">Удалить из
                                корзины</a>
                        @else
                            <a href="{{ route('ToBasket', ['product_id' => $item->id]) }}"
                                class="w-full px-4 py-1 rounded-xl border border-black border-dashed text-center">В
                                корзину</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
