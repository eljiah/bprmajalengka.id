<?php

namespace App\Services;

use App\Models\EmailLog;
use Illuminate\Support\Facades\Log;
use Throwable;

class EmailDeliveryService
{
    public function send(?string $recipient, string $type, callable $dispatch, ?string $reference = null): bool
    {
        $emailLog = EmailLog::create([
            'recipient' => $recipient,
            'type' => $type,
            'reference' => $reference,
            'status' => 'pending',
            'mailer' => (string) config('mail.default'),
        ]);

        try {
            $dispatch();
            $emailLog->update([
                'status' => 'sent',
                'sent_at' => now(),
            ]);

            return true;
        } catch (Throwable $exception) {
            $emailLog->update([
                'status' => 'failed',
                'error' => mb_substr($exception->getMessage(), 0, 4000),
            ]);

            Log::error('Email delivery failed.', [
                'email_log_id' => $emailLog->id,
                'type' => $type,
                'recipient' => $recipient,
                'exception' => $exception,
            ]);

            return false;
        }
    }

    public function recordFailure(?string $recipient, string $type, string $error, ?string $reference = null): EmailLog
    {
        $emailLog = EmailLog::create([
            'recipient' => $recipient,
            'type' => $type,
            'reference' => $reference,
            'status' => 'failed',
            'mailer' => (string) config('mail.default'),
            'error' => mb_substr($error, 0, 4000),
        ]);

        Log::error('Email delivery could not be attempted.', [
            'email_log_id' => $emailLog->id,
            'type' => $type,
            'recipient' => $recipient,
            'error' => $error,
        ]);

        return $emailLog;
    }
}
