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
                </form>
        </div>
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
        <div>
            <div class="max-w-sm w-full bg-white rounded-lg shadow p-4 md:p-6">
                <div class="flex justify-between">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2">Статистика регистраций пользователей</h5>
                    </div>
                </div>
                <div id="area-chart"></div>
                <div class="grid grid-cols-1 items-center border-gray-200 border-t justify-between py-10">
                    <div class="flex justify-between items-center pt-5">
                    <!-- Button -->
                        Последние 7 дней
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Today</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Last 7 days</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Last 30 days</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Last 90 days</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.35.3"></script>
    <script>
        const options = {
            chart: {
            height: "100%",
            maxWidth: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
            },
            tooltip: {
            enabled: true,
            x: {
                show: false,
            },
            },
            fill: {
            type: "gradient",
            gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#1C64F2",
                gradientToColors: ["#1C64F2"],
            },
            },
            dataLabels: {
            enabled: false,
            },
            stroke: {
            width: 6,
            },
            grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: 0
            },
            },
            series: [
                {
                    name: "New users",
                    data: @json($counts), // Используем данные о пользователях
                    color: "#1A56DB",
                },
            ],
            xaxis: {
                categories: @json($dates),
                labels: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            },
            yaxis: {
            show: false,
            },
        }
        
        if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("area-chart"), options);
            chart.render();
        }
    </script>
@endsection
