<x-app-layout>
  <div class="sm:py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
          <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                  {{ '作品物の編集' }}
                </h2>
        
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                  {{ '全て必須項目です' }}
                </p>
            </header>

            @if(session('error'))
              <div class="alert alert-danger">
                {{ session('error') }} 
              </div>
            @endif
        
            <form id="my_form" method="post" action="{{ route('works.update', $work->id) }}" class="h-adr mt-6 space-y-6" enctype="multipart/form-data">
              @csrf
              @method('patch')
      
              {{-- イメージ画像 --}}
              <div>
                <x-input-label for="file_input" :value="'サムネイル'" />
                <input id="file_input" name="image" type="file" class="hidden" accept="image/*" />
                <div class="mt-2 flex items-center gap-x-3">

                    {{-- 画像の登録が無ければ --}}
                    @if ($work->work_images->first()->image_path == null)
                        <svg id="image-preview" class="h-40 w-40 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    {{-- 画像があれば表示 --}}
                    @else
                        <svg id="image-preview" class="h-40 w-40 shadow-lg text-gray-300" viewBox="0 0 24 24"
                            style="background-image: url('{{ $work->work_images->first()->image_path }}'); background-size: cover; background-position: center;" 
                            fill="currentColor" aria-hidden="true">
                        </svg>
                        <input type="hidden" name="image" value="{{ $work->work_images->first()->image_path }}">
                    @endif
                    <button id="image_select_button" type="button"
                        class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">変更
                    </button>
                    <button id="delete-button" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
              </div>
      
              {{-- 作品名 --}}
              <div>
                <x-input-label for="name" :value="'作品名'" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $work->name)" autofocus/>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
              </div>
      
              {{-- リンク --}}
              <div>
                <x-input-label for="link" :value="'URL'" />
                <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" :value="old('link', $work->link)" />
                <x-input-error class="mt-2" :messages="$errors->get('link')" />
              </div>

              {{-- フロントエンド --}}
              <div>
                <x-input-label for="lan_front" :value="'フロントエンド'" />
                <x-text-input id="lan_front" name="lan_front" type="text" class="mt-1 block w-full" :value="old('lan_front', $work->lan_front)" />
                <x-input-error class="mt-2" :messages="$errors->get('lan_front')" />
              </div>

              {{-- バックエンド --}}
              <div>
                <x-input-label for="lan_back" :value="'バックエンド'" />
                <x-text-input id="lan_back" name="lan_back" type="text" class="mt-1 block w-full" :value="old('lan_back', $work->lan_back)" />
                <x-input-error class="mt-2" :messages="$errors->get('lan_back')" />
              </div>

              {{-- データベース --}}
              <div>
                <x-input-label for="database" :value="'データベース'" />
                <x-text-input id="database" name="database" type="text" class="mt-1 block w-full" :value="old('database', $work->database)" />
                <x-input-error class="mt-2" :messages="$errors->get('database')" />
              </div>
      
              {{-- 説明 --}}
              <div>
                <x-input-label for="description" :value="'説明'" />
                <textarea id="description" name="description" type="textarea" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $work->description) }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
              </div>

              <div class="flex items-center ">
                <x-primary-button id="submit-button">{{ __('Save') }}</x-primary-button>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

<script>
  // プロフィール画像
  $(document).ready(function() {
      const preview = $("#image-preview");
      let base64DataUrl = "";
      
      $("#image_select_button").on("click", function() {
          $("#file_input").click();
      });

      $("#file_input").on("change", function(e) {
          const file = e.target.files[0];

          // 画像データならば
          if (file && file.type.startsWith("image/")) {
              const reader = new FileReader();
              reader.onload = function(e) {
                  base64DataUrl = e.target.result;
                  var input = $('<input>').attr({
                      type: 'hidden',
                      name: 'image',
                      value: base64DataUrl
                  });
                  $("#my_form").append(input);

                  preview.empty();
                  preview.css("background-image", `url('${base64DataUrl}')`);
                  preview.css("background-size", "cover");
                  preview.css("background-position", "center");
              };
              reader.readAsDataURL(file);



          } else {

              // 画像でなければデフォルトのSVGを表示
              preview.css("background-image", "");
              preview.html(
                  '<path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />'
                  );
          }
      });

      // 削除ボタンでデフォルト画像を表示
      $("#delete-button").click(function() {
          let base64DataUrl = "";
          preview.empty();
          preview.css("background-image", "");
          preview.html(
              '<path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />'
              );
      })
  });
</script>