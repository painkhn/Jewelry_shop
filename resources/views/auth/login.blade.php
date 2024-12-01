@extends('layouts.app')

@section('content')
    <main class="flex flex-col gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex items-center max-lg:flex-col gap-6 p-4 border border-black border-dashed rounded-xl">
                <img src="{{ asset('Images/auth/main.png') }}" alt=""
                    class="rounded-xl w-full max-lg:aspect-video object-cover lg:w-1/2">
                <div class="flex flex-col gap-4 items-center w-full lg:w-1/2 text-center">
                    <div class="flex flex-col">
                        <p class="text-3xl font-Comfortaa">Beyond</p>
                        <p>войти</p>
                    </div>
                    <form class="flex flex-col gap-4 items-center w-full">
                        <div class="flex items-center max-md:flex-col gap-4 w-full">
                            <input type="email" name="email"
                                class="w-full md:w-1/2 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                                placeholder="Email">
                            <input type="password" name="password"
                                class="w-full md:w-1/2 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                                placeholder="••••••">
                        </div>
                        <button
                            class="w-full md:w-[260px] px-4 py-2 rounded-xl border border-black border-dashed text-center">Войти</button>
                    </form>
                    <div class="flex items-center justify-center gap-4 w-full md:w-2/3 lg:w-1/2">
                        <div class="w-1/3 h-px bg-[#885041]/50"></div>
                        <p class="font-Comfortaa">или</p>
                        <div class="w-1/3 h-px bg-[#885041]/50"></div>
                    </div>
                    <a href="{{ route('register') }}"
                        class="w-full md:w-[260px] px-4 py-2 rounded-xl border border-black border-dashed text-center">Зарегистрироваться</a>
                </div>
            </div>
        </form>
    </main>
@endsection
