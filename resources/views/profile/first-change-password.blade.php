<x-guest-layout>
    <x-slot:title>
        Thay đổi mật khẩu lần đầu
    </x-slot:title>

    <div class="l-background">
        <div class="box-login">
            <div class="title-login">Đổi mật khẩu lần đầu</div>
            @include('profile.partials.first-change-password-form')
        </div>
    </div>
</x-guest-layout>