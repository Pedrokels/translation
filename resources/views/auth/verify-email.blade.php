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
                    <div class="mb-3 d-flex align-items-center justify-content-center">
                        <img style="width:100%; max-width:200px;"
                            src="{{ asset('impact_design/front/assets/img/brand/email.gif') }}" alt="">

                    </div>
                    <br>
                    <p class="mb-4 text-sm text-gray-600">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </p>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 text-sm text-success">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button style="width:100%; max-width:500px; height:70px; font-size:15px; margin-top:5px;"
                            type="submit" class="btn btn-primary">
                            {{ __('Resend Verification') }}
                        </button>
                    </form>

                    <div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button style="width:100%; max-width:500px; height:70px; font-size:15px; margin-top:5px;"
                                type="submit" class="btn btn-outline-danger">
                                {{ __('Log Out') }}
                            </button>
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

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="flex items-center justify-between mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="text-sm text-gray-600 underline hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout> --}}
