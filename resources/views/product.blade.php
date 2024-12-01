@extends('layouts.app')

@section('content')
    <section id="hero" class="w-full text-white text-center font-Comfortaa text-3xl py-4 bg-[#754133]">
        <p>Страница продукта</p>
    </section>

    <main class="flex flex-col gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <div class="flex max-lg:flex-col gap-6">
            <div class="w-full lg:w-1/2">
                <img src="{{ asset($product->photo) }}" alt="" class="rounded-xl w-full">
            </div>
            <div class="w-full lg:w-1/2 flex flex-col gap-6 p-4 rounded-xl bg-white">
                @if (Auth::user() and Auth::user()->is_admin == 1)
                    <div class="flex items-center gap-4 self-end">
                        <a href="{{ route('EditTovar', ['product_id' => $product->id]) }}" class="w-8 h-8">
                            <img src="{{ asset('Images/products/edit.svg') }}" alt="">
                        </a>
                        <a href="{{ route('deleteTovar', ['product_id' => $product->id]) }}" class="w-8 h-8">
                            <img src="{{ asset('Images/products/delete.svg') }}" alt="">
                        </a>
                    </div>
                @endif
                <p>Артикул {{ $product->id }}</p>
                <p class="text-2xl font-Comfortaa">{{ $product->name }}</p>
                <div class="flex flex-col gap-2">
                    <p>Характеристики</p>
                    <div class="flex flex-col w-full">
                        <div class="flex items-center gap-2 w-full">
                            <p>Артикул</p>
                            <div class="h-px border-b border-black border-dotted grow"></div>
                            <p>{{ $product->id }}</p>
                        </div>
                        <div class="flex items-center gap-2 w-full">
                            <p>Металл</p>
                            <div class="h-px border-b border-black border-dotted grow"></div>
                            <p>{{ $product->metall }}</p>
                        </div>
                        <div class="flex items-center gap-2 w-full">
                            <p>Вставки</p>
                            <div class="h-px border-b border-black border-dotted grow"></div>
                            <p>{{ $product->inserts }}</p>
                        </div>
                        <div class="flex items-center gap-2 w-full">
                            <p>Вес вставок</p>
                            <div class="h-px border-b border-black border-dotted grow"></div>
                            <p>{{ $product->insert_weight }} карат</p>
                        </div>
                        <div class="flex items-center gap-2 w-full">
                            <p>Вес украшения</p>
                            <div class="h-px border-b border-black border-dotted grow"></div>
                            <p>{{ $product->weight }} г</p>
                        </div>
                    </div>
                </div>
                @if ($basket)
                    <a href="{{ route('ToBasket', ['product_id' => $product->id]) }}"
                        class="w-full md:w-[260px] px-4 py-1 rounded-xl bg-[#885041] text-white transition-all duration-500 border border-[#885041] hover:text-[#885041] hover:bg-transparent text-center">Удалить из корзины</a>
                @else
                    <a href="{{ route('ToBasket', ['product_id' => $product->id]) }}"
                        class="w-full md:w-[260px] px-4 py-1 rounded-xl bg-[#885041] text-white transition-all duration-500 border border-[#885041] hover:text-[#885041] hover:bg-transparent text-center">В
                        корзину</a>
                @endif
                @if ($like)
                    <a href="{{ route('ToLike', ['product_id' => $product->id]) }}"
                        class="w-full md:w-[260px] px-4 py-1 rounded-xl border border-black border-dashed text-center">Удалить из избранного</a>
                @else
                    <a href="{{ route('ToLike', ['product_id' => $product->id]) }}"
                        class="w-full md:w-[260px] px-4 py-1 rounded-xl border border-black border-dashed text-center">В
                        избранное</a>
                @endif
            </div>
        </div>
    </main>
@endsection
