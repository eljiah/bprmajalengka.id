<?php

namespace App\Mail;

use App\Models\LoanApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoanApplicationSubmittedNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public LoanApplication $loan)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                config('mail.from.address', 'layanan@bankmajalengka.co.id'),
                config('mail.from.name', 'Layanan Nasabah Bank Majalengka')
            ),
            subject: "[{$this->loan->reference_code}] Pengajuan Kredit Baru",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.loan_application_submitted_notification',
        );
    }
}
