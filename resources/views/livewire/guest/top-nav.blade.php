<div>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('welcome') }}" wire:navigate>
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>
                    <div class="flex space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" wire:navigate>
                            {{ __('Beranda') }}
                        </x-nav-link>
                        <x-nav-link :href="route('guest.pembelajaran')"
                            :active="request()->routeIs('guest.pembelajaran')" wire:navigate>
                            {{ __('Pembelajaran') }}
                        </x-nav-link>
                        <x-nav-link :href="route('guest.pembagian-tugas')"
                            :active="request()->routeIs('guest.pembagian-tugas')" wire:navigate>
                            {{ __('Pembagian Tugas') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>