<x-guest-layout>
    <x-slot:title>
        Thay đổi mật khẩu lần đầu
    </x-slot:title>
    <!-- Session Status -->
    <!-- <x-auth-session-status class="mb-4" :status="session('status')" /> -->


    <div class="l-background">
        <div class="box-login">
            <div class="title-login">Đổi mật khẩu lần đầu</div>
            <p>Xin chào Hữu Khang!</p>
            <p class="px-5 fs-6 my-2">Vì đây là lần đầu đăng nhập nên bạn cần thay đổi mật khẩu.</p>
            <form class="form-login px-5" method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <x-input-label class="form-label" for="newPassword" :value="__('Nhập mật khẩu mới')" />
                    <x-text-input id="newPassword" class="block mt-1 w-full" type="password" name="newPassword" required autofocus />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label class="form-label" for="newPasswordXConfirm" :value="__('Mật khẩu')" />
                    <x-text-input id="newPasswordXConfirm" class="block mt-1 w-full" type="password" name="newPasswordConfirm" required autofocus/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <!-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Quên mật khẩu?') }}
                    </a>
                    @endif -->

                    <x-primary-button class="ms-3">
                        {{ __('Đổi mật khẩu') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>