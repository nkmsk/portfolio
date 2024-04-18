<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ '作品物の新規登録' }}
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
                    
                        <form id="my_form" method="post" action="{{ route('works.store') }}" class="h-adr mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                    
                            {{-- イメージ画像 --}}
                            <div>
                                <x-input-label for="image" :value="'サムネイル'" />
                                <div class="flex items-center gap-x-3">
                                    <input id="input_file" name="image" type="file" accept="image/*" class="file-input file-input-bordered mt-1 w-full max-w-xs" required />
                                    <button id="delete-button" type="button" class="my-auto">
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
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus/>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                    
                            {{-- リンク --}}
                            <div>
                                <x-input-label for="link" :value="'URL'" />
                                <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" :value="old('link')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('link')" />
                            </div>

                            {{-- フロントエンド --}}
                            <div>
                                <x-input-label for="lan_front" :value="'フロントエンド'" />
                                <x-text-input id="lan_front" name="lan_front" type="text" class="mt-1 block w-full" :value="old('lan_front')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('lan_front')" />
                            </div>

                            {{-- バックエンド --}}
                            <div>
                                <x-input-label for="lan_back" :value="'バックエンド'" />
                                <x-text-input id="lan_back" name="lan_back" type="text" class="mt-1 block w-full" :value="old('lan_back')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('lan_back')" />
                            </div>

                            {{-- データベース --}}
                            <div>
                                <x-input-label for="database" :value="'データベース'" />
                                <x-text-input id="database" name="database" type="text" class="mt-1 block w-full" :value="old('database')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('database')" />
                            </div>
                    
                            {{-- 説明 --}}
                            <div>
                                <x-input-label for="description" :value="'説明'" />
                                <textarea id="description" name="description" type="textarea" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('description') }}</textarea>
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
    // 削除ボタンでデフォルト画像を表示
    $("#delete-button").click(function() {
        $("#input_file").val('');
    });
</script>