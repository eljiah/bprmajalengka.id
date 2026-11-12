<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    protected $fillable = [
        'recipient',
        'type',
        'reference',
        'status',
        'mailer',
        'error',
        'sent_at',
    ];

    protected function casts(): array
    {
        return [
            'sent_at' => 'datetime',
        ];
    }

    public function typeLabel(): string
    {
        return match ($this->type) {
            'test' => 'Uji pengiriman',
            'loan_receipt' => 'Konfirmasi pengajuan kredit',
            'loan_notification' => 'Notifikasi pengajuan kredit',
            'complaint_confirmation' => 'Konfirmasi pengaduan',
            'complaint_notification' => 'Notifikasi pengaduan',
            'complaint_status' => 'Perubahan status pengaduan',
            default => 'Email lainnya',
        };
    }
}
