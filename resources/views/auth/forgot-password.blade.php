<!DOCTYPE html>
<html lang="en">

<head>
    <title>FNRI | Login</title>
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
                        <h2>Forgot password</h2>
                    </div>
                    <br>
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-4 alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="mb-4 alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">

                            <input required autofocus placeholder="Email" style="height:70px;" id="email"
                                class="form-control" type="email" name="email" value="{{ old('email') }}" required
                                autofocus />
                        </div>

                        <div class="gap-2 d-grid">
                            <button style="width:100%; max-width:100%; height:70px; font-size:15px; margin-top:5px;"
                                type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <p style="margin-top:40px;">Back to <a href="{{ route('login') }}">Sign-in</a>
                        </p>
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

















{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
