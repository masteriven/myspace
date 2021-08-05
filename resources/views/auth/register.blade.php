<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
                        <div class="card-header">{{ __('Register') }}</div>
                      <br>
              <form method="POST" action="{{ route('register') }}">
          @csrf
            @method('PUT')

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div>
                <x-jet-label for="age" value="{{ __('age') }}" />
                <x-jet-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')"/>
            </div>
            <div>
                <x-jet-label for="Town" value="{{ __('town') }}" />
                <x-jet-input id="town" class="block mt-1 w-full" type="text" name="town" :value="old('town')"/>
            </div>
            <div>
                <x-jet-label for="Phone" value="{{ __('phone') }}" />
                <x-jet-input id="Phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"/>
            </div>
            <div>
                <x-jet-label for="Website" value="{{ __('website') }}" />
                <x-jet-input id="Website" class="block mt-1 w-full" type="text" name="website" :value="old('website')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/">
                    {{ __('Already registered?') }}
                </a>
                <button style ="padding-left:10px;" type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
