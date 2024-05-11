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
          <a href="{{ route('skills.create') }}">
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
            MySkills一覧
          </h2>
        </header>

        {{-- PC版 --}}
        <div class="hidden sm:block overflow-x-auto">
          <table class="table">
            <!-- head -->
            @if(!$user->skills->isNotEmpty())
              <tr>
                <td colspan="5" class="text-center">まだ登録がありません</td>
              </tr>
            @else
              <thead>
                <tr>
                  <th>言語</th>
                  <th>一言</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user->skills as $skill)
                  <tr>
                    <td>
                      <div class="font-bold">{{ $skill->name }}</div>
                    </td>
                    <td>
                      {{ Str::limit($skill->description, 20, '...') }}
                    </td>
                    <td>
                      <a href="{{ route('skills.edit', $skill->id) }}">
                        <button class="btn btn-ghost btn-xs">編集</button>
                      </a>
                    </td>
                    <td>
                      <form id="deleteForm_{{ $skill->id }}" action="{{ route('skills.destroy', $skill->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $skill->id }})" class="btn btn-ghost btn-xs">削除</button>
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
  function confirmDelete(skillId) {
      if (confirm('本当に削除しますか？')) {
          document.getElementById('deleteForm_' + skillId).submit();
      }
  }
</script>
