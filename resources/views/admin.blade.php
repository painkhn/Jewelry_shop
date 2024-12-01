@extends('layouts.app')

@section('content')
    <section id="hero" class="w-full text-white text-center font-Comfortaa text-3xl py-4 bg-[#754133]">
        <p>Админ панель</p>
    </section>
    <main class="flex flex-col items-center justify-center grow gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <div class="flex flex-col items-center gap-4 w-full md:w-1/2 xl:w-1/3">
            <p class="text-2xl font-Comfortaa">Добавление товара</p>
            <form action="{{ route('NewPosition') }}" method="POST" class="flex flex-col items-center gap-4 w-full"
                enctype="multipart/form-data">
                @csrf
                <input type="text" placeholder="Наименование товара" name="name"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <select class="w-full rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-1" name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="text" placeholder="Цена" name="price"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <input type="file" name="photo"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <input type="text" placeholder="Металл" name="metall"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <input type="text" placeholder="Вставки" name="inserts"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <input type="text" placeholder="Вес вставки" name="insert_weight"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <input type="text" placeholder="Вес украшений" name="weight"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <button type="submit"
                    class="w-full md:w-[260px] px-4 py-1.5 rounded-xl border border-black border-dashed text-center">Добавить</button>
        </div>
        </form>
        <div class="flex flex-col items-center gap-4 w-full md:w-1/2 xl:w-1/3">
            <form action="{{ route('AddCategory') }}" method="POST" class="flex flex-col items-center gap-4 w-full">
                @csrf
                <p class="text-2xl font-Comfortaa">Добавление категории</p>
                <input type="text" placeholder="Наименование категории" name="name"
                    class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full">
                <button type="submit"
                    class="w-full md:w-[260px] px-4 py-1.5 rounded-xl border border-black border-dashed text-center">Добавить</button>
            </form>
        </div>
    </main>
@endsection
