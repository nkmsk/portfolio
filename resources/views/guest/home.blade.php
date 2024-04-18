<x-top-layout>

  <style>
    .fade-in {
      opacity: 0;
      animation: fadeIn 2s ease-in-out forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
  </style>

  <div class="container flex items-center justify-center w-screen h-screen mx-auto">

    <h1 id="opening-animation" class="fade-in font-serif text-3xl lg:text-5xl text-gray-700 tracking-widest">NAOKI MASAOKA</h1>

    <div class="absolute bottom-5">

      <div class="flex justify-center">
        <ul class="menu menu-horizontal">
          
          <li><a href="{{ url($user->social->x ?? "") }}"><img class="w-6 h-6" src="{{ asset('image/top/sns/x.png') }}" alt=""></a></li>
          <li><a href="{{ url($user->social->instagram ?? "") }}"><img class="w-6 h-6" src="{{ asset('image/top/sns/instagram.png') }}" alt=""></a></li>
          <li><a href="{{ url($user->social->git_hub ?? "") }}"><img class="w-6 h-6" src="{{ asset('image/top/sns/github.png') }}" alt=""></a></li>
        </ul>
      </div>

      <div class="flex justify-center">
        <ul class="menu menu-horizontal">
          <li><a href="{{ url('/about') }}">ABOUT</a></li>
          <li><a href="{{ route('guest.works.index') }}">WORKS</a></li>
          <li><a href="{{ url('/contact') }}">CONTACT</a></li>
        </ul>
      </div>
    </div>
  </div>
</x-top-layout>
