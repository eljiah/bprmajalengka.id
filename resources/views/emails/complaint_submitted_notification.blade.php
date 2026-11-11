<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pengaduan Nasabah Baru - Bank Majalengka</title>
</head>
<body>
  <p>Pengaduan nasabah baru telah masuk ke sistem.</p>
  <p>Kode pengaduan: <strong>{{ $complaint->ticket_code }}</strong></p>
  <p>Kategori: {{ $complaint->kategori }}</p>
  <p>Silakan buka panel admin untuk meninjau pengaduan.</p>
</body>
</html>
