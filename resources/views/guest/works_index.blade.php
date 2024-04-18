<x-top-layout>
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
      <h1 class="font-serif text-3xl text-gray-700 tracking-widest">WORKS</h1>

      <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
        @if (!$user->works->isEmpty())
          @foreach($user->works as $work)
            <div class="group relative mb-12">
              <a href="{{ route('guest.works.show', ['id' => $work->id ] ) }}">
                @if ($work->work_images->isNotEmpty())
                  <div class="relative h-80 w-full overflow-hidden rounded-lg shadow-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 transition duration-500 ease-in-out group-hover:opacity-75 group-hover:brightness-50 sm:h-64">
                    <img src="{{ $work->work_images->first()->image_path }}" alt="" class="h-full w-full object-cover object-center transition duration-500 ease-in-out hover:scale-110">
                  </div>
                @else
                  no
                @endif
                <h2 class="mt-6 text-base font-semibold text-gray-700">{{ $work->name }}</h2>
              </a>
            </div>
          @endforeach
        @else
          <p>まだ登録がありません</p>
        @endif
      </div>
    </div>
  </div>

  <div class="fixed bottom-0 w-screen flex items-center justify-center bg-white" style="background-color: rgba(255, 255, 255, 0.5);">
    <div class="py-2">
      <div class="flex justify-center">
        <ul class="menu menu-horizontal">
          <li><a href="{{ url('/home') }}">HOME</a></li>
          <li><a href="{{ url('/about') }}">ABOUT</a></li>
          <li><a href="{{ url('/contact') }}">CONTACT</a></li>
        </ul>
      </div>
    </div>
  </div>

</x-top-layout>