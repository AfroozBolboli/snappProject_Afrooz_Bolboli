<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" class="text-right" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label class="text-white text-lg" for="name" :value="__('نام')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label class="text-white text-lg" for="email" :value="__('ایمیل')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone number -->
            <div class="mt-4">
                <x-input-label class="text-white text-lg" for="phone" :value="__('موبایل')" />

                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />

                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Choose Role -->
            <div class="mt-4">
                <x-input-label class="text-white text-lg" for="role" :value="__('نقش')" />
                <select name="role" class="block mt-1 w-full text-right">
                    <option value="2">فروشنده</option>
                    <option value="3">خریدار</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label class="text-white " for="password" :value="__('رمز عبور')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label class="text-white font-base" for="password_confirmation" :value="__('تکرار رمز عبور')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('حساب کاربری دارید؟') }}
                </a>

                <x-primary-button class="ml-4 font-semibold text-base">
                    {{ __('ثبت نام') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
