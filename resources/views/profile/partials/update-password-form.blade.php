<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input id="current_password" label="{{ __('Current Password') }}" name="current_password" type="password"
                class="block w-full mt-1" autocomplete="current-password" />
        </div>

        <div>
            <x-input id="password" label="{{ __('New Password') }}" name="password" type="password"
                class="block w-full mt-1" autocomplete="new-password" />
        </div>

        <div>
            <x-input id="password_confirmation" label="{{ __('Confirm Password') }}" name="password_confirmation"
                type="password" class="block w-full mt-1" autocomplete="new-password" />
        </div>

        <div class="flex items-center gap-4">
            <button class="mr-2 shadow-md btn btn-primary">{{ 'Save' }}</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
