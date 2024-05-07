<!DOCTYPE html>
<html lang="en">

<head>
    <title>FNRI | Sign-up</title>
    @include('includes.impact')
    <!-- lEFT COLUMN CSS -->

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @include('includes.left_column')
            <div class="col-md-7 col-sm-12 right-column">
                <div class="login-container">

                    <div style="text-align: center;">
                        <h2>Sign-up</h2>
                    </div>
                    <div class="card-body">
                        <x-auth-validation-errors :errors="$errors" class="mb-4" />
                        <form method="POST" action="{{ route('register') }}" onsubmit="return handleFormSubmit(event)">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                {{-- <label for="name" class="form-label">{{ __('Name') }}</label> --}}
                                <input style="height:70px;" id="name" type="text" class="form-control"
                                    name="name" :value="old('name')" required autofocus placeholder="Name">
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                {{-- <label for="email" class="form-label">{{ __('Email') }}</label> --}}
                                <input style="height:70px;" id="email" type="email" class="form-control"
                                    name="email" :value="old('email')" required placeholder="Email">
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                {{-- <label for="password" class="form-label">{{ __('Password') }}</label> --}}
                                <input style="height:70px;" id="password" type="password" class="form-control"
                                    name="password" required autocomplete="new-password" placeholder="Password">
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                {{-- <label for="password_confirmation"
                                    class="form-label">{{ __('Confirm Password') }}</label> --}}
                                <input style="height:70px;" id="password_confirmation" type="password"
                                    class="form-control" name="password_confirmation" required
                                    placeholder="Confirm Password">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button
                                    style="width:100%; max-width:100%; height:70px; font-size:15px; margin-top:20px;"
                                    type="submit" class="btn btn-primary ms-4">{{ __('Register') }}</button>
                            </div>

                            <div class="mt-3 text-center">
                                <p><a class="text-sm text-gray-600 text-decoration-underline hover-text-gray-900"
                                        href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS and other dependencies -->
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/headroom.js/dist/headroom.min.js') }}"></script>
    <script src="{{ asset('vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/jarallax/dist/jarallax.min.js') }}"></script>
    <script src="{{ asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Impact JS -->
    <script src="{{ asset('impact_design/dashboard/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('impact_design/front/assets/js/aos.js') }}"></script>

    <!-- Your custom scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/mainpage.js') }}"></script>

</body>

</html>






















{{--


{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block w-full mt-1"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
