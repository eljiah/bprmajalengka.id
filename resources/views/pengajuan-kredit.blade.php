@extends('layouts.public-form')

@section('title', 'Pengajuan Kredit')

@section('content')
  <section class="bg-slate-100 px-4 py-12 sm:py-16">
    <div class="mx-auto my-2 max-w-2xl overflow-hidden rounded-3xl bg-white shadow-2xl">
      <div class="bg-bpr-navy p-6 text-white sm:p-8">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-400">FORMULIR PERMOHONAN</span>
        <h1 class="text-xl font-extrabold text-white sm:text-2xl">Form Pengajuan Kredit Online</h1>
      </div>

      <form id="credit-form" class="space-y-5 p-6 sm:p-8">
        <p class="mb-2 text-xs text-slate-500">
          Silakan lengkapi formulir permohonan pinjaman di bawah ini sesuai dokumen KTP yang sah. Tanda bintang (<span class="font-bold text-red-500">*</span>) wajib diisi.
        </p>

        <label for="credit-nik" class="block text-xs font-bold uppercase text-slate-700">
          NIK (Nomor Induk Kependudukan) <span class="text-red-500">*</span>
          <input id="credit-nik" name="nik" type="text" required inputmode="numeric" pattern="[0-9]{16}" maxlength="16" placeholder="Contoh: 3210123456780001 (16 Digit)" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 font-mono text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
        </label>

        <label for="credit-name" class="block text-xs font-bold uppercase text-slate-700">
          Nama Lengkap Debitur <span class="text-red-500">*</span>
          <input id="credit-name" name="nama" type="text" required maxlength="150" placeholder="Sesuai nama pada KTP asli" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
        </label>

        <label for="credit-address" class="block text-xs font-bold uppercase text-slate-700">
          Alamat KTP Lengkap <span class="text-red-500">*</span>
          <textarea id="credit-address" name="alamat" required rows="2" placeholder="Nama Jalan, No. Rumah, RT/RW, Dusun, Desa/Kelurahan, Kecamatan, Kabupaten" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20"></textarea>
        </label>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
          <label for="credit-phone" class="block text-xs font-bold uppercase text-slate-700">
            Kontak / Nomor HP (WhatsApp) <span class="text-red-500">*</span>
            <input id="credit-phone" name="hp" type="tel" required maxlength="25" placeholder="08xxxxxxxxxx" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
          </label>
          <label for="credit-affiliate" class="block text-xs font-bold uppercase text-slate-700">
            Kode Afiliasi / Rekomendasi
            <input id="credit-affiliate" name="afiliasi" type="text" placeholder="Silakan isi jika ada" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
          </label>
        </div>

        <label for="credit-email" class="block text-xs font-bold uppercase text-slate-700">
          Alamat Email Aktif <span class="text-red-500">*</span>
          <input id="credit-email" name="email" type="email" required maxlength="150" autocomplete="email" placeholder="alamat.email@anda.com" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
          <span class="mt-1 block text-[10px] font-normal normal-case text-slate-400">Tanda terima pengajuan akan dikirim ke alamat email ini.</span>
        </label>

        <label for="credit-product" class="block text-xs font-bold uppercase text-slate-700">
          Produk Kredit
          <select id="credit-product" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
            <option value="">Pilih produk (opsional)</option>
            @foreach($creditProducts as $product)
              <option value="{{ $product->name }}">{{ $product->name }}</option>
            @endforeach
          </select>
        </label>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
          <label for="credit-amount" class="block text-xs font-bold uppercase text-slate-700">
            Besar Pengajuan Pinjaman (Rp) <span class="text-red-500">*</span>
            <input id="credit-amount" name="nominal" type="number" min="1000000" step="500000" value="25000000" required class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-bold text-bpr-navy transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
          </label>
          <label for="credit-tenor" class="block text-xs font-bold uppercase text-slate-700">
            Jangka Waktu Pinjaman (Bulan) <span class="text-red-500">*</span>
            <select id="credit-tenor" name="tenor" required class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
              <option value="6">6 Bulan</option>
              <option value="12">12 Bulan (1 Tahun)</option>
              <option value="24" selected>24 Bulan (2 Tahun)</option>
              <option value="36">36 Bulan (3 Tahun)</option>
              <option value="48">48 Bulan (4 Tahun)</option>
              <option value="60">60 Bulan (5 Tahun)</option>
            </select>
          </label>
        </div>

        <label for="credit-purpose" class="block text-xs font-bold uppercase text-slate-700">
          Tujuan Kredit <span class="text-red-500">*</span>
          <input id="credit-purpose" name="tujuan" type="text" required placeholder="Contoh: Tambahan Modal Warung Sembako / Renovasi Rumah" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
        </label>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
          <label for="credit-income-source" class="block text-xs font-bold uppercase text-slate-700">
            Sumber Pendapatan Utama <span class="text-red-500">*</span>
            <select id="credit-income-source" name="sumber" required class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
              <option value="Usaha Perdagangan/UMKM">Usaha Perdagangan / UMKM</option>
              <option value="Gaji Pegawai Swasta/Pabrik">Gaji Pegawai Swasta / Pabrik</option>
              <option value="Gaji ASN/PPPK/Honorer">Gaji ASN / PPPK / Honorer</option>
              <option value="Hasil Pertanian/Perkebunan">Hasil Pertanian / Perkebunan</option>
              <option value="Uang Pensiun">Uang Pensiun</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </label>
          <label for="credit-income" class="block text-xs font-bold uppercase text-slate-700">
            Pendapatan Tetap / Bulan (Rp) <span class="text-red-500">*</span>
            <input id="credit-income" name="pendapatanTetap" type="number" required placeholder="Contoh: 5000000" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
          </label>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
          <label for="credit-other-income" class="block text-xs font-bold uppercase text-slate-700">
            Pendapatan Lainnya (Rp)
            <input id="credit-other-income" name="pendapatanLain" type="text" placeholder="Opsional (jika ada)" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
          </label>
          <label for="credit-other-income-description" class="block text-xs font-bold uppercase text-slate-700">
            Deskripsi Pendapatan Lain
            <input id="credit-other-income-description" name="deskripsiLain" type="text" placeholder="Opsional" class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
          </label>
        </div>

        <label for="credit-collateral" class="block text-xs font-bold uppercase text-slate-700">
          Keterangan Agunan Berupa <span class="text-red-500">*</span>
          <select id="credit-collateral" name="agunan" required class="mt-1 w-full rounded-xl bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
            <option value="BPKB Sepeda Motor">BPKB Sepeda Motor</option>
            <option value="BPKB Mobil / Armada Niaga">BPKB Mobil / Armada Niaga</option>
            <option value="Sertifikat Hak Milik (SHM) / SHGB">Sertifikat Hak Milik (SHM) / SHGB Tanah-Bangunan</option>
            <option value="Akta Jual Beli (AJB)">Akta Jual Beli (AJB) Terverifikasi</option>
            <option value="SK Pengangkatan Asli (ASN/PPPK)">SK Pengangkatan Asli (Khusus ASN/PPPK)</option>
            <option value="Bilyet Deposito BPR Majalengka">Bilyet Deposito BPR Majalengka</option>
            <option value="Hak Pemakaian Tempat Dasaran (Kios/Los)">Hak Pemakaian Tempat Dasaran (Kios/Los Pasar)</option>
          </select>
        </label>

        <div class="flex flex-col items-center justify-between gap-4 rounded-xl bg-slate-100/70 p-4 sm:flex-row">
          <div class="flex flex-col items-center gap-3 sm:flex-row">
            <span class="text-center text-xs text-slate-700 sm:text-left"><strong class="font-bold">Konfirmasi Keamanan.</strong> Mohon selesaikan hitungan sederhana di samping ini untuk melanjutkan.</span>
            <span id="credit-captcha-question" class="whitespace-nowrap rounded-lg bg-bpr-navy px-3 py-1.5 text-sm font-extrabold tracking-wider text-amber-300">7 + 5 = ?</span>
            <button type="button" id="credit-captcha-refresh" class="inline-flex items-center gap-1 text-xs font-semibold text-bpr-blue hover:underline" title="Acak Soal Baru">
              <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
              Ganti
            </button>
          </div>
          <input id="credit-captcha-answer" type="number" required placeholder="Jawaban..." class="w-full rounded-lg bg-white px-3 py-2 text-center text-sm font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-bpr-blue/20 sm:w-36">
        </div>

        <p id="form-message" role="status" aria-live="polite" class="text-sm"></p>
        <button type="submit" class="w-full rounded-xl bg-bpr-blue px-4 py-3.5 text-sm font-extrabold uppercase tracking-wider text-white shadow-lg transition-all hover:bg-bpr-blue-hover">
          Kirim Pengajuan Kredit
        </button>
      </form>
    </div>
  </section>

  <script>
    const form = document.getElementById('credit-form');
    const message = document.getElementById('form-message');
    const captchaQuestion = document.getElementById('credit-captcha-question');
    const captchaAnswer = document.getElementById('credit-captcha-answer');
    const captchaRefresh = document.getElementById('credit-captcha-refresh');
    let captchaResult = 0;

    function generateCaptcha() {
      let num1 = Math.floor(Math.random() * 16) + 3;
      let num2 = Math.floor(Math.random() * 11) + 2;
      const operator = ['+', '-', '×', '÷'][Math.floor(Math.random() * 4)];

      if (operator === '-') {
        if (num1 < num2) [num1, num2] = [num2, num1];
        captchaResult = num1 - num2;
      } else if (operator === '×') {
        num1 = Math.floor(Math.random() * 8) + 2;
        num2 = Math.floor(Math.random() * 8) + 2;
        captchaResult = num1 * num2;
      } else if (operator === '÷') {
        num2 = Math.floor(Math.random() * 8) + 2;
        captchaResult = Math.floor(Math.random() * 8) + 2;
        num1 = num2 * captchaResult;
      } else {
        captchaResult = num1 + num2;
      }

      captchaQuestion.textContent = `${num1} ${operator} ${num2} = ?`;
      captchaAnswer.value = '';
    }

    generateCaptcha();
    captchaRefresh.addEventListener('click', generateCaptcha);

    form.addEventListener('submit', async (event) => {
      event.preventDefault();
      if (Number(captchaAnswer.value) !== captchaResult) {
        message.textContent = 'Hasil perhitungan CAPTCHA salah. Silakan coba lagi.';
        message.className = 'text-sm text-red-700';
        generateCaptcha();
        captchaAnswer.focus();
        return;
      }

      const payload = Object.fromEntries(new FormData(form));
      const selectedProduct = document.getElementById('credit-product').value;
      if (selectedProduct) payload.tujuan = `Pengajuan Produk: ${selectedProduct} - ${payload.tujuan}`;
      message.textContent = 'Mengirim pengajuan...';
      message.className = 'text-sm text-slate-600';
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
        if (result.success) generateCaptcha();
      } catch {
        message.textContent = 'Tidak dapat terhubung ke server. Silakan coba kembali.';
        message.className = 'text-sm text-red-700';
      }
    });
  </script>
@endsection
