<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Pengajuan Kredit - {{ $settings['company_name'] ?? 'Bank Majalengka' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
  <main class="mx-auto max-w-3xl px-4 py-10">
    <a href="{{ route('home') }}" class="text-sm font-semibold text-blue-800 hover:underline">&larr; Kembali ke Beranda</a>
    <section class="mt-5 rounded-2xl bg-white p-6 shadow sm:p-8">
      <h1 class="text-2xl font-bold text-slate-900">Pengajuan Kredit</h1>
      <p class="mt-2 text-sm text-slate-600">Lengkapi data berikut untuk mengajukan kredit kepada {{ $settings['company_name'] ?? 'Bank Majalengka' }}.</p>
      <form id="credit-form" class="mt-6 space-y-4">
        <label class="block text-sm font-medium">NIK (16 digit)
          <input name="nik" required inputmode="numeric" pattern="[0-9]{16}" maxlength="16" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Nama lengkap
          <input name="nama" required maxlength="150" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Alamat sesuai KTP
          <textarea name="alamat" required rows="3" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2"></textarea>
        </label>
        <label class="block text-sm font-medium">Nomor telepon / WhatsApp
          <input name="hp" required maxlength="25" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Email
          <input name="email" type="email" required maxlength="150" autocomplete="email" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
          <span class="mt-1 block text-xs text-slate-500">Tanda terima pengajuan akan dikirim ke alamat email ini.</span>
        </label>
        <label class="block text-sm font-medium">Produk kredit
          <select id="credit-product" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
            <option value="">Pilih produk (opsional)</option>
            @foreach($creditProducts as $product)
              <option value="{{ $product->name }}">{{ $product->name }}</option>
            @endforeach
          </select>
        </label>
        <label class="block text-sm font-medium">Kode afiliasi (opsional)
          <input name="afiliasi" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Jumlah pengajuan (Rp)
          <input name="nominal" type="number" min="500000" required class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Tenor (bulan)
          <input name="tenor" type="number" min="1" max="120" required class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Tujuan pengajuan
          <input name="tujuan" required class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Sumber pendapatan
          <input name="sumber" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Pendapatan tetap per bulan (Rp)
          <input name="pendapatanTetap" type="number" min="0" required class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Pendapatan lain (opsional)
          <input name="pendapatanLain" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Deskripsi pendapatan lain (opsional)
          <input name="deskripsiLain" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <label class="block text-sm font-medium">Agunan
          <input name="agunan" required class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2">
        </label>
        <p id="form-message" role="status" class="text-sm" aria-live="polite"></p>
        <button class="w-full rounded-lg bg-blue-800 px-4 py-3 font-bold text-white hover:bg-blue-900">Kirim Pengajuan</button>
      </form>
    </section>
  </main>
  <script>
    const form = document.getElementById('credit-form');
    const message = document.getElementById('form-message');
    form.addEventListener('submit', async (event) => {
      event.preventDefault();
      const payload = Object.fromEntries(new FormData(form));
      const selectedProduct = document.getElementById('credit-product').value;
      if (selectedProduct) payload.tujuan = `Pengajuan Produk: ${selectedProduct} - ${payload.tujuan}`;
      message.textContent = 'Mengirim pengajuan...';
      try {
        const response = await fetch(@json(route('pengajuan.submit')), {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify(payload)
        });
        const result = await response.json();
        message.textContent = result.success
          ? `${result.message} Nomor tiket: ${result.data.reference_code}`
          : (result.message || 'Pengajuan gagal dikirim.');
        const emailsSent = result.success
          && result.data.applicant_email_notified
          && result.data.bank_email_notified;
        message.className = `text-sm ${result.success ? (emailsSent ? 'text-emerald-700' : 'text-amber-700') : 'text-red-700'}`;
        if (result.success) form.reset();
      } catch {
        message.textContent = 'Tidak dapat terhubung ke server. Silakan coba kembali.';
        message.className = 'text-sm text-red-700';
      }
    });
  </script>
</body>
</html>
