<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailLog;
use App\Models\Setting;
use App\Services\EmailDeliveryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = Setting::all()->groupBy('group');
        $rawSettings = Setting::getAllKeyValues();
        $emailLogs = EmailLog::latest()->paginate(15);
        $mailer = config('mail.default');

        return view('admin.settings.index', compact('settings', 'rawSettings', 'emailLogs', 'mailer'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Pengaturan profil dan kontak BPR Majalengka berhasil diperbarui!');
    }

    public function testEmail(Request $request, EmailDeliveryService $emailDelivery): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $recipient = $validated['email'];
        $sent = $emailDelivery->send($recipient, 'test', function () use ($recipient): void {
            Mail::raw(
                'Email ini dikirim untuk menguji konfigurasi pengiriman email Perumda BPR Majalengka.',
                function ($message) use ($recipient): void {
                    $message->to($recipient)->subject('Uji Pengiriman Email - Bank Majalengka');
                }
            );
        });

        if ($sent) {
            $mailer = config('mail.default');

            return back()->with('success', "Email uji diserahkan ke mailer {$mailer} untuk {$recipient}. Periksa kotak masuk dan folder spam.");
        }

        return back()->with('info', 'Email uji gagal dikirim. Rincian kegagalan tersimpan pada log pengiriman di bawah.');
    }
}
