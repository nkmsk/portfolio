<x-top-layout>

  <div class="text-gray-700 p-6 lg:p-12">
    <div class="lg:px-6 flex flex-col">
      <div class="grid grid-cols-1 lg:grid-cols-3">

        {{-- プロフィール --}}
        <div class="col-span-1 my-8 px-6 flex flex-col space-y-12">

          {{-- profile image --}}
          <div class="rounded-full mx-auto w-32 h-32 shadow-md border-2 border-white transition duration-200 transform hover:scale-110"">
            <a href="{{ url('/home') }}">
              @if($user->image)
                <img src="{{ $user->image }}" class="rounded-full w-full h-full dark:bg-gray-700 object-cover" alt="ユーザー画像">
              @else
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-full h-full rounded-full text-gray-300">
                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                </svg>
              @endif
            </a>
          </div>

          {{-- profile name --}}
          <div>
            <h1 class="text-center text-xl font-semibold">{{ $user->last_name }} {{ $user->first_name }}</h1>
          </div>

          {{-- about me --}}
          <div>
            <h1 class="text-lg border-b-2">About Me</h1>
            <div class="p-6">
              <p class="text-sm tracking-widest leading-loose">
                {!! nl2br(e($user->about->about_me ?? "まだ登録がありません")) !!}
              </p>
            </div>
          </div>

          {{-- contact --}}
          <div>
            <h2 class="text-lg border-b-2">Contact</h2>
            <div class="p-6">
              <dl>
                <dt class="float-left mr-4 clear-left w-40">ADDRESS</dt>
                <dd class="float-left ml-2 mb-4 text-sm">
                  {{ $user->region ?? "" }} {{ $user->locality ?? "no address" }}
                </dd>
                <dt class="float-left mr-4 clear-left w-40">EMAIL</dt>
                <dd class="float-left ml-2 mb-4 text-sm">
                  {{ $user->email ?? "no email" }}
                </dd>
                <dt class="float-left mr-4 clear-left w-40">SOCIAL</dt>
                <dd class="float-left ml-2 mb-4 text-sm">
                  <div class="flex justify-center">
                    <ul class="menu menu-horizontal p-0">
                      <li><a href="{{ url($user->social->x ?? "") }}"><img class="w-3 h-3" src="{{ asset('image/top/sns/x.png') }}" alt=""></a></li>
                      <li><a href="{{ url($user->social->instagram ?? "") }}"><img class="w-3 h-3" src="{{ asset('image/top/sns/instagram.png') }}" alt=""></a></li>
                      <li><a href="{{ url($user->social->git_hub ?? "") }}"><img class="w-3 h-3" src="{{ asset('image/top/sns/github.png') }}" alt=""></a></li>
                    </ul>
                  </div>
                </dd>
              </dl>
            </div>
          </div>

          {{-- my skills --}}
          <div>
            <h2 class="text-lg border-b-2">My skills</h2>
            <div class="p-6 w-full flex flex-col overflow-hidden text-sm space-y-4">
              @if($user->skills->isNotEmpty())
                <ul class="space-y-6">
                  @foreach ($user->skills as $skill)
                  <li class="list-disc text-green-500">
                    <dl class="text-gray-700">
                      <dt class="font-semibold">{{ $skill->name }}</dt>
                      <dd>{{ $skill->description }}</dd>
                    </dl>
                  </li>
                  @endforeach
                </ul>
              @else
                {{ 'まだ登録がありません' }}
              @endif
            </div>
          </div>
        </div>


        <div class="col-span-2 my-8 px-6 flex flex-col space-y-12">

          {{-- 自己PR --}}
          <div>
            <h2 class="text-lg border-b-2">PR</h2>
            <div class="p-6 text-sm leading-loose space-y-3">
              <p>
                {!! nl2br(e($user->about->pr ?? "まだ登録がありません")) !!}
              </p>
            </div>
          </div>

          {{-- 職歴 --}}
          <div>
            <h2 class="text-lg border-b-2">Work History</h2>
            <div class="p-6 text-sm leading-loose">
              <ul class="timeline timeline-snap-icon timeline-compact timeline-vertical">
                @if ($user->work_histories->isNotEmpty())
                  @foreach ($user->work_histories as $work_history)
                    <li>
                      <div class="timeline-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.609a.75.75 0 00-1.214-.882l-3.563 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                      </div>
                      <div class="timeline-end mb-10">
                        <time class="font-mono italic">{{ $work_history->start_date }} - {{ $work_history->end_date }}</time>
                        <div class="text-md font-black">{{ $work_history->name }}</div>
                        <p>
                          {!! nl2br(e($work_history->description)) !!}
                        </p>
                      </div>
                      @if (!$loop->last)
                        <hr/>
                      @endif
                    </li>
                  @endforeach
                @else
                  {{ 'まだ登録がありません' }}
                @endif





                {{-- <li>
                  <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.609a.75.75 0 00-1.214-.882l-3.563 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="timeline-end mb-10">
                    <time class="font-mono italic">2010.4 - 2011.12</time>
                    <div class="text-md font-black">社会福祉恩賜財団済生会 松山病院</div>
                    <p>
                      ボイラーの管理、施設保全、備品管理、防災管理等を担当
                    </p>
                  </div>
                  <hr/>
                </li> --}}
                

                {{-- <li>
                  <hr />
                  <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.609a.75.75 0 00-1.214-.882l-3.563 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="timeline-end mb-10">
                    <time class="font-mono italic">2012.10 - 2022.3</time>
                    <div class="text-md font-black">株式会社WOMB</div>
                    販売業務を経て、経理部に配属<br>
                    経理部では経理、財務、労務を担当
                  </div>
                  <hr />
                </li>
                
                <li>
                  <hr />
                  <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.609a.75.75 0 00-1.214-.882l-3.563 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="timeline-end mb-10">
                    <time class="font-mono italic">2022.4 - 2022.7</time>
                    <div class="text-md font-black">株式会社CRADLE</div>
                    経理として配属<br>
                    飲食店の店舗運営業務を兼任
                  </div>
                </li> --}}
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fixed bottom-0 w-screen flex items-center justify-center bg-white" style="background-color: rgba(255, 255, 255, 0.5);">
    <div class="py-2">
      <div class="flex justify-center">
        <ul class="menu menu-horizontal">
          <li><a href="{{ url('/home') }}">HOME</a></li>
          <li><a href="{{ route('guest.works.index') }}">WORKS</a></li>
          <li><a href="{{ url('/contact') }}">CONTACT</a></li>
        </ul>
      </div>
    </div>
  </div>

</x-top-layout>