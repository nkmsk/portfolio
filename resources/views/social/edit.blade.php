<x-app-layout>
  <div class="sm:py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            ソーシャルリンクの更新
          </h2>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ "各リンクのURLを登録してください" }}
          </p>
        </header>
        
        <form method="post" action="{{ route('social.update') }}">
          @csrf
          @method('patch')

          <div class="max-w-xl space-y-6 mt-6">
            {{-- x --}}
            <div>
              <x-input-label for="x" :value="'X'" />
              <x-text-input id="x" name="x" type="text" class="mt-1 block w-full" :value="old('x', $user?->social?->x)" autofocus />
              <x-input-error class="mt-2" :messages="$errors->get('x')" />
            </div>
  
            {{-- instagram --}}
            <div>
              <x-input-label for="instagram" :value="'instagam'" />
              <x-text-input id="instagram" name="instagram" type="text" class="mt-1 block w-full" :value="old('instagram', $user?->social?->instagram)" autofocus />
              <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
            </div>
            
            {{-- git_hub --}}
            <div>
              <x-input-label for="git_hub" :value="'git_hub'" />
              <x-text-input id="git_hub" name="git_hub" type="text" class="mt-1 block w-full" :value="old('git_hub', $user?->social?->git_hub)" autofocus />
              <x-input-error class="mt-2" :messages="$errors->get('git_hub')" />
            </div>
  
            <div class="flex items-center gap-4">
              <x-primary-button id="submit-button">{{ __('Save') }}</x-primary-button>
    
              @if (session('status') === 'social-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                  class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
              @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
