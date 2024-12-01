@extends('layouts.app')

@section('content')
    <section id="hero" class="w-full text-white text-center font-Comfortaa text-3xl py-4 bg-[#754133]">
        <p>Избранное</p>
    </section>

    <main class="flex flex-col gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach ($likes as $item)
                @foreach ($item->positions as $position)
                    <div class="rounded-xl flex flex-col items-center text-center gap-4 bg-white p-4">
                        <a href="{{ route('product', ['product_id' => $position->id]) }}">
                            <img src="{{ asset($position->photo) }}" alt=""
                                class="w-full border border-black border-dashed rounded-xl">
                        </a>
                        <p class="font-Comfortaa">{{ $position->name }}</p>
                        <p class="text-lg">от {{ $position->price }} рублей </p>
                    </div>
                @endforeach
            @endforeach
        </div>
    </main>
@endsection
