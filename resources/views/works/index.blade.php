<x-app-layout>
  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex justify-between items-center">
        @if (session('success'))
          <x-alert-success class="flex-grow-1" />
        @endif
        @if (session('error'))
          <x-alert-error class="flex-grow-1" />
        @endif
        <div class="ml-auto">
          <a href="{{ route('works.create') }}">
            <button class="btn bg-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m-6-6h12"></path>
              </svg>
              NEW
            </button>
          </a>
        </div>
      </div>
      <div class="p-4 mt-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            WORKSの追加
          </h2>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ "作成物の登録をしてください" }}
          </p>
        </header>

        {{-- mobile版 --}}
        <div class="sm:hidden">
          <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
            @if (!$user->works->isEmpty())
              @foreach($user->works as $work)
                <div class="group relative mb-12">
                  <a href="{{ route('works.edit', $work->id) }}">
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

        {{-- PC版 --}}
        <div class="hidden sm:block overflow-x-auto">
          <table class="table">
            <!-- head -->
            @if(!$user->works->isNotEmpty())
              <tr>
                <td colspan="5" class="text-center">まだ登録がありません</td>
              </tr>
            @else
              <thead>
                <tr>
                  <th></th>
                  <th>作品名</th>
                  <th>リンク</th>
                  <th>説明文</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user->works as $work)
                  <tr>
                    <td class="p-0 text-center">
                      @if ($work->work_images->first()->image_path)
                        <div class="avatar">
                          <div class="h-24">
                            <img src="{{ $work->work_images->first()->image_path }}" class="object-cover">
                          </div>
                        </div>
                      @else
                        <svg id="image-preview" class="h-24 mx-auto text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                      @endif
                    </td>
                    <td>
                      <div class="font-bold">{{ $work->name }}</div>
                    </td>
                    <td>
                      {{ $work->link }}
                    </td>
                    <td>
                      {{ Str::limit($work->description, 20, '...') }}
                    </td>
                    <td>
                      <a href="{{ route('works.edit', $work->id) }}">
                        <button class="btn btn-ghost btn-xs">編集</button>
                      </a>
                    </td>
                    <td>
                      <form id="deleteForm_{{ $work->id }}" action="{{ route('works.destroy', $work->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $work->id }})" class="btn btn-ghost btn-xs">削除</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            @endif
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

<script>
  function confirmDelete(workId) {
      if (confirm('本当に削除しますか？')) {
          document.getElementById('deleteForm_' + workId).submit();
      }
  }
</script>
