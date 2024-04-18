<x-top-layout>
  <div class="text-gray-700 py-12">
    <div class="flex flex-col space-y-12 mx-auto max-w-xs md:max-w-2xl lg:max-w-4xl">

      <header class="text-xl">
        <h1>{{ $work->name }}</h1>
      </header>

      <div class="space-y-6">
        @foreach ($work->work_images as $image )
          <div class="max-w-4xl mx-auto shadow-lg">
            <img src="{{ $work->work_images->first()->image_path }}" class="object-cover rounded-lg" alt="">
          </div>
        @endforeach
      </div>

      <div>
        <a href="" class="inline-flex items-center underline text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" class="w-4 h-4 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
          </svg>
          <span>サイトを見る</span>
        </a>
      </div>

      {{-- about me --}}
      <div>
        <h2 class="text-lg border-b-2">使用言語</h2>
        <div class="p-2 lg:p-6">
          <dl class="space-y-2 text-sm">
            <dt class="float-left mr-3 w-40">フロントエンド言語：</dt>
            <dd>{{ $work->lan_front }}</dd>
            <dt class="float-left mr-3 w-40">バックエンド言語：</dt>
            <dd>{{ $work->lan_back }}</dd>
            <dt class="float-left mr-3 w-40">データベース：</dt>
            <dd>{{ $work->database }}</dd>
          </dl>
        </div>
      </div>

      <div>
        <h2 class="text-lg border-b-2">説明</h2>
        <div class="p-2 lg:p-6">
          <p class="text-sm tracking-widest leading-loose">
            {{ $work->description }}
          </p>
        </div>
      </div>
  </div>

  <div class="fixed bottom-0 w-screen flex items-center justify-center bg-white" style="background-color: rgba(255, 255, 255, 0.5);">
    <div class="py-2">
      <div class="flex justify-center">
        <ul class="menu menu-horizontal">
          <li><a href="{{ url('/home') }}">HOME</a></li>
          <li><a href="{{ url('/about') }}">ABOUT</a></li>
          <li><a href="{{ route('guest.works.index') }}">WORKS</a></li>
          <li><a href="{{ url('/contact') }}">CONTACT</a></li>
        </ul>
      </div>
    </div>
  </div>

</x-top-layout>