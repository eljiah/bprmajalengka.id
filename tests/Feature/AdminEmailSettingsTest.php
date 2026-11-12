<?php

namespace Tests\Feature;

use App\Models\EmailLog;
use App\Models\User;
use App\Services\EmailDeliveryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use RuntimeException;
use Tests\TestCase;

class AdminEmailSettingsTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->admin = User::where('email', 'admin@bankmajalengka.co.id')->firstOrFail();
    }

    public function test_admin_can_send_test_email_and_view_email_logs(): void
    {
        Mail::fake();

        $this->actingAs($this->admin)
            ->from(route('admin.settings.index'))
            ->post(route('admin.settings.testEmail'), ['email' => 'uji@example.com'])
            ->assertRedirect(route('admin.settings.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('email_logs', [
            'recipient' => 'uji@example.com',
            'type' => 'test',
            'status' => 'sent',
        ]);

        $this->actingAs($this->admin)
            ->get(route('admin.settings.index'))
            ->assertOk()
            ->assertSee('Pemeriksaan Email & Log Pengiriman', false)
            ->assertSee('uji@example.com')
            ->assertSee('Uji pengiriman');
    }

    public function test_email_delivery_failures_are_saved_in_the_log(): void
    {
        $sent = app(EmailDeliveryService::class)->send(
            'gagal@example.com',
            'test',
            fn () => throw new RuntimeException('SMTP connection failed')
        );

        $this->assertFalse($sent);
        $this->assertDatabaseHas('email_logs', [
            'recipient' => 'gagal@example.com',
            'type' => 'test',
            'status' => 'failed',
            'error' => 'SMTP connection failed',
        ]);
    }

    public function test_test_email_requires_a_valid_recipient(): void
    {
        $this->actingAs($this->admin)
            ->post(route('admin.settings.testEmail'), ['email' => 'not-an-email'])
            ->assertSessionHasErrors('email');

        $this->assertSame(0, EmailLog::count());
    }
}
