<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
    <x-label for="identity" value="{{ __('Uživatelské jméno nebo E-mail') }}" />
    <x-input id="identity" class="block mt-1 w-full" type="text" name="identity" :value="old('identity')" required autofocus autocomplete="username" />
</div>



            <div class="mt-4 relative">
                <x-label for="password" value="{{ __('Heslo') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Zapamatujte si mě') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Zapomněli jste své heslo?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Přihlásit') }}
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
var togglePassword = document.querySelector('.toggle-password');
togglePassword.addEventListener('click', function (e) {
    var passwordInput = document.querySelector(e.currentTarget.getAttribute('toggle'));
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        this.classList.replace('fa-eye', 'fa-eye-slash'); 
    } else {
        passwordInput.type = 'password';
        this.classList.replace('fa-eye-slash', 'fa-eye'); 
    }
});
</script>
