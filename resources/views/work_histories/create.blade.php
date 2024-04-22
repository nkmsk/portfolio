<x-app-layout>
    <div class="sm:py-6">
        <div class="sm:max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ 'Work Historyの新規作成' }}
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
                    
                        <form id="my_form" method="post" action="{{ route('work_histories.store') }}" class="mt-6 space-y-6">
                            @csrf
                    
                            {{-- 期間 --}}
                            <div class="flex space-x-4">
                                <div>
                                <x-input-label for="start_date" :value="'入社日'" />
                                <input id="start_date_input" name="start_date" type="month" min="1925-01" max="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required :value="old('start_date')" />
                                <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                                </div>

                                <div>
                                <x-input-label for="end_date" :value="'退社日'" />
                                <input id="end_date_input" name="end_date" type="month" min="1925-01" max="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" :value="old('end_date')" />
                                <p class="mt-1 text-xs">※在職中の場合、空欄</p>
                                <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                                </div>
                            </div>

                            {{-- 会社名 --}}
                            <div>
                                <x-input-label for="name" :value="'会社名'" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus/>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                    
                            {{-- 補足 --}}
                            <div>
                            <x-input-label for="description" :value="'補足'" />
                            <textarea id="description" name="description" rows="3" type="textarea" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('description') }}</textarea>
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
    // 日付の最大値を求める
    // 現在の日付を取得
    var today = new Date();
    var year = today.getFullYear();
    var month = ('0' + (today.getMonth() + 1)).slice(-2);

    // 現在の年月を設定
    var maxDate = year + '-' + month;

    // max属性を設定
    $("#start_date_input").attr("max", maxDate);
    $("#end_date_input").attr("max", maxDate);
</script>