<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>[Notifikasi Internal] Pengaduan Nasabah Baru - Bank Majalengka</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f1f5f9; font-family: 'Plus Jakarta Sans', Arial, sans-serif; color: #1e293b; line-height: 1.6;">

  <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f1f5f9; padding: 24px 12px;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.06); max-width: 600px; width: 100%;">
          
          <!-- Header Banner -->
          <tr>
            <td style="background-color: #002D62; padding: 28px 32px; text-align: left;">
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <span style="display: inline-block; font-size: 11px; font-weight: 800; color: #F59E0B; letter-spacing: 2px; text-transform: uppercase;">
                      PERUMDA BPR MAJALENGKA &bull; SISTEM INTERNAL
                    </span>
                    <h1 style="color: #ffffff; margin: 4px 0 0; font-size: 20px; font-weight: 800;">
                      Notifikasi Pengaduan Nasabah Baru
                    </h1>
                  </td>
                  <td align="right" style="vertical-align: middle;">
                    <div style="background-color: rgba(255,255,255,0.15); color: #F59E0B; font-weight: 900; font-size: 16px; padding: 8px 14px; border-radius: 10px; display: inline-block;">
                      BM
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Main Content -->
          <tr>
            <td style="padding: 32px;">
              <p style="font-size: 14px; color: #475569; margin: 0 0 16px;">
                Pemberitahuan kepada Tim Layanan Nasabah & Kepatuhan,
              </p>
              <p style="font-size: 14px; color: #475569; margin: 0 0 20px;">
                Telah masuk laporan pengaduan baru melalui kanal portal web resmi Bank Majalengka. Rincian pengaduan adalah sebagai berikut:
              </p>

              <!-- Ticket Code Box -->
              <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border: 2px dashed #0066CC; border-radius: 12px; margin: 20px 0;">
                <tr>
                  <td style="padding: 18px 20px; text-align: center;">
                    <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 4px;">
                      NOMOR TIKET PENGADUAN
                    </span>
                    <span style="font-family: 'JetBrains Mono', Consolas, monospace; font-size: 22px; font-weight: 800; color: #002D62; letter-spacing: 2px; display: inline-block;">
                      {{ $complaint->ticket_code }}
                    </span>
                    <div style="margin-top: 6px; font-size: 12px; color: #64748b;">
                      Waktu Diterima: <strong>{{ $complaint->created_at->format('d/m/Y H:i') }} WIB</strong>
                    </div>
                  </td>
                </tr>
              </table>

              <!-- Complainant Identity -->
              <h3 style="font-size: 13px; font-weight: 800; color: #0f172a; margin: 24px 0 10px; text-transform: uppercase; letter-spacing: 0.5px;">
                1. Data Identitas Pelapor
              </h3>
              <table width="100%" cellpadding="8" cellspacing="0" style="background-color: #f8fafc; border-radius: 8px; font-size: 13px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
                <tr>
                  <td style="width: 35%; color: #64748b; border-bottom: 1px solid #e2e8f0;">Nama Lengkap:</td>
                  <td style="font-weight: 700; color: #0f172a; border-bottom: 1px solid #e2e8f0;">{{ $complaint->nama }}</td>
                </tr>
                <tr>
                  <td style="color: #64748b; border-bottom: 1px solid #e2e8f0;">No. Kontak / WA:</td>
                  <td style="font-weight: 600; color: #0f172a; border-bottom: 1px solid #e2e8f0;">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $complaint->telepon) }}" style="color: #0284c7; text-decoration: none;">
                      {{ $complaint->telepon }}
                    </a>
                  </td>
                </tr>
                <tr>
                  <td style="color: #64748b; border-bottom: 1px solid #e2e8f0;">Email:</td>
                  <td style="font-weight: 600; color: #0f172a; border-bottom: 1px solid #e2e8f0;">
                    <a href="mailto:{{ $complaint->email }}" style="color: #0284c7; text-decoration: none;">
                      {{ $complaint->email }}
                    </a>
                  </td>
                </tr>
                <tr>
                  <td style="color: #64748b;">Nomor Rekening:</td>
                  <td style="font-weight: 600; color: #0f172a;">{{ $complaint->nomor_rekening ?: '-' }}</td>
                </tr>
              </table>

              <!-- Complaint Details -->
              <h3 style="font-size: 13px; font-weight: 800; color: #0f172a; margin: 24px 0 10px; text-transform: uppercase; letter-spacing: 0.5px;">
                2. Detail Masalah & Uraian
              </h3>
              <table width="100%" cellpadding="8" cellspacing="0" style="background-color: #f8fafc; border-radius: 8px; font-size: 13px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
                <tr>
                  <td style="width: 35%; color: #64748b; border-bottom: 1px solid #e2e8f0;">Kategori:</td>
                  <td style="font-weight: 700; color: #0f172a; border-bottom: 1px solid #e2e8f0;">{{ ucfirst($complaint->kategori) }}</td>
                </tr>
                <tr>
                  <td style="color: #64748b; border-bottom: 1px solid #e2e8f0;">Judul / Pokok Masalah:</td>
                  <td style="font-weight: 700; color: #0f172a; border-bottom: 1px solid #e2e8f0;">{{ $complaint->judul }}</td>
                </tr>
                <tr>
                  <td style="color: #64748b; vertical-align: top; border-bottom: 1px solid #e2e8f0;">Uraian Kronologi:</td>
                  <td style="color: #1e293b; border-bottom: 1px solid #e2e8f0; white-space: pre-line;">{{ $complaint->isi_pengaduan }}</td>
                </tr>
                <tr>
                  <td style="color: #64748b;">Berkas Lampiran:</td>
                  <td style="color: #1e293b;">
                    @if($complaint->lampiran)
                      <a href="{{ asset('storage/' . $complaint->lampiran) }}" target="_blank" style="color: #0284c7; font-weight: 600;">
                        Lihat Berkas Lampiran &rarr;
                      </a>
                    @else
                      <span style="color: #94a3b8;">Tidak ada lampiran</span>
                    @endif
                  </td>
                </tr>
              </table>

              <!-- Security & Anti-Fraud Section -->
              <div style="background-color: #f8fafc; border-left: 4px solid #002D62; padding: 12px 16px; border-radius: 0 8px 8px 0; margin-bottom: 24px; font-size: 12px; color: #475569;">
                <strong style="color: #002D62;">Audit Keamanan Anti-Fraud:</strong><br>
                IP Pengirim: <code>{{ $complaint->ip_address }}</code> &bull;
                Tingkat Risiko: <strong>{{ strtoupper($complaint->fraud_risk_level) }}</strong>
                @if($complaint->fraud_notes)
                  <br>Catatan Sistem: {{ $complaint->fraud_notes }}
                @endif
              </div>

              <!-- CTA Button to Admin Panel -->
              <table width="100%" cellpadding="0" cellspacing="0" style="margin: 28px 0;">
                <tr>
                  <td align="center">
                    <a href="{{ route('admin.complaints.show', $complaint) }}" style="background-color: #002D62; color: #ffffff; text-decoration: none; padding: 14px 28px; border-radius: 10px; font-size: 13px; font-weight: 700; display: inline-block; letter-spacing: 0.5px;">
                      Buka & Tindak Lanjuti di Panel Admin &rarr;
                    </a>
                  </td>
                </tr>
              </table>

            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background-color: #0f172a; padding: 24px 32px; text-align: center; color: #94a3b8; font-size: 12px; line-height: 1.6;">
              <strong style="color: #ffffff;">PERUMDA BPR MAJALENGKA</strong><br>
              Sistem Manajemen Pengaduan Nasabah & Perlindungan Konsumen Terpadu<br>
              <span style="font-size: 11px; color: #64748b; margin-top: 8px; display: inline-block;">
                Pemberitahuan Otomatis &bull; Mohon tidak membalas langsung ke alamat email sistem ini
              </span>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>

</body>
</html>
