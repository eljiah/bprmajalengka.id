<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pengajuan Kredit Diterima - Bank Majalengka</title>
</head>
<body>
  <p>Yth. {{ $loan->nama }},</p>
  <p>Pengajuan kredit Anda telah kami terima dan tercatat di sistem Bank Majalengka.</p>
  <p>Nomor referensi pengajuan Anda: <strong>{{ $loan->reference_code }}</strong></p>
  <p>Simpan nomor referensi tersebut untuk keperluan tindak lanjut. Petugas kami akan menghubungi Anda melalui kontak yang telah diberikan.</p>
  <p>Email ini adalah tanda terima otomatis, bukan persetujuan kredit.</p>
</body>
</html>
