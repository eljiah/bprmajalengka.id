<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') - {{ $settings['company_name'] ?? 'Perumda BPR Majalengka' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'bpr-navy': '#002D62',
            'bpr-navy-dark': '#001A3A',
            'bpr-navy-light': '#0B3C7B',
            'bpr-blue': '#0066CC',
            'bpr-blue-hover': '#0050A0',
            'bpr-blue-light': '#EBF3FC',
            'bpr-gold': '#F59E0B',
            'bpr-gold-dark': '#D97706',
          },
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
          },
        },
      },
    };
  </script>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
  <div class="hidden border-b border-white/10 bg-bpr-navy-dark py-2 text-xs text-slate-300 md:block">
    <div class="mx-auto flex max-w-[1400px] items-center justify-between px-4 sm:px-6">
      <div class="flex items-center gap-2.5">
        <span class="font-bold tracking-wide text-amber-400">BUMD Kab. Majalengka</span>
        <span class="text-white/20">•</span>
        <span>Berizin &amp; Diawasi OJK &amp; BI</span>
        <span class="text-white/20">•</span>
        <span>Penjaminan LPS s/d Rp 2 Miliar</span>
      </div>
      <a href="tel:{{ preg_replace('/[^0-9]/', '', $settings['phone_central'] ?? '0233281144') }}" class="hover:text-white">
        {{ $settings['phone_central'] ?? '(0233) 281144' }}
      </a>
    </div>
  </div>

  <header class="sticky top-0 z-40 bg-bpr-navy shadow-lg">
    <div class="mx-auto flex h-20 max-w-[1400px] items-center justify-between gap-4 px-4 sm:px-6">
      <a href="{{ route('home') }}" class="flex shrink-0 items-center rounded-xl bg-white px-2.5 py-1 shadow-sm">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Perumda BPR Majalengka" class="h-9 w-auto object-contain">
      </a>

      <nav class="hidden items-center gap-1 lg:flex">
        <a href="{{ route('home') }}" class="rounded-lg px-3 py-1.5 text-[13px] font-semibold text-white hover:text-amber-400">Beranda</a>
        <a href="{{ route('home') }}#tentang-kami" class="rounded-lg px-3 py-1.5 text-[13px] font-semibold text-white/90 hover:text-amber-400">Tentang</a>
        <a href="{{ route('home') }}#produk" class="rounded-lg px-3 py-1.5 text-[13px] font-semibold text-white/90 hover:text-amber-400">Produk &amp; Layanan</a>
        <a href="{{ route('home') }}#simulasi-kredit" class="rounded-lg px-3 py-1.5 text-[13px] font-semibold text-white/90 hover:text-amber-400">Simulasi Kredit</a>
        <a href="{{ route('pengaduan.page') }}" class="rounded-lg px-3 py-1.5 text-[13px] font-bold text-amber-300 hover:text-amber-400">Pengaduan</a>
      </nav>

      <div class="hidden items-center gap-3 sm:flex">
        <a href="{{ route('pengajuan.form') }}" class="rounded-xl bg-amber-400 px-4 py-2 text-xs font-bold uppercase text-bpr-navy-dark shadow-md transition hover:bg-amber-300">Ajukan Pinjaman</a>
      </div>

      <details class="relative lg:hidden">
        <summary class="flex h-10 w-10 cursor-pointer list-none items-center justify-center rounded-lg text-white hover:bg-white/10" aria-label="Buka menu">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </summary>
        <nav class="absolute right-0 top-12 z-50 flex w-64 flex-col gap-1 rounded-2xl border border-slate-100 bg-white p-3 text-sm shadow-xl">
          <a href="{{ route('home') }}" class="rounded-lg px-3 py-2.5 font-semibold hover:bg-slate-100">Beranda</a>
          <a href="{{ route('home') }}#tentang-kami" class="rounded-lg px-3 py-2.5 font-semibold hover:bg-slate-100">Tentang</a>
          <a href="{{ route('home') }}#produk" class="rounded-lg px-3 py-2.5 font-semibold hover:bg-slate-100">Produk &amp; Layanan</a>
          <a href="{{ route('home') }}#simulasi-kredit" class="rounded-lg px-3 py-2.5 font-semibold hover:bg-slate-100">Simulasi Kredit</a>
          <a href="{{ route('pengaduan.page') }}" class="rounded-lg bg-amber-50 px-3 py-2.5 font-bold text-amber-900">Pengaduan Nasabah</a>
          <a href="{{ route('pengajuan.form') }}" class="mt-2 rounded-xl bg-amber-400 px-3 py-3 text-center font-bold text-bpr-navy-dark">Ajukan Pinjaman Online</a>
        </nav>
      </details>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="bg-bpr-navy-dark text-slate-300">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-8 text-xs sm:flex-row sm:items-center sm:justify-between sm:px-6">
      <p>&copy; {{ date('Y') }} {{ $settings['company_name'] ?? 'Perumda BPR Majalengka' }}. Amanah, Kokoh &amp; Terpercaya.</p>
      <a href="{{ route('home') }}" class="font-semibold text-amber-300 hover:text-amber-200">Kembali ke Beranda</a>
    </div>
  </footer>
</body>
</html>
