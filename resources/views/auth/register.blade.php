<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Uživatelské jméno') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4 relative">
                <x-label for="password" value="{{ __('Heslo') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>

            <div class="mt-4 relative">
                <x-label for="password_confirmation" value="{{ __('Potvrzení hesla') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('Souhlasím s :terms_of_service a :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Už jsi se registroval?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Zaregistrovat se') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<style>
.field-icon {
  float: right;
  margin-top: -30px;
  margin-right: 10px;
  z-index: 2;
  color: gray;
}
</style>

<script>
var togglePassword = document.querySelectorAll('.toggle-password');
togglePassword.forEach(function (toggle) {
    toggle.addEventListener('click', function (e) {
        var passwordInput = document.querySelector(e.currentTarget.getAttribute('toggle'));
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.classList.replace('fa-eye', 'fa-eye-slash'); 
        } else {
            passwordInput.type = 'password';
            this.classList.replace('fa-eye-slash', 'fa-eye'); 
        }
    });
});
</script>
