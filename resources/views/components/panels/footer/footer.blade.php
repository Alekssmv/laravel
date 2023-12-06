<footer class="container mx-auto">
    <section class="block sm:flex bg-white p-4">
        <div class="flex-1">
            <div>
                <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
                <span class="inline-block pl-1"> / <a href="{{ route('salons') }}"
                        class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
            </div>

            <x-salons />

        </div>
        <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
            <p class="text-3xl text-black font-bold mb-4">Информация</p>

            <x-information-menu template="footer"/>

        </div>
    </section>


    <div class="space-y-4 sm:space-y-0 sm:flex sm:justify-between items-center py-6 px-2 sm:px-0">
        <div class="copy pr-8">© 2023 Рога &amp; Сила. Продажа автомобилей.</div>
        <div class="text-right">
            <a href="https://www.qsoft.ru" target="_blank" class="inline-block">Сделано в <img
                    class="ml-2 inline-block" src="/assets/images/qsoft.png" width="59" height="11" alt="" /></a>
        </div>
    </div>
</footer>
