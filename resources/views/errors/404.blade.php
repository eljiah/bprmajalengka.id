<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - Halaman Tidak Ditemukan | Perumda BPR Majalengka</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'bpr-navy': '#002D62',
            'bpr-dark': '#001A3A',
            'bpr-blue': '#0066CC',
            'bpr-amber': '#F59E0B',
          },
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gradient-to-br from-bpr-dark via-bpr-navy to-slate-900 min-h-screen flex items-center justify-center p-4">

  <div class="w-full max-w-lg text-center">
    <!-- Brand Header -->
    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-white shadow-xl mb-4 border border-white/20">
      <span class="text-2xl font-black text-bpr-navy tracking-tight">BM</span>
    </div>
    <h1 class="text-lg font-bold text-white/80 uppercase tracking-widest">PERUMDA BPR MAJALENGKA</h1>

    <!-- Card -->
    <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-2xl border border-white/20 mt-6 text-center">
      <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-amber-50 text-amber-500 mb-5 border-4 border-amber-100">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
      </div>

      <div class="font-mono text-xs font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-full inline-block uppercase tracking-wider mb-2">
        Error 404 • Not Found
      </div>
      <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight mb-2">Halaman atau Berkas Tidak Ditemukan</h2>
      <p class="text-sm text-slate-500 max-w-md mx-auto leading-relaxed mb-6">
        Data atau tautan yang Anda akses mungkin telah dihapus dari sistem, dipindahkan, atau alamat URL yang dituju salah.
      </p>

      <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
        @auth
          <a href="{{ route('admin.loans.index') }}" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-bpr-navy hover:bg-bpr-blue text-white font-bold text-xs transition shadow-md flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <span>Daftar Pengajuan Pinjaman</span>
          </a>
          <a href="{{ route('admin.dashboard') }}" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition">
            Dashboard Admin
          </a>
        @else
          <a href="{{ route('home') }}" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-bpr-navy hover:bg-bpr-blue text-white font-bold text-xs transition shadow-md flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span>Kembali ke Beranda Utama</span>
          </a>
        @endauth
      </div>
    </div>

    <p class="text-xs text-blue-200/60 mt-6 font-medium">
      &copy; {{ date('Y') }} Perumda BPR Majalengka. Terdaftar dan diawasi Otoritas Jasa Keuangan (OJK).
    </p>
  </div>

</body>
</html>
