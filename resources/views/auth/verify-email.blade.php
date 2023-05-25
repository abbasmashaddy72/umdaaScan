<x-guest-layout>
    @slot('left')
        <img alt="Larvel Tailwind HTML Admin Template" class="w-1/2 -mt-16 -intro-x"
            src="{{ asset('dist/images/illustration.svg') }}">
        <div class="w-4/6 mt-10 text-4xl font-medium leading-tight text-white -intro-x">
            {{ __('Thanks for signing up!') }}
        </div>
        <div class="mt-5 text-lg text-white -intro-x text-opacity-70 dark:text-slate-400">
            {{ __('Manage your Hospitals/Clinics in one place') }}</div>
    @endslot
    @slot('right')
        <h2 class="text-2xl font-bold text-center intro-x xl:text-3xl xl:text-left">{{ __('Email Verification') }}</h2>

        <div class="mt-2 text-center intro-x text-slate-600 dark:text-slate-200">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        <div class="flex items-center justify-between mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <button
                    class="inline-flex items-center px-2 py-2 font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    id="btn-login" type="submit">{{ __('Resend Verification Email') }}</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="w-full px-2 py-2 ml-2 mr-auto align-top btn btn-primary xl:w-32 xl:mr-3" id="btn-login"
                    type="submit">{{ __('Log Out') }}</button>
            </form>
        </div>
    @endslot
</x-guest-layout>
