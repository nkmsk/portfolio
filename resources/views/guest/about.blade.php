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
                <img src="{{ $user->image }}" class="rounded-full w-full h-full dark:bg-gray-500 object-cover" alt="ユーザー画像">
              @else
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-full h-full rounded-full text-gray-300">
                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                </svg>
              @endif
            </a>
          </div>

          {{-- profile name --}}
          <div>
            <h1 class="text-center text-xl font-medium">{{ $user->last_name }} {{ $user->first_name }}</h1>
          </div>

          {{-- about me --}}
          <div>
            <h1 class="text-lg border-b-2">About Me</h1>
            <div class="p-6">
              <p class="text-sm tracking-widest leading-loose">
                1991年、愛媛県松山市で生まれました。アパレル会社に就職し、販売業務を経て、経理を担当していました。アパレル業界のIT化が進む中、私はその変化を肌で感じる中で、ITがビジネスに与える影響や可能性に興味を持つようになりました。その結果、IT分野でのキャリアを築きたいという思いが芽生えました。
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
              <div class="py-4">
                <div class="flex items-center justify-start py-2 text-gray-500 text-sm">
                  <img src="{{ asset('image/top/skills/html-css.png') }}" alt="" class="h-6 mr-2">
                  <p>HTML/CSS</p>
                </div>
                <p class="text-xs">簡単なwebページを作成することができます。当サイトはtailwind cssを使用しています。</p>
              </div>

              <div>
                <div class="flex items-center justify-start py-2 text-gray-500 text-sm">
                  <img src="{{ asset('image/top/skills/php.png') }}" alt="" class="h-6 mr-2">
                  <p>PHP</p>
                </div>
                <p class="text-xs">phpの基本文法やlaravel使用して、TODOアプリや商品管理システムなどを作成しました。</p>
              </div>

              <div>
                <div class="flex items-center justify-start py-2 text-gray-500 text-sm">
                  <img src="{{ asset('image/top/skills/javascript.png') }}" alt="" class="h-6 mr-2">
                  <p>Javascript</p>
                </div>
                <p class="text-xs">簡単なDOM操作やイベントハンドリングを学びました。</p>
              </div>

              <div>
                <div class="flex items-center justify-start py-2 text-gray-500 text-sm">
                  <img src="{{ asset('image/top/skills/mysql.png') }}" alt="" class="h-6 mr-2">
                  <p>MySQL</p>
                </div>
                <p class="text-xs">SQLの基本文法を学びました</p>
              </div>
            </div>
          </div>
        </div>


        <div class="col-span-2 my-8 px-6 flex flex-col space-y-12">

          {{-- 自己PR --}}
          <div>
            <h2 class="text-lg border-b-2">PR</h2>
            <div class="p-6 text-sm leading-loose space-y-3">

              <p>
                私はバックエンド開発に興味を抱いています。
              </p>

              <p>
                ITは様々な業界に浸透していき、広く問題解決や利便性向上に役立っていると感じています。<br>
                バックエンドに興味をもった理由はその問題解決を担うシステムの中枢であると感じ、社会貢献に役立つと感じたからです。
              </p>

              <p>
                現在はバックエンド開発において必要な基礎知識やスキルを学習中であり、学習内容は作成物として<a href="{{ url('/works') }}" class="underline">WORKS</a>にまとめています。
              </p>
                今後はスキルや経験を積み重ねていき、企業や社会の目標達成に貢献できるエンジニアになりたいと考えています。
              <p>
                
              </p>
            </div>
          </div>

          {{-- 職歴 --}}
          <div>
            <h2 class="text-lg border-b-2">Work History</h2>
            <div class="p-6 text-sm leading-loose">
              <ul class="timeline timeline-snap-icon timeline-compact timeline-vertical">
                <li>
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
                </li>

                <li>
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
                </li>
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