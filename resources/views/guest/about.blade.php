<x-top-layout>

  <div class="text-gray-700 p-6 lg:p-12">
    <div class="lg:px-6 flex flex-col">
      <div class="grid grid-cols-1 lg:grid-cols-3">

        {{-- プロフィール --}}
        <div class="col-span-1 my-8 flex flex-col">
          <div class="rounded-full mx-auto w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110"">
            <a href="{{ url('/') }}"><img src="{{ asset('image/top/avatar/avatar-01.jpg') }}" alt="" class="rounded-full w-full h-full"></a>
          </div>

          <div class="mt-12 mx-auto">
            <dl>
              <dt class="float-left mr-4 clear-left w-40">PROFILE</dt>
              <dd class="float-left ml-2 mb-6 text-sm">
                正岡 直樹<br>
                1991年生まれ<br>
                コーヒーと釣りが趣味です。<br>
              </dd>
              <dt class="float-left mr-4 clear-left w-40">ADDRESS</dt>
              <dd class="float-left ml-2 mb-6 text-sm">
                愛媛県 松山市
              </dd>
              <dt class="float-left mr-4 clear-left w-40">CONTACT</dt>
              <dd class="float-left ml-2 mb-4 text-sm">
                nk.msk7@gmail.com
              </dd>
              <dt class="float-left mr-4 clear-left w-40">SOCIAL</dt>
              <dd class="float-left ml-2 mb-4 text-sm">
                <div class="flex justify-center">
                  <ul class="menu menu-horizontal p-0">
                    <li><a href="{{ url('https://twitter.com/nkmsk075') }}"><img class="w-3 h-3" src="{{ asset('image/top/sns/x.png') }}" alt=""></a></li>
                    <li><a href="{{ url('https://www.instagram.com/nkmsk075') }}"><img class="w-3 h-3" src="{{ asset('image/top/sns/instagram.png') }}" alt=""></a></li>
                    <li><a href="{{ url('https://github.com/nkmsk') }}"><img class="w-3 h-3" src="{{ asset('image/top/sns/github.png') }}" alt=""></a></li>
                  </ul>
                </div>
              </dd>
            </dl>
          </div>

          {{-- スキルリスト --}}
          <div class="mt-12 mx-auto">
            <h2 class="font-medium">My skills</h2>
            <div class="mt-2 w-full flex flex-col overflow-hidden text-sm">

              <div class="py-4">
                <div class="flex items-center justify-start py-2 text-gray-500 text-sm">
                  <img src="{{ asset('image/top/skills/html-css.png') }}" alt="" class="h-6 mr-2">
                  <p>HTML/CSS</p>
                </div>
                <p class="text-xs">簡単なwebページを作成することができます。当サイトはtailwind cssを使用しています。</p>
              </div>

              <div class="py-4">
                <div class="flex items-center justify-start py-2 text-gray-500 text-sm">
                  <img src="{{ asset('image/top/skills/php.png') }}" alt="" class="h-6 mr-2">
                  <p>PHP</p>
                </div>
                <p class="text-xs">phpの基本文法やlaravel使用して、TODOアプリや商品管理システムなどを作成しました。</p>
              </div>

              <div class="py-4">
                <div class="flex items-center justify-start py-2 text-gray-500 text-sm">
                  <img src="{{ asset('image/top/skills/javascript.png') }}" alt="" class="h-6 mr-2">
                  <p>Javascript</p>
                </div>
                <p class="text-xs">簡単なDOM操作やイベントハンドリングを学びました。</p>
              </div>

              <div class="py-4">
                <div class="flex items-center justify-start py-2 text-gray-500 text-sm">
                  <img src="{{ asset('image/top/skills/mysql.png') }}" alt="" class="h-6 mr-2">
                  <p>MySQL</p>
                </div>
                <p class="text-xs">SQLの基本文法を学びました</p>
              </div>
            </div>
          </div>
          
        </div>

        <div class="col-span-2 mx-auto my-auto">
          {{-- 自己PR --}}
          <div class="mt-12">
            <h2 class="font-medium">自己PR</h2>
            <div class="mt-2 py-4 text-sm leading-loose">

              <p>
                私は未経験からエンジニアとしてのキャリアをスタートし、特にバックエンド開発に興味を抱いています。
              </p>

              <p class="pt-3">
                技術への好奇心と問題解決への情熱が私をエンジニアの世界に引き込みました。
              </p>

              <p class="pt-3">
                現在はバックエンド開発において必要な基礎知識やスキルを学習中であり、PHPやLaravelなどのフレームワークに焦点を当てています。自己学習を通じて、CRUD操作の理解やデータベースの基本的な設計をマスターし、実践的なプロジェクトを通してスキルを向上させています。
              </p>

              <p class="pt-3">
                新しい言語やツールに挑戦することに抵抗がなく、チームと協力しながら成長することにワクワクしています。未経験からのスタートだからこそ、柔軟性と向上心を持って、プロフェッショナルなバックエンドエンジニアになるために努力し続けます。エンジニアとしての道を歩む中で、クリエイティブで効果的なソリューションを提供し、技術の力で社会に貢献していきたいと考えています。
              </p>
            </div>
          </div>

          {{-- 職歴 --}}
          <div class="mt-12">
            <h2 class="font-medium mb-2">職歴</h2>
            <ul class="py-4 timeline timeline-snap-icon timeline-compact timeline-vertical">
              <li>
                <div class="timeline-middle">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.609a.75.75 0 00-1.214-.882l-3.563 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
                <div class="timeline-end mb-10">
                  <time class="font-mono italic">2010.4 - 2011.12</time>
                  <div class="text-md font-black">社会福祉恩賜財団済生会 松山病院</div>
                  <p>ここに簡単な文章が入ります。</p>
                </div>
                <hr/>
              </li>

              <li>
                <hr />
                <div class="timeline-middle">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.609a.75.75 0 00-1.214-.882l-3.563 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
                <div class="timeline-end mb-10">
                  <time class="font-mono italic">2012.1 - 2012.6</time>
                  <div class="text-md font-black">日本水処理工業株式会社（派遣）</div>
                  ここに文章
                </div>
                <hr />
              </li>

              <li>
                <hr />
                <div class="timeline-middle">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.609a.75.75 0 00-1.214-.882l-3.563 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
                <div class="timeline-end mb-10">
                  <time class="font-mono italic">2012.10 - 2022.3</time>
                  <div class="text-md font-black">株式会社WOMB</div>
                  ここに文章
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
                  ここに文章
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fixed bottom-0 w-screen flex items-center justify-center mx-auto bg-white" style="background-color: rgba(255, 255, 255, 0.5);">
    <div class="py-2">
      <div class="flex justify-center">
        <ul class="menu menu-horizontal">
          <li><a href="{{ url('/') }}">HOME</a></li>
          <li><a href="{{ url('/product') }}">WORKS</a></li>
          <li><a href="{{ url('/contact') }}">CONTACT</a></li>
        </ul>
      </div>
    </div>
  </div>

</x-top-layout>