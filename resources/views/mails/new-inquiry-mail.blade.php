<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nowe zapytanie o pracę</title>
</head>
<body style="font-family: Inter, ui-sans-serif, system-ui, sans-serif; text-align: center; color: #0A0049;">
    @if (app()->environment('local'))
        <img src="https://placehold.co/319x60/FFF/1B00BF.png/?text=clickforjob" width="319" height="60" />
    @else
        <img src="{{ config('app.url') }}/logo.png" width="319" height="60" />
    @endif
    <h1>Nowe zapytanie o pracę w {{ config('app.name') }}</h1>
    <p style="font-size: 20px; margin-top: 30px;">
        Użytkownik {{ $inquiry->user->name }} napisał do Ciebie.
    </p>
    <p style="margin-top: 30px;">
        <a href="{{ config('app.url') }}/jobs/{{ $inquiry->job_id }}/inquiries" target="_blank"
            style="text-decoration: none; color: #fff; padding: 10px; border-radius: 20px; background-color: #1B00BF;"
            >
            Kliknij tutaj aby przejść do serwisu
        </a>
    </p>
    <p style="font-size: 20px; margin-top: 30px;">Dziękujemy!</p>
</body>
</html>
