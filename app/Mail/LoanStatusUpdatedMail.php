<?php

namespace App\Mail;

use App\Models\LoanApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoanStatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public LoanApplication $loan,
        public string $previousStatus = ''
    ) {
    }

    public function envelope(): Envelope
    {
        $statusText = match ($this->loan->status) {
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            'contacted' => 'Telah Dihubungi Petugas',
            default => 'Pembaruan Analisis',
        };

        return new Envelope(
            from: new Address(
                config('mail.from.address', 'layanan@bankmajalengka.co.id'),
                config('mail.from.name', 'Layanan Nasabah Bank Majalengka')
            ),
            subject: "[{$this->loan->reference_code}] Pembaruan Status Pengajuan Kredit: {$statusText} - Bank Majalengka",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.loan_status_updated',
        );
    }
}
