<x-app-layout>
  <div class="sm:py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Aboutページの詳細設定
          </h2>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ "aboutページの情報を設定してください" }}
          </p>
        </header>
        
        <form method="post" action="{{ route('about.update') }}">
          @csrf
          @method('patch')

          <div class="max-w-xl space-y-6 mt-6">
            {{-- about_me --}}
            <div>
              <x-input-label for="about_me" :value="'簡単な自己紹介を記入してください'" />
              <textarea id="about_me" name="about_me" rows="7" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('about_me', $user?->about?->about_me) }}</textarea>
              <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
            </div>
  
            {{-- pr --}}
            <div>
              <x-input-label for="pr" :value="'自己PRを記入してください'" />
              <textarea id="pr" name="pr" rows="7" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('pr', $user?->about?->pr) }}</textarea>
              <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
            </div>
            
            <div class="flex items-center gap-4">
              <x-primary-button id="submit-button">{{ __('Save') }}</x-primary-button>
    
              @if (session('status') === 'about-updated')
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
