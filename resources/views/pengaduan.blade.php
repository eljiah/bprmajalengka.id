<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Pengaduan Nasabah - {{ $settings['company_name'] ?? 'Bank Majalengka' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
  <main class="mx-auto max-w-3xl px-4 py-10">
    <a href="{{ route('home') }}" class="text-sm font-semibold text-blue-800 hover:underline">&larr; Kembali ke Beranda</a>
    <section class="mt-5 rounded-2xl bg-white p-6 shadow sm:p-8">
      <h1 class="text-2xl font-bold text-slate-900">Pengaduan Nasabah</h1>
      <p class="mt-2 text-sm text-slate-600">Sampaikan pengaduan Anda melalui formulir resmi {{ $settings['company_name'] ?? 'Bank Majalengka' }}.</p>
      <p class="mt-4 rounded-lg bg-amber-50 p-3 text-sm text-amber-900">Kami tidak pernah meminta PIN, kata sandi, atau kode OTP Anda.</p>

      <form id="complaint-form" class="mt-6 space-y-4" enctype="multipart/form-data">
        <div class="hidden" aria-hidden="true">
          <label for="website_hp">Website</label>
          <input id="website_hp" name="website_hp" tabindex="-1" autocomplete="off">
          <input name="complaint_fax" tabindex="-1" autocomplete="off">
        </div>
        <input type="hidden" name="captcha_token" value="{{ $complaintCaptcha['token'] }}">
        <input type="hidden" name="form_load_token" value="{{ $complaintFormLoadToken }}">

        <label class="block text-sm font-medium">Nama lengkap
          <input name="nama" required maxlength="150" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Email
          <input type="email" name="email" required maxlength="150" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Nomor telepon / WhatsApp
          <input name="telepon" required maxlength="30" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Nomor rekening (opsional)
          <input name="nomor_rekening" maxlength="50" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Kategori
          <select name="kategori" required class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
            <option value="pelayanan">Pelayanan Petugas / Kantor Kas</option>
            <option value="transaksi">Transaksi Perbankan</option>
            <option value="kredit">Pengajuan Kredit / Pinjaman</option>
            <option value="tabungan_deposito">Tabungan & Deposito</option>
            <option value="indikasi_fraud">Indikasi Penipuan / Fraud</option>
            <option value="lainnya">Lainnya</option>
          </select>
        </label>
        <label class="block text-sm font-medium">Judul pengaduan
          <input name="judul" required maxlength="200" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Uraian pengaduan
          <textarea name="isi_pengaduan" required minlength="10" maxlength="5000" rows="5" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2"></textarea>
        </label>
        <label class="block text-sm font-medium">Lampiran (opsional, JPG/PNG/PDF maks. 3 MB)
          <input type="file" name="lampiran" accept=".jpg,.jpeg,.png,.pdf" class="mt-1 block w-full text-sm">
        </label>
        <div class="rounded-lg bg-slate-50 p-4">
          <label class="block text-sm font-medium">
            Verifikasi: <span id="captcha-question">{{ $complaintCaptcha['question'] }}</span>
            <input name="captcha_answer" type="number" required class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2">
          </label>
        </div>
        <p id="form-message" role="status" class="text-sm" aria-live="polite"></p>
        <button class="w-full rounded-lg bg-blue-800 px-4 py-3 font-bold text-white hover:bg-blue-900">Kirim Pengaduan</button>
      </form>
    </section>
  </main>
  <script>
    const form = document.getElementById('complaint-form');
    const message = document.getElementById('form-message');
    form.addEventListener('submit', async (event) => {
      event.preventDefault();
      message.textContent = 'Mengirim pengaduan...';
      try {
        const response = await fetch(@json(route('pengaduan.submit')), {
          method: 'POST',
          headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
          body: new FormData(form)
        });
        const result = await response.json();
        message.textContent = result.success
          ? `${result.message} Nomor tiket: ${result.data.ticket_code}`
          : (result.message || 'Pengaduan gagal dikirim.');
        message.className = `text-sm ${result.success ? 'text-emerald-700' : 'text-red-700'}`;
        if (result.success) form.reset();
      } catch {
        message.textContent = 'Tidak dapat terhubung ke server. Silakan coba kembali.';
        message.className = 'text-sm text-red-700';
      }
    });
  </script>
</body>
</html>
