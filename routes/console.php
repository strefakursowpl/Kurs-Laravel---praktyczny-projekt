<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('test:command {msg} {--id=0}', function(string $msg, string $id) {
    $this->info("Twoja komenda: $msg, ID: $id");
    $this->line("Twoja komenda: $msg, ID: $id");
    $this->question("Twoja komenda: $msg, ID: $id");
    $this->comment("Twoja komenda: $msg, ID: $id");
    $this->warn("Twoja komenda: $msg, ID: $id");
    $this->error("Twoja komenda: $msg, ID: $id");

    // $this->fail('Niestety wystąpił błąd!');

    $name = $this->ask('Jak masz na imię?');
    $this->confirm('Czy kontynuować?');
    $role = $this->choice('Wybierz rolę', ['Administrator', 'Moderator', 'Użytkownik']);
    $this->info($name);
    $this->comment('Twoja rola to: '.$role);
})->purpose('Komenda na cele edukacyjne');
