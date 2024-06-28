@component('mail::message')
# Account Activation and Email Verification

Click the button below to verify your email address and activate your account.

@component('mail::button', ['url' => $actionUrl])
Verify Email
@endcomponent

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
