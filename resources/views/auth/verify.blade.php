{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('verify.store') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-input id="password" class="block w-full mt-1" type="text" name="code" required />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>


<div class="container height-100 d-flex justify-content-center align-items-center">
    <div class="position-relative">
        <div class="p-2 text-center card">
            @if ($errors->any())
                <div id="errorMessage" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ $errors->first('code') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div id="countdown" class="mt-3 text-danger"></div>
            <h6>Please enter the one time password <br> to verify your account</h6>
            <div> <span>A code has been sent to</span> <small>{{ $user->email }}</small> </div>

            <form method="POST" action="{{ route('verify.store') }}">
                @csrf
                <div id="otp" class="flex-row mt-2 inputs d-flex justify-content-center">
                    <input class="m-2 text-center rounded form-control" type="text" id="first" maxlength="1"
                        name="code[]" inputmode="numeric" pattern="[0-9]" />
                    <input class="m-2 text-center rounded form-control" type="text" id="second" maxlength="1"
                        name="code[]" inputmode="numeric" pattern="[0-9]" />
                    <input class="m-2 text-center rounded form-control" type="text" id="third" maxlength="1"
                        name="code[]" inputmode="numeric" pattern="[0-9]" />
                    <input class="m-2 text-center rounded form-control" type="text" id="fourth" maxlength="1"
                        name="code[]" inputmode="numeric" pattern="[0-9]" />
                    <input class="m-2 text-center rounded form-control" type="text" id="fifth" maxlength="1"
                        name="code[]" inputmode="numeric" pattern="[0-9]" />
                    <input class="m-2 text-center rounded form-control" type="text" id="sixth" maxlength="1"
                        name="code[]" inputmode="numeric" pattern="[0-9]" />

                </div>
                <div class="mt-4">
                    <button id="validate" type="submit" class="px-4 btn btn-danger validate">Validate</button>
                </div>
            </form>

            <div id="backtologin" class="hidden mt-4">
                <p>Didn't receive the code? </p><a href="{{ route('verify.resendotp') }}" id="resendLink"
                    class="px-4">Resend</a>
            </div>

        </div>



        {{-- <div style="display:none;" id="backtologin" class="hidden mt-4">
            <a href="{{ route('verify.resendotp') }}" id="resendLink" class="px-4">Resend</a>
        </div> --}}

    </div>
</div>

<style>
    .height-100 {
        height: 100vh
    }

    .card {
        width: 400px;
        border: none;
        height: 300px;
        box-shadow: 0px 5px 20px 0px #d2dae3;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .card h6 {
        color: red;
        font-size: 20px
    }

    .inputs input {
        width: 40px;
        height: 40px
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
        color: red
    }

    .form-control:focus {
        box-shadow: none;
        border: 2px solid red
    }

    .validate {
        border-radius: 20px;
        height: 40px;
        background-color: red;
        border: 1px solid red;
        width: 140px
    }
</style>

<script>
    // document.addEventListener("DOMContentLoaded", function(event) {
    //     function OTPInput() {
    //         const inputs = document.querySelectorAll('#otp > *[id]');
    //         for (let i = 0; i < inputs.length; i++) {
    //             inputs[i].addEventListener('keydown', function(event) {
    //                 if (event.key === "Backspace") {
    //                     inputs[i].value = '';
    //                     if (i !== 0) inputs[i - 1].focus();
    //                 } else {
    //                     if (i === inputs.length - 1 && inputs[i].value !== '') {
    //                         // If the last input is filled, submit the form
    //                         document.querySelector('form').submit();
    //                         return true;
    //                     } else if ((event.keyCode > 47 && event.keyCode < 58) || (event.keyCode > 95 &&
    //                             event.keyCode < 106)) {
    //                         inputs[i].value = event.key;
    //                         if (i !== inputs.length - 1) inputs[i + 1].focus();
    //                         event.preventDefault();
    //                     } else if (event.keyCode > 64 && event.keyCode < 91) {
    //                         inputs[i].value = String.fromCharCode(event.keyCode);
    //                         if (i !== inputs.length - 1) inputs[i + 1].focus();
    //                         event.preventDefault();
    //                     }
    //                 }
    //             });
    //             // Allow pasting values into the inputs
    //             inputs[i].addEventListener('paste', function(event) {
    //                 event.preventDefault();
    //                 const pastedText = event.clipboardData.getData('text');
    //                 if (pastedText.length === 6 && /^\d+$/.test(pastedText)) {
    //                     for (let j = 0; j < inputs.length; j++) {
    //                         inputs[j].value = pastedText[j];
    //                     }
    //                     document.querySelector('form').submit();
    //                 }
    //             });
    //         }
    //     }
    //     OTPInput();
    // });

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
            const countdownElement = document.getElementById('countdown');
            const backToLogin = document.getElementById('backToLogin');
            if (seconds > 0) {
                countdownElement.textContent = `OTP expires in ${seconds} seconds`;
            } else {
                countdownElement.textContent = 'OTP has expired';
                document.getElementById('first').disabled = true;
                document.getElementById('second').disabled = true;
                document.getElementById('third').disabled = true;
                document.getElementById('fourth').disabled = true;
                document.getElementById('fifth').disabled = true;
                document.getElementById('sixth').disabled = true;
                document.getElementById('validate').disabled = true;
                // const backToLogin = document.getElementById('backtologin'); // Corrected ID here
                // if (backToLogin) {
                //     // Show the backToLogin element
                //     backToLogin.style.display = 'block';
                // }


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
