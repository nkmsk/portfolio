<x-guest-layout>
    <div class="flex flex-col w-full border-opacity-50">
        @auth
            <a href="{{ url('/dashboard') }}" class="flex items-center justify-center w-full h-20 bg-gray-700 hover:bg-gray-800 dark:text-gray-400 dark:hover:text-white text-white font-semibold text-center rounded-md focus:outline-none focus:ring transition duration-300 ease-in-out">管理画面</a>
        @else
            <a href="{{ route('login') }}" class="flex items-center justify-center w-full h-20 bg-gray-700 hover:bg-gray-800 dark:text-gray-400 dark:hover:text-white text-white font-semibold text-center rounded-md focus:outline-none focus:ring transition duration-300 ease-in-out">ログイン</a>
            
            <div class="divider">OR</div>

            <a href="{{ route('register') }}" class="flex items-center justify-center w-full h-20 bg-gray-700 hover:bg-gray-800 dark:text-gray-400 dark:hover:text-white text-white font-semibold text-center rounded-md focus:outline-none focus:ring transition duration-300 ease-in-out">新規登録</a>
        @endauth
    </div>
</x-guest-layout>
