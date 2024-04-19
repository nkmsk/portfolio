<x-app-layout>
  <div class="sm:py-6">
      <div class="sm:max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
              <div class="max-w-xl">
                  <section>
                      <header>
                          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                              {{ 'Skillの編集' }}
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
                  
                      <form id="my_form" method="post" action="{{ route('skills.update', $skill->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                
                        {{-- 言語 --}}
                        <div>
                            <x-input-label for="name" :value="'言語'" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $skill->name)" required autofocus/>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                
                        {{-- 一言 --}}
                        <div>
                          <x-input-label for="description" :value="'一言'" />
                          <textarea id="description" name="description" rows="3" type="textarea" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('description', $skill->description) }}</textarea>
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