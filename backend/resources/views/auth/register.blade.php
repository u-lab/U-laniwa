<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('InviteCode') }}" />
                <x-jet-input id="invite_code" class="block mt-1 w-full "
                    style="background-color: rgb(254 223 223 / var(--tw-bg-opacity));" type="text" name="invite_code"
                    :value="old('invite_code')" required autofocus />
            </div>
            <div>
                <p class="block font-medium text-sm text-gray-700">{{ __('HopeUserRole') }}</p>
                <select
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full bg-bg"
                    name="user_role_id" name="{{ __('HopeUserRole') }}">
                    <option value="20">仮入部</option>
                    <option value="10">外部</option>
                </select>
            </div>
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full "
                    style="background-color: rgb(254 223 223 / var(--tw-bg-opacity));" ty type="text" name="name"
                    :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" style="background-color: rgb(254 223 223 / var(--tw-bg-opacity));" class="
                    block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" style="background-color: rgb(254 223 223 / var(--tw-bg-opacity));"
                    class=" block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <p class="text-gray-500 text-sm">パスワードは、アルファベット大文字小文字と数字を含む8文字以上60字以下である必要があります。</p>
                <p class="text-gray-500 text-sm">パスワードはハッシュ化されてデータベースに登録されます。</p>
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation"
                    style="background-color: rgb(254 223 223 / var(--tw-bg-opacity));" class=" block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>


            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms"
                            style="background-color: rgb(254 223 223 / var(--tw-bg-opacity));" />
                        <div class=" ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            '利用規約' => '<a target="_blank" href="'.url('terms').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">利用規約</a>',
                            'プライバシーポリシー' => '<a target="_blank" href="'.url('privacyPolicy').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">プライバシーポリシー</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
