@extends('layouts.app')

@section('content')
    <main class="flex flex-col gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex items-center max-lg:flex-col gap-6 p-4 border border-black border-dashed rounded-xl">
                <img src="{{ asset('Images/auth/main.png') }}" alt=""
                    class="rounded-xl w-full max-lg:aspect-video object-cover lg:w-1/2">
                <div class="flex flex-col gap-4 items-center w-full lg:w-1/2 text-center">
                    <div class="flex flex-col">
                        <p class="text-3xl font-Comfortaa">Beyond</p>
                        <p>создать аккаунт</p>
                    </div>
                    <div class="flex items-center max-md:flex-col gap-4 w-full">
                        <input type="text" name="surname"
                            class="w-full md:w-1/3 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Фамилия">
                        <input type="text" name="name"
                            class="w-full md:w-1/3 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Имя">
                        <input type="text" name="fathername"
                            class="w-full md:w-1/3 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Отчество">
                    </div>
                    <div class="flex items-center max-md:flex-col gap-4 w-full">
                        <input type="email" name="email"
                            class="w-full md:w-1/2 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Email">
                        <input type="password" name="password"
                            class="w-full md:w-1/2 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="••••••">
                    </div>
                    <div class="flex items-center max-md:flex-col gap-4 w-full">
                        <input type="text" name="phone"
                            class="w-full md:w-1/2 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Телефон">
                        <input type="text" name="city"
                            class="w-full md:w-1/2 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Город">
                    </div>
                    <div class="flex items-center max-md:flex-col gap-4 w-full">
                        <div class="flex flex-col items-center gap-2 w-full md:w-1/2">
                            <p class="font-PoiretOne text-2xl">Пол</p>
                            <div class="flex items-center gap-2">
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="gender" value="male">
                                    <span>Мужской</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="gender" value="female">
                                    <span>Женский</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 w-full md:w-1/2">
                            <p class="font-PoiretOne text-2xl">Дата рождения</p>
                            <input type="date" name="birthday"
                                class="w-full rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2">
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full md:w-[260px] px-4 py-2 rounded-xl border border-black border-dashed text-center">Зарегистрироваться</button>

                    <div class="flex items-center justify-center gap-4 w-full md:w-2/3 lg:w-1/2">
                        <div class="w-1/3 h-px bg-[#885041]/50"></div>
                        <p class="font-Comfortaa">или</p>
                        <div class="w-1/3 h-px bg-[#885041]/50"></div>
                    </div>
                    <a href="{{ route('login') }}"
                        class="w-full md:w-[260px] px-4 py-2 rounded-xl border border-black border-dashed text-center">Войти</a>
                </div>
            </div>
        </form>
    </main>
@endsection
