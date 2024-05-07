<!DOCTYPE html>
<html lang="en">

<head>
    <title>FNRI | Verify</title>
    @include('includes.impact')
    <!-- lEFT COLUMN CSS -->

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @include('includes.left_column')
            <div class="col-md-7 col-sm-12 right-column">


                <div class="login-container">

                    <br>
                    <div style="display:none;" id="countdown_end" class="mt-3 text-center alert alert-danger"
                        role="alert">
                    </div>
                    @if ($errors->any())
                        <div id="errorMessage" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error:</strong> {{ $errors->first('code') }}

                        </div>
                    @endif


                    <div class="text-center" id="countdown"></div>

                    <div class="hidden mt-3 text-center">
                        <h3>Please enter the One-time Password to verify your account</h3>
                    </div>
                    <div class="hidden mt-3 text-center">
                        <small>A code has been sent to
                            {{ substr_replace($user->email, '******', 2, strpos($user->email, '@') - 4) }}</small>

                    </div>


                    <form method="POST" action="{{ route('verify.store') }}">
                        @csrf
                        <div id="otp" class="flex-row mt-2 inputs d-flex justify-content-center">
                            <input class="m-2 text-center rounded form-control" type="text" id="first"
                                maxlength="1" name="code[]" inputmode="numeric" pattern="[0-9]" />
                            <input class="m-2 text-center rounded form-control" type="text" id="second"
                                maxlength="1" name="code[]" inputmode="numeric" pattern="[0-9]" />
                            <input class="m-2 text-center rounded form-control" type="text" id="third"
                                maxlength="1" name="code[]" inputmode="numeric" pattern="[0-9]" />
                            <input class="m-2 text-center rounded form-control" type="text" id="fourth"
                                maxlength="1" name="code[]" inputmode="numeric" pattern="[0-9]" />
                            <input class="m-2 text-center rounded form-control" type="text" id="fifth"
                                maxlength="1" name="code[]" inputmode="numeric" pattern="[0-9]" />
                            <input class="m-2 text-center rounded form-control" type="text" id="sixth"
                                maxlength="1" name="code[]" inputmode="numeric" pattern="[0-9]" />

                        </div>
                        <div class="mt-4">
                            <button id="backtologin"
                                style="width:100%; max-width:100%; height:70px; font-size:15px; margin-top:5px; id="validate"
                                type="submit" class="px-4 btn btn-primary validate">Submit</button>
                        </div>
                    </form>

                    <div class="hidden mt-4">

                    </div>

                    <div class="hidden mt-3 text-center">
                        <p>Didn't receive the code? </p><a href="{{ route('verify.resendotp') }}" id="resendLink"
                            class="px-4">Resend</a>
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

<style>
    .height-100 {
        height: 100vh
    }

    .inputs input {
        width: 80px;
        height: 70px;


        box-shadow: 0 0 5px rgba(10, 72, 179, 0.5);


    }

    @media (max-width: 767px) {
        .inputs input {
            width: 60px;
            height: 70px
        }

    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0
    }

    .card-2 {
        background-color: #fff;
        padding: 10px;
        width: 350px;
        height: 100px;
        bottom: -50px;
        left: 20px;
        position: absolute;
        border-radius: 5px
    }

    .card-2 .content {
        margin-top: 50px
    }

    .card-2 .content a {
        color: #0A48B3
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        function OTPInput() {
            const inputs = document.querySelectorAll('#otp > *[id]');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('keydown', function(event) {
                    if (event.key === "Backspace") {
                        inputs[i].value = '';
                        if (i !== 0) inputs[i - 1].focus();
                    } else {
                        if (i === inputs.length - 1 && inputs[i].value !== '') {
                            // If the last input is filled, submit the form
                            document.querySelector('form').submit();
                            return true;
                        } else if ((event.keyCode > 47 && event.keyCode < 58) || (event.keyCode > 95 &&
                                event.keyCode < 106)) {
                            inputs[i].value = event.key;
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        } else if (event.keyCode > 64 && event.keyCode < 91) {
                            inputs[i].value = String.fromCharCode(event.keyCode);
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        }
                    }
                });
                // Allow pasting values into the inputs
                inputs[i].addEventListener('paste', function(event) {
                    event.preventDefault();
                    const pastedText = event.clipboardData.getData('text');
                    if (pastedText.length === inputs.length && /^\d+$/.test(pastedText)) {
                        for (let j = 0; j < inputs.length; j++) {
                            inputs[j].value = pastedText[j];
                        }
                        document.querySelector('form').submit();
                    }
                });
                // Select all input values when clicking on any input
                inputs[i].addEventListener('click', function() {
                    inputs[i].select();
                });
            }
        }
        OTPInput();
    });


    document.addEventListener("DOMContentLoaded", function(event) {
        // Fetch the expiration time from the backend (you may need to adjust this based on your backend implementation)
        const expirationTime =
            "{{ $user->expire_at }}"; // Assuming $user contains the user data with 'expire_at'

        // Function to update the countdown timer
        function updateCountdown() {
            const currentTime = new Date().getTime();
            const remainingTime = new Date(expirationTime) - currentTime;
            const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

            // Display the countdown timer
            const countdownendElement = document.getElementById('countdown_end');
            const countdownElement = document.getElementById('countdown');
            const backToLoginButton = document.getElementById('backtologin');

            if (seconds > 0) {

                // Update the countdown text
                countdownElement.innerHTML = `OTP EXPIRES IN <strong>${seconds}</strong> SECONDS`;


            } else {
                countdownendElement.textContent = 'OTP HAS EXPIRED';
                countdownElement.style.display = 'none';
                countdownendElement.style.display = 'block';

                document.getElementById('first').disabled = true;
                document.getElementById('second').disabled = true;
                document.getElementById('third').disabled = true;
                document.getElementById('fourth').disabled = true;
                document.getElementById('fifth').disabled = true;
                document.getElementById('sixth').disabled = true;
                document.getElementById('validate').disabled = true;
                backToLoginButton.disabled = false;


                // clearInterval(countdownInterval);

            }
        }
        // Update countdown initially
        updateCountdown();

        // Update countdown every second
        const countdownInterval = setInterval(updateCountdown, 1000);
    });

    // Wait for the DOM to load
    document.addEventListener("DOMContentLoaded", function(event) {
        // Check if the error message element exists
        const errorMessage = document.getElementById('errorMessage');
        if (errorMessage) {
            // After 5 seconds, remove the error message
            setTimeout(function() {
                errorMessage.remove(); // Remove the error message element
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    });
</script>
