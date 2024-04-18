<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form id="my_form" method="post" action="{{ route('profile.update') }}" class="h-adr mt-6 space-y-6"
        enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- イメージ画像 --}}
        <div>
            <x-input-label for="file_input" :value="'プロフィール画像'" />
            <input id="file_input" name="image" type="file" class="hidden" accept="image/*" />
            <div class="mt-2 flex items-center gap-x-3">
                {{-- 画像無い場合 --}}
                @if ($user->image == null)
                    <svg id="image-preview" class="h-20 w-20 rounded-full text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                        d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                        clip-rule="evenodd" />
                    </svg>
                @else
                    <svg id="image-preview" class="h-20 w-20 rounded-full text-gray-300" viewBox="0 0 24 24"
                        style="background-image: url('{{ $user->image }}'); background-size: cover; background-position: center;" 
                        fill="currentColor" aria-hidden="true">
                    </svg>
                    <input type="hidden" name="image" value="{{ $user->image }}">
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

        {{-- 姓 --}}
        <div>
            <x-input-label for="last_name" :value="'姓'" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)"
                required autofocus autocomplete="family-name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        {{-- 名 --}}
        <div>
            <x-input-label for="first_name" :value="'名'" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)"
                required autofocus autocomplete="given-name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        {{-- メールアドレス --}}
        <div>
            <x-input-label for="email" :value="'メールアドレス'" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- 電話番号 --}}
        <div>
            <x-input-label for="phone_number" :value="'電話番号'" />
            <x-text-input id="phone_number" name="phone_number" type="tel" class="mt-1 block w-full" :value="old('phone_number', $user->phone_number)"
                required autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>


        {{-- 郵便番号 --}}
        <div class="space-y-6">
            <span class="p-country-name" style="display:none;">Japan</span>
            <div>
                <x-input-label for="postal_code" :value="'郵便番号'" />
                <x-text-input id="postal_code" name="postal_code" type="text" minlength="7" maxlength="8" class="p-postal-code mt-1 block"
                    :value="old('postal_code', $user->postal_code)" required autofocus autocomplete="shipping postal-code" /><span class="text-xs">※郵便番号を入力すると住所が自動補完されます</span>
                <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
            </div>

            <div>
                <x-input-label for="region" :value="__('都道府県')" />
                <x-text-input id="region" name="region" type="text" class="p-region mt-1 block"
                    :value="old('region', $user->region)" required />
                <x-input-error class="mt-2" :messages="$errors->get('region')" />
            </div>

            <div>
                <x-input-label for="locality" :value="__('市町村区')" />
                <x-text-input id="locality" name="locality" type="text" class="p-locality mt-1 block"
                    :value="old('locality', $user->locality)" required />
                <x-input-error class="mt-2" :messages="$errors->get('locality')" />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button id="submit-button">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

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
                    '<path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />'
                    );
            }
        });

        // 削除ボタンでデフォルト画像を表示
        $("#delete-button").click(function() {
            $("input[name='image']").val("");
            let base64DataUrl = "";
            preview.empty();
            preview.css("background-image", "");
            preview.html(
                '<path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />'
                );
        })
    });

</script>
