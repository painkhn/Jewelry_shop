@extends('layouts.app')

@section('content')
    <section id="hero" class="w-full text-white text-center font-Comfortaa text-3xl py-4 bg-[#754133]">
        <p>Доставка и оплата</p>
    </section>

    <main class="flex flex-col gap-14 container mx-auto max-w-[1280px] px-4 py-10">
        <div class="grid grid-cols-2 p-4 gap-6 text-white bg-[#754133] rounded-xl">
            <div class="col-span-full md:col-span-1 flex flex-col gap-4 border border-white border-dashed p-4">
                <p class="text-center font-Comfortaa text-2xl">Доставка</p>
                <p>Мы осуществляем доставку ювелирных изделий по всей России и за ее пределы. </p>
                <p>По России: 3-5 рабочих дней, стоимость доставки - от 300 рублей.</p>
                <p>Международная доставка: 7-14 рабочих дней, стоимость - от 500 рублей.</p>
            </div>
            <div class="col-span-full md:col-span-1 flex flex-col gap-4 border border-white border-dashed p-4">
                <p class="text-center font-Comfortaa text-2xl">Оплата</p>
                <p>Онлайн-платежи: принимаются карты Visa, Mastercard, PayPal.</p>
                <p>Банковский перевод: доступен при предварительном согласовании.</p>
                <p>Оплата при получении: возможна наличными или картой.</p>
            </div>
            <div class="col-span-full flex flex-col gap-4 border border-white border-dashed p-4">
                <p>Мы гарантируем возможность возврата товара в течение 14 дней и обмена в течение 30 дней с момента
                    покупки.
                    Для возврата или обмена товара необходимо сохранить ориги</p>
                <p>Если у вас возникли вопросы по доставке, оплате или другим вопросам, не стесняйтесь обращаться к нам:</p>
                <p>
                    Телефон: <a
                        class="flex flex-col after:w-0 after:h-px after:bg-white after:transition-all after:duration-300 hover:after:w-full w-fit"
                        href="tel:+7 (XXX) XXX-XX-XX">+7 (XXX) XXX-XX-XX</a>
                    Email: <a
                        class="flex flex-col after:w-0 after:h-px after:bg-white after:transition-all after:duration-300 hover:after:w-full w-fit"
                        href="mailto:info@jewelryshop.ru">info@jewelryshop.ru</a>
                    Адрес: г. Москва, ул. Примерная, д. 123
                </p>
            </div>
        </div>
    </main>
@endsection
