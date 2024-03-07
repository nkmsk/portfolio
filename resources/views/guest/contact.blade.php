<x-top-layout>

  <div class="flex items-center justify-center w-screen h-screen text-center">
    <div>
      <h2 class="font-serif text-3xl text-gray-700 tracking-widest">CONTACT</h2>
      <p class="mt-12">こちらのメールアドレスまでお願い致します。</p>
      <p class="mt-2 font-bold">nk.msk7@gmail.com</p>
    </div>
    
    <div class="absolute bottom-5">
      <div class="flex justify-center">
        <ul class="menu menu-horizontal">
          <li><a href="{{ url('/') }}">HOME</a></li>
          <li><a href="{{ url('/about') }}">ABOUT</a></li>
          <li><a href="{{ url('/product') }}">WORKS</a></li>
        </ul>
      </div>
    </div>
</div>
</x-top-layout>