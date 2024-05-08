<!DOCTYPE html>
<html>

<head>
    <title>Welcome to FNRI Translate</title>
</head>

<body style="margin: 0; padding: 0; background-color: #004AAD;">
    <table style="height: 600px;" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
        <tr>
            <td align="center" valign="top" style="padding: 50px 0;">
                <div class="card"
                    style="margin-top:120px; width: 100%; max-width: 400px; background-color: white; padding: 20px; border-radius: 10px;">
                    {{-- <img src="C:\wamp\www\translation\public\impact_design\front\assets\img\brand\TRANSLATE.png"
                        alt="Logo" class="logo" style="display: block; margin: 0 auto; max-width: 100%;"> --}}
                    <h1 style="text-align: center; margin-top: 20px;">Welcome {{ $notifiable->name }}!</h1>
                    <h1 style="text-align: center; font-weight: bold;">{{ $notifiable->code }}</h1>
                    <p style="text-align: center;">This is your verification code.</p>
                    <p style="text-align: center;">Thank you for using our application!</p>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
