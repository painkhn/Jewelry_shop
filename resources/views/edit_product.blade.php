@extends('layouts.app')

@section('content')
    <section id="hero" class="w-full text-white text-center font-Comfortaa text-3xl py-4 bg-[#754133]">
        <p>Страница редактирования</p>
    </section>

    <main class="flex flex-col items-center justify-center grow gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <div class="flex flex-col items-center gap-4 w-full md:w-1/2 xl:w-1/3">
            <form action="{{ route('EditTovar', ['product_id' => $position->id]) }}" method="POST"
                class="flex flex-col items-center gap-4 w-full">
                @csrf
                <input type="text" placeholder="Наименование товара" value="{{ $position->name }}" name="name"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <input type="text" placeholder="Цена" value="{{ $position->price }}" name="price"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <input type="text" placeholder="Металл" value="{{ $position->metall }}" name="metall"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <input type="text" placeholder="Вставки" value="{{ $position->inserts }}" name="inserts"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <input type="text" placeholder="Вес вставки" value="{{ $position->insert_weight }}" name="insert_weight"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <input type="text" placeholder="Вес украшений" value="{{ $position->weight }}" name="weight"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <button type="submit"
                    class="w-full md:w-[260px] px-4 py-1.5 rounded-xl border border-black border-dashed text-center">Обновить</button>
            </form>
        </div>
    </main>
@endsection
