<!-- resources/views/emails/rent-reminder.blade.php -->

@component('mail::message')
    # Rent Payment Reminder

    Dear {{ $application->tenant->name }},

    This is a reminder that your rent payment for Application #{{ $application->id }} is due.

    Please ensure to make the payment at your earliest convenience.

    Thank you,<br>
    {{ config('app.name') }}
@endcomponent
