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
                    <!-- Your login form code here -->
                    <div style="text-align: center;">
                        <img style="width:100px;" src="{{ asset('impact_design/front/assets/img/brand/TRANSLATE.png') }}"
                            alt="">
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <h2>Sign-in</h2>
                    </div>
                    <br>
                    <!-- Session Status -->
                    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
                    @if (session('status'))
                        <div id="alertcontainer"
                            class="text-center text-white alert bg-success alert-dismissible fade show" role="alert">
                            <x-auth-session-status class="" :status="session('status')" />
                        </div>

                        <script>
                            setTimeout(function() {
                                var alertContainer = document.getElementById('alertcontainer');
                                alertContainer.classList.remove('show');
                                alertContainer.classList.add('fade');
                                setTimeout(function() {
                                    alertContainer.style.display = 'none';
                                }, 1000);
                            }, 5000);
                        </script>
                    @endif


                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span><br>
                            @endforeach

                        </div>
                    @endif


                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                        <div id="alertMessage" class="alert alert-warning" style="display: none;"></div>
                        <!-- Email Address -->
                        <div class="mb-3">
                            {{-- <label for="email" class="form-label">{{ __('Email') }}</label> --}}
                            <input style="height:70px;" id="email" type="email"
                                class="form-control form-control-lg" name="email" value="{{ old('email') }}" required
                                autofocus placeholder="Email">
                        </div>




                        <div class="mb-3 input-group" style="position: relative;">
                            <input style="height: 70px; border-radius: 0.35rem;" type="password"
                                class="form-control form-control-lg" name="password" id="password" required
                                autocomplete="current-password" placeholder="Password">
                            <div class="input-group-append"
                                style="position: absolute; right: 25px; top: 0; bottom: 0; display: flex; align-items: center; z-index:5; ">
                                <span class="input-group toggle-icon" onclick="password_show_hide();">
                                    <i class="fas fa-eye eye-icon" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none eye-icon" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                        <!-- Remember Me -->
                        <div style="margin-left:10px;" class="mb-3 form-check">
                            {{-- <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label> --}}
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="float-right text-sm text-gray-600">{{ __('Forgot your password?') }}</a>
                            @endif
                        </div>
                        <div class="gap-2 d-grid">
                            <button style="width:100%; max-width:100%; height:70px; font-size:15px; margin-top:20px;"
                                type="submit" class="btn btn-primary btn-lg"
                                id="loginButton">{{ __('Sign-in') }}</button>
                            <span id="loadingIcon" style="display:none;"><i class="fas fa-spinner fa-spin"></i></span>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <p style="margin-top:40px;">Don't have an account yet? <a
                                href="{{ route('register') }}">Register
                                here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.toggle("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>

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
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 text-gray-500">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
            </div>

            <div class="gap-2 d-grid">
                <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
            </div>

            <div class="gap-2 mt-3 d-grid">
                @if (Route::has('password.request'))
                    <a class="text-sm text-decoration-none" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
