@extends('layouts.public-form')

@section('title', 'Pengaduan Nasabah')

@section('content')
  <section class="border-t border-slate-200 bg-slate-50 py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="mx-auto mb-12 max-w-3xl text-center">
        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1 text-[11px] font-extrabold uppercase tracking-widest text-bpr-navy">
          Saluran Pengaduan Nasabah &amp; Whistleblowing System
        </span>
        <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Layanan Pengaduan &amp; Bantuan Transaksi</h1>
        <p class="mt-2 text-sm leading-relaxed text-slate-600 sm:text-base">
          Kenyamanan dan keamanan perbankan Anda adalah prioritas kami. Sampaikan keluhan, pertanyaan transaksi, atau pelaporan indikasi kecurangan (fraud) melalui formulir terverifikasi di bawah ini.
        </p>
      </div>

      <div class="mb-8 flex items-center justify-center gap-2">
        <button type="button" id="tab-btn-form-pengaduan" class="rounded-xl bg-bpr-navy px-5 py-2.5 text-xs font-bold text-white shadow-sm transition-all">
          Isi Formulir Pengaduan
        </button>
        <button type="button" id="tab-btn-cek-pengaduan" class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-xs font-bold text-slate-700 transition-all hover:bg-slate-100">
          Lacak / Cek Status Pengaduan
        </button>
      </div>

      <div id="container-form-pengaduan" class="mx-auto max-w-3xl">
        <div class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-xl">
          <div class="flex flex-col items-start justify-between gap-4 bg-gradient-to-r from-bpr-navy to-bpr-navy-dark p-6 text-white sm:flex-row sm:items-center">
            <div>
              <span class="text-[10px] font-extrabold uppercase tracking-widest text-amber-400">FORMULIR ELEKTRONIK</span>
              <h2 class="mt-0.5 text-lg font-bold text-white">Formulir Pengaduan Nasabah Bank Majalengka</h2>
              <p class="mt-0.5 text-xs text-blue-200">Kode unik pengaduan akan otomatis terbit dan dikirimkan ke email Anda.</p>
            </div>
            <span class="flex shrink-0 items-center gap-1.5 rounded-xl bg-white/10 px-3 py-1.5 text-[11px] font-bold text-emerald-300">
              <svg class="h-3.5 w-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
              Proteksi Anti-Fraud Aktif
            </span>
          </div>

          <div class="flex items-start gap-3 border-b border-amber-200/80 bg-amber-50 p-4">
            <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            <p class="text-xs leading-relaxed text-amber-900">
              <strong>Peringatan Keamanan:</strong> Perumda BPR Majalengka <strong>tidak pernah meminta biaya</strong> penanganan pengaduan, PIN rekening, password, ataupun kode OTP perbankan Anda.
            </p>
          </div>

          <form id="complaint-form" class="space-y-5 p-6 sm:p-8" enctype="multipart/form-data">
            <div class="absolute -left-[9999px] opacity-0" aria-hidden="true">
              <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
              <input type="text" name="complaint_fax" tabindex="-1" autocomplete="off">
            </div>
            <input id="complaint-captcha-token" type="hidden" name="captcha_token" value="{{ $complaintCaptcha['token'] }}">
            <input id="complaint-form-load-token" type="hidden" name="form_load_token" value="{{ $complaintFormLoadToken }}">

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <label for="complaint-name" class="block text-xs font-bold uppercase text-slate-700">
                Nama Lengkap Pelapor <span class="text-red-500">*</span>
                <input id="complaint-name" name="nama" type="text" required maxlength="150" placeholder="Contoh: Budi Santoso" class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
              </label>
              <label for="complaint-email" class="block text-xs font-bold uppercase text-slate-700">
                Alamat Email Aktif <span class="text-red-500">*</span>
                <input id="complaint-email" name="email" type="email" required maxlength="150" placeholder="alamat.email@anda.com" class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
                <span class="mt-1 block text-[10px] font-normal normal-case text-slate-400">Kode unik &amp; informasi status akan dikirimkan ke email ini.</span>
              </label>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <label for="complaint-phone" class="block text-xs font-bold uppercase text-slate-700">
                Nomor HP / WhatsApp <span class="text-red-500">*</span>
                <input id="complaint-phone" name="telepon" type="tel" required maxlength="30" placeholder="08xxxxxxxxxx" class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
              </label>
              <label for="complaint-account" class="block text-xs font-bold uppercase text-slate-700">
                Nomor Rekening Bank Majalengka
                <input id="complaint-account" name="nomor_rekening" type="text" maxlength="50" placeholder="Opsional (jika terkait transaksi rekening)" class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-100/75 px-3.5 py-2.5 font-mono text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
              </label>
            </div>

            <label for="complaint-category" class="block text-xs font-bold uppercase text-slate-700">
              Kategori Pengaduan <span class="text-red-500">*</span>
              <select id="complaint-category" name="kategori" required class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
                <option value="pelayanan">Pelayanan Petugas / Kantor Kas</option>
                <option value="transaksi">Transaksi Perbankan / Setoran / Tarikan</option>
                <option value="kredit">Pengajuan Kredit / Pinjaman</option>
                <option value="tabungan_deposito">Produk Tabungan &amp; Deposito</option>
                <option value="kartu_atm">Kartu ATM / Saluran Elektronik</option>
                <option value="indikasi_fraud">Indikasi Penipuan / Fraud Mengatasnamakan Bank</option>
                <option value="lainnya">Lainnya</option>
              </select>
            </label>

            <label for="complaint-title" class="block text-xs font-bold uppercase text-slate-700">
              Judul / Pokok Masalah Pengaduan <span class="text-red-500">*</span>
              <input id="complaint-title" name="judul" type="text" required maxlength="200" placeholder="Ringkasan singkat kendala yang dialami" class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20">
            </label>

            <label for="complaint-detail" class="block text-xs font-bold uppercase text-slate-700">
              Uraian Kronologi Pengaduan <span class="text-red-500">*</span>
              <textarea id="complaint-detail" name="isi_pengaduan" required minlength="10" maxlength="5000" rows="4" placeholder="Jelaskan secara runtut tanggal, waktu, lokasi kantor kas (jika ada), serta detail kronologi pengaduan Anda..." class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-100/75 px-3.5 py-2.5 text-sm font-medium leading-relaxed normal-case text-slate-800 placeholder-slate-400 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-bpr-blue/20"></textarea>
            </label>

            <label for="complaint-attachment" class="block text-xs font-bold uppercase text-slate-700">
              Bukti Pendukung / Foto / Dokumen
              <input id="complaint-attachment" type="file" name="lampiran" accept=".jpg,.jpeg,.png,.pdf" class="mt-1 w-full cursor-pointer text-xs text-slate-500 file:mr-4 file:rounded-xl file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-xs file:font-bold file:text-bpr-blue hover:file:bg-blue-100">
              <span class="mt-1 block text-[10px] font-normal normal-case text-slate-400">Format diperbolehkan: JPG, PNG, atau PDF (Maksimal 3 MB). Opsional.</span>
            </label>

            <div class="flex flex-col items-center justify-between gap-4 rounded-xl bg-slate-100/70 p-4 sm:flex-row">
              <div class="flex flex-col items-center gap-3 sm:flex-row">
                <span class="text-center text-xs text-slate-700 sm:text-left"><strong class="font-bold">Konfirmasi Keamanan.</strong> Mohon selesaikan hitungan sederhana di samping ini untuk melanjutkan.</span>
                <span id="captcha-question" class="whitespace-nowrap rounded-xl bg-bpr-navy px-3 py-1.5 font-mono text-sm font-extrabold tracking-wider text-amber-300">{{ $complaintCaptcha['question'] }}</span>
                <button type="button" id="complaint-captcha-refresh" class="inline-flex items-center gap-1 text-xs font-semibold text-bpr-blue hover:underline" title="Acak Soal Baru">
                  <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                  Ganti
                </button>
              </div>
              <input id="complaint-captcha-answer" name="captcha_answer" type="number" required placeholder="Jawaban..." class="w-full rounded-lg bg-white px-3 py-2 text-center text-sm font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-bpr-blue/20 sm:w-36">
            </div>
            <p id="captcha-message" role="status" aria-live="polite" class="text-xs"></p>

            <p id="form-message" role="status" aria-live="polite" class="text-sm"></p>
            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-bpr-blue py-3.5 text-sm font-extrabold uppercase tracking-wider text-white shadow-lg transition-all hover:bg-bpr-blue-hover">
              Kirim Pengaduan Nasabah
            </button>
          </form>
        </div>
      </div>

      <div id="container-cek-pengaduan" class="mx-auto hidden max-w-2xl">
        <div class="space-y-6 rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xl sm:p-8">
          <div class="space-y-1 text-center">
            <div class="mx-auto mb-2 flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-bpr-blue">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <h2 class="text-xl font-extrabold text-slate-900">Lacak Status Pengaduan Anda</h2>
            <p class="text-xs text-slate-500">Masukkan kode unik pengaduan yang telah Anda terima setelah pengisian formulir atau di email.</p>
          </div>
          <form id="status-form" class="space-y-4">
            <label for="ticket-code" class="block text-xs font-bold uppercase text-slate-700">
              Kode Unik Pengaduan (Nomor Tiket)
              <div class="mt-1 flex gap-2">
                <input id="ticket-code" name="ticket_code" type="text" required placeholder="Contoh: BM-ADU-20261104-XXXX" class="min-w-0 flex-1 rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-3 font-mono text-sm font-bold normal-case text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-bpr-blue">
                <button type="submit" class="rounded-xl bg-bpr-blue px-4 text-xs font-bold text-white transition hover:bg-bpr-blue-hover">Cek Status</button>
              </div>
            </label>
          </form>
          <p id="status-message" role="status" aria-live="polite" class="text-sm"></p>
          <div id="status-result" class="hidden rounded-2xl border border-slate-200 bg-slate-50 p-5 text-sm"></div>
        </div>
      </div>
    </div>
  </section>

  <script>
    const formTab = document.getElementById('tab-btn-form-pengaduan');
    const statusTab = document.getElementById('tab-btn-cek-pengaduan');
    const complaintPanel = document.getElementById('container-form-pengaduan');
    const statusPanel = document.getElementById('container-cek-pengaduan');

    function showComplaintPanel(showStatus) {
      complaintPanel.classList.toggle('hidden', showStatus);
      statusPanel.classList.toggle('hidden', !showStatus);
      formTab.className = showStatus
        ? 'rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-xs font-bold text-slate-700 transition-all hover:bg-slate-100'
        : 'rounded-xl bg-bpr-navy px-5 py-2.5 text-xs font-bold text-white shadow-sm transition-all';
      statusTab.className = showStatus
        ? 'rounded-xl bg-bpr-navy px-5 py-2.5 text-xs font-bold text-white shadow-sm transition-all'
        : 'rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-xs font-bold text-slate-700 transition-all hover:bg-slate-100';
    }

    formTab.addEventListener('click', () => showComplaintPanel(false));
    statusTab.addEventListener('click', () => showComplaintPanel(true));

    const complaintForm = document.getElementById('complaint-form');
    const formMessage = document.getElementById('form-message');
    const captchaQuestion = document.getElementById('captcha-question');
    const captchaToken = document.getElementById('complaint-captcha-token');
    const formLoadToken = document.getElementById('complaint-form-load-token');
    const captchaAnswer = document.getElementById('complaint-captcha-answer');
    const captchaRefreshButton = document.getElementById('complaint-captcha-refresh');
    const captchaMessage = document.getElementById('captcha-message');

    async function refreshComplaintCaptcha() {
      captchaRefreshButton.disabled = true;
      captchaMessage.textContent = 'Memuat soal verifikasi...';
      captchaMessage.className = 'text-xs text-slate-600';
      try {
        const response = await fetch(@json(route('captcha.generate')), {
          headers: { 'Accept': 'application/json' },
        });
        const result = await response.json();
        if (!response.ok || !result.success || !result.data) {
          throw new Error(result.message || 'Soal verifikasi tidak dapat diperbarui.');
        }

        captchaQuestion.textContent = result.data.question;
        captchaToken.value = result.data.captcha_token;
        formLoadToken.value = result.data.form_load_token;
        captchaAnswer.value = '';
        captchaMessage.textContent = '';
      } catch {
        captchaMessage.textContent = 'Tidak dapat memuat soal verifikasi baru. Silakan coba kembali.';
        captchaMessage.className = 'text-xs text-red-700';
      } finally {
        captchaRefreshButton.disabled = false;
      }
    }

    captchaRefreshButton.addEventListener('click', refreshComplaintCaptcha);

    complaintForm.addEventListener('submit', async (event) => {
      event.preventDefault();
      formMessage.textContent = 'Mengirim pengaduan...';
      formMessage.className = 'text-sm text-slate-600';
      try {
        const response = await fetch(@json(route('pengaduan.submit')), {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          },
          body: new FormData(complaintForm),
        });
        const result = await response.json();
        formMessage.textContent = result.success
          ? `${result.message} Nomor tiket: ${result.data.ticket_code}`
          : (result.message || 'Pengaduan gagal dikirim.');
        formMessage.className = `text-sm ${result.success ? 'text-emerald-700' : 'text-red-700'}`;
        if (result.success) {
          complaintForm.reset();
          await refreshComplaintCaptcha();
        }
      } catch {
        formMessage.textContent = 'Tidak dapat terhubung ke server. Silakan coba kembali.';
        formMessage.className = 'text-sm text-red-700';
      }
    });

    const statusForm = document.getElementById('status-form');
    const statusMessage = document.getElementById('status-message');
    const statusResult = document.getElementById('status-result');
    statusForm.addEventListener('submit', async (event) => {
      event.preventDefault();
      statusResult.classList.add('hidden');
      statusMessage.textContent = 'Memeriksa status pengaduan...';
      statusMessage.className = 'text-sm text-slate-600';
      try {
        const code = new FormData(statusForm).get('ticket_code');
        const response = await fetch(`${@json(route('pengaduan.status'))}?code=${encodeURIComponent(code)}`, {
          headers: { 'Accept': 'application/json' },
        });
        const result = await response.json();
        if (!result.success) {
          statusMessage.textContent = result.message || 'Status pengaduan tidak dapat ditemukan.';
          statusMessage.className = 'text-sm text-red-700';
          return;
        }
        statusMessage.textContent = '';
        statusResult.innerHTML = '';
        const ticket = document.createElement('p');
        ticket.className = 'font-mono font-bold text-bpr-navy';
        ticket.textContent = result.data.ticket_code;
        const status = document.createElement('p');
        status.className = 'mt-2 font-bold text-slate-800';
        status.textContent = `Status: ${result.data.status_label}`;
        const note = document.createElement('p');
        note.className = 'mt-2 text-slate-600';
        note.textContent = result.data.catatan_petugas;
        statusResult.append(ticket, status, note);
        statusResult.classList.remove('hidden');
      } catch {
        statusMessage.textContent = 'Tidak dapat terhubung ke server. Silakan coba kembali.';
        statusMessage.className = 'text-sm text-red-700';
      }
    });

    // Detect URL parameter ?code= or hash #cek-pengaduan for seamless tracking from email
    const urlParams = new URLSearchParams(window.location.search);
    const codeParam = urlParams.get('code');
    const isStatusHash = window.location.hash === '#cek-pengaduan';
    if (codeParam || isStatusHash) {
      showComplaintPanel(true);
      if (codeParam) {
        const ticketInput = document.getElementById('ticket-code');
        if (ticketInput) {
          ticketInput.value = codeParam;
          statusForm.dispatchEvent(new Event('submit'));
        }
      }
    }
  </script>
@endsection
