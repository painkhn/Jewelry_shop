@extends('layouts.app')

@section('content')
    <section id="hero" class="w-full text-white text-center font-Comfortaa text-3xl py-4 bg-[#754133]">
        <p>Личный кабинет</p>
    </section>
    <main class="flex flex-col gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <div class="flex max-lg:flex-col gap-6" id="tabs">
            <ul class="w-full h-min lg:w-1/3 bg-white rounded-xl p-4 flex flex-col gap-4">
                {{-- <div class="flex items-center justify-center rounded-xl bg-[#754133]/50 h-[260px]">
                    <p>Фото профиля</p>
                </div> --}}
                <li class="w-fit">
                    <a href="{{ route('profile') }}" class="flex items-center gap-2">
                        <div class="flex items-center justify-center w-10 h-10 p-2 bg-black/10 rounded-full">
                            <img src="{{ asset('Images/header/profile.png') }}" alt="">
                        </div>
                        <span>Мои данные</span>
                    </a>
                </li>
                @if (Auth::user()->is_admin == 1)
                    <li class="w-fit">
                        <a href="{{ route('Admin') }}" class="flex items-center gap-2">
                            <div class="flex items-center justify-center w-10 h-10 p-2 bg-black/10 rounded-full">
                                <img src="{{ asset('Images/header/profile.png') }}" alt="">
                            </div>
                            <span>Админ панель</span>
                        </a>
                    </li>
                @endif
                <li class="w-fit">
                    <a href="{{ route('logout') }}" class="flex items-center gap-2"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <div class="flex items-center justify-center w-10 h-10 p-2 bg-black/10 rounded-full">
                            <img src="{{ asset('Images/header/logout.png') }}" alt="">
                        </div>
                        <span>Выйти</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
            <div id="tab-1" class="w-full lg:w-2/3 bg-white rounded-xl p-4 flex flex-col gap-4">
                <form action="{{ route('editProfile') }}" method="POST" class="w-full flex flex-col gap-4">
                    @csrf
                    <div class="flex items-center max-md:flex-col gap-4 w-full">
                        <input type="text" value="{{ Auth::user()->surname }}" name="surname"
                            class="w-full md:w-1/3 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Фамилия">
                        <input type="text" value="{{ Auth::user()->name }}" name="name"
                            class="w-full md:w-1/3 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Имя">
                        <input type="text" value="{{ Auth::user()->fathername }}" name="fathername"
                            class="w-full md:w-1/3 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Отчество">
                    </div>
                    <div class="flex items-center max-md:flex-col gap-4 w-full">
                        <input type="email" value="{{ Auth::user()->email }}" name="email"
                            class="w-full md:w-1/2 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Email">
                        <input type="password" name="password"
                            class="w-full md:w-1/2 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="••••••">
                    </div>
                    <div class="flex items-center max-md:flex-col gap-4 w-full">
                        <input type="text" value="{{ Auth::user()->number }}" name="number"
                            class="w-full md:w-1/2 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Телефон">
                        <input type="text" value="{{ Auth::user()->city }}" name="city"
                            class="w-full md:w-1/2 rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2"
                            placeholder="Город">
                    </div>
                    {{-- <input type="file" name="photo"
                        class="rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2 w-full"> --}}
                    <div class="flex items-center max-md:flex-col gap-4 w-full">
                        <div class="flex flex-col items-center gap-2 w-full md:w-1/2">
                            <p class="font-PoiretOne text-2xl">Пол</p>
                            <div class="flex items-center gap-2">
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="gender" value="male"
                                        {{ Auth::user()->gender == 'male' ? 'checked' : '' }}>
                                    <span>Мужской</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="gender" value="female"
                                        {{ Auth::user()->gender == 'female' ? 'checked' : '' }}>
                                    <span>Женский</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 w-full md:w-1/2">
                            <p class="font-PoiretOne text-2xl">Дата рождения</p>
                            <input type="date" value="{{ Auth::user()->birthday }}" name="birthday"
                                class="w-full rounded-xl border border-[#885041]/50 focus:outline-none px-4 py-2">
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full md:w-[260px] px-4 py-2 rounded-xl border border-black border-dashed text-center mx-auto">Обновить</button>
                </form>
            </div>
            <div id="tab-2" class="w-full lg:w-2/3 bg-white rounded-xl p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($likes as $item)
                    @foreach ($item->positions as $position)
                        <div class="rounded-xl flex flex-col items-center text-center gap-4 bg-white p-4">
                            <a href="{{ route('product', ['product_id' => $position->id]) }}" class="hover:animate-pulse">
                                <img src="{{ asset($position->photo) }}" alt=""
                                    class="w-full border border-black border-dashed rounded-xl">
                            </a>
                            <p class="font-Comfortaa">{{ $position->name }}</p>
                            <p class="text-lg">от {{ $position->price }} рублей </p>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </main>
@endsection
