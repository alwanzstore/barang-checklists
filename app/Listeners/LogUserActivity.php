<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use App\Models\ActivityLog;

class LogUserActivity
{
    public function handle($event): void
    {
        if ($event instanceof Login) {
            $aktivitas = 'Login ke sistem';
            $userId = $event->user->id;
        } elseif ($event instanceof Logout) {
            $aktivitas = 'Logout dari sistem';
            $userId = $event->user->id;
        } elseif ($event instanceof Registered) {
            $aktivitas = 'Mendaftar sebagai user baru';
            $userId = $event->user->id;
        } else {
            return;
        }

        ActivityLog::create([
            'user_id' => $userId,
            'aktivitas' => $aktivitas,
        ]);
    }
}
