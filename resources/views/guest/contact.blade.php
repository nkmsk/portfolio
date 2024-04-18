<x-top-layout>

  <div class="flex items-center justify-center w-screen h-screen text-center">
    <div>
      <h1 class="font-serif text-3xl text-gray-700 tracking-widest">CONTACT</h1>
      <p class="mt-12">こちらのメールアドレスまでお願い致します。</p>
      <p class="mt-2 font-bold">{{ $user->email }}</p>
    </div>
    
    <div class="absolute bottom-5">
      <div class="flex justify-center">
        <ul class="menu menu-horizontal">
          <li><a href="{{ url('/home') }}">HOME</a></li>
          <li><a href="{{ url('/about') }}">ABOUT</a></li>
          <li><a href="{{ route('guest.works.index') }}">WORKS</a></li>
        </ul>
      </div>
    </div>
</div>
</x-top-layout>