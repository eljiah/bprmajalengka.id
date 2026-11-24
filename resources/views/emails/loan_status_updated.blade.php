<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembaruan Status Pengajuan Kredit - Bank Majalengka</title>
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
                      PERUMDA BPR MAJALENGKA
                    </span>
                    <h1 style="color: #ffffff; margin: 4px 0 0; font-size: 20px; font-weight: 800;">
                      Pembaruan Status Pengajuan Kredit
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
                Yth. Bapak/Ibu <strong style="color: #0f172a;">{{ $loan->nama }}</strong>,
              </p>
              <p style="font-size: 14px; color: #475569; margin: 0 0 20px;">
                Kami menginformasikan bahwa berkas permohonan fasilitas pembiayaan kredit Anda dengan rincian berikut telah diperbarui oleh Tim Analis Kredit Perumda BPR Majalengka:
              </p>

              <!-- Reference & Status Card -->
              <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border: 1px solid #cbd5e1; border-radius: 12px; margin: 20px 0;">
                <tr>
                  <td style="padding: 20px; text-align: center;">
                    <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 6px;">
                      NOMOR REFERENSI PENGAJUAN
                    </span>
                    <span style="font-family: 'JetBrains Mono', Consolas, monospace; font-size: 20px; font-weight: 800; color: #002D62; letter-spacing: 2px; display: inline-block;">
                      {{ $loan->reference_code }}
                    </span>
                    <div style="margin-top: 14px;">
                      @if($loan->status === 'approved')
                        <span style="background-color: #d1fae5; color: #065f46; font-size: 13px; font-weight: 800; padding: 6px 18px; border-radius: 20px; display: inline-block; text-transform: uppercase;">
                          ✓ STATUS: PENGAJUAN DISETUJUI (APPROVED)
                        </span>
                      @elseif($loan->status === 'contacted')
                        <span style="background-color: #dbeafe; color: #1e40af; font-size: 13px; font-weight: 800; padding: 6px 18px; border-radius: 20px; display: inline-block; text-transform: uppercase;">
                          📞 STATUS: TELAH DIHUBUNGI PETUGAS (CONTACTED)
                        </span>
                      @elseif($loan->status === 'rejected')
                        <span style="background-color: #fee2e2; color: #991b1b; font-size: 13px; font-weight: 800; padding: 6px 18px; border-radius: 20px; display: inline-block; text-transform: uppercase;">
                          ✕ STATUS: BELUM DAPAT DISETUJUI (REJECTED)
                        </span>
                      @else
                        <span style="background-color: #fef3c7; color: #92400e; font-size: 13px; font-weight: 800; padding: 6px 18px; border-radius: 20px; display: inline-block; text-transform: uppercase;">
                          ⏳ STATUS: MENUNGGU VERIFIKASI (PENDING)
                        </span>
                      @endif
                    </div>
                  </td>
                </tr>
              </table>

              <!-- Loan Details Summary -->
              <table width="100%" cellpadding="0" cellspacing="0" style="border: 1px solid #e2e8f0; border-radius: 10px; margin: 20px 0; font-size: 13px;">
                <tr style="border-bottom: 1px solid #e2e8f0;">
                  <td style="padding: 10px 16px; color: #64748b; width: 40%; font-weight: 600;">Plafond Pengajuan:</td>
                  <td style="padding: 10px 16px; color: #0f172a; font-weight: 800;">Rp {{ number_format($loan->nominal, 0, ',', '.') }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #e2e8f0; background-color: #f8fafc;">
                  <td style="padding: 10px 16px; color: #64748b; font-weight: 600;">Jangka Waktu (Tenor):</td>
                  <td style="padding: 10px 16px; color: #0f172a; font-weight: 700;">{{ $loan->tenor }} Bulan</td>
                </tr>
                @if($loan->tujuan)
                <tr style="border-bottom: 1px solid #e2e8f0;">
                  <td style="padding: 10px 16px; color: #64748b; font-weight: 600;">Tujuan Penggunaan:</td>
                  <td style="padding: 10px 16px; color: #0f172a;">{{ $loan->tujuan }}</td>
                </tr>
                @endif
              </table>

              @if($loan->notes)
              <!-- Official Analyst Notes -->
              <div style="background-color: #f0fdf4; border-left: 4px solid #10b981; padding: 16px; border-radius: 8px; margin: 20px 0;">
                <strong style="color: #065f46; font-size: 12px; text-transform: uppercase; display: block; margin-bottom: 4px;">
                  Catatan Petugas Analis Kredit:
                </strong>
                <p style="color: #1e293b; font-size: 13px; margin: 0; white-space: pre-line;">
                  {{ $loan->notes }}
                </p>
              </div>
              @endif

              <p style="font-size: 13px; color: #64748b; margin: 24px 0 0; line-height: 1.6;">
                Petugas resmi kami akan mendampingi Anda untuk proses administrasi, survei lapangan, maupun penandatanganan akad kredit di kantor cabang terdekat. Pastikan Anda tidak melayani permintaan imbalan atau biaya di luar ketentuan resmi bank.
              </p>

              <!-- Official Contact Box -->
              <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border-radius: 12px; padding: 16px; margin: 24px 0 0; font-size: 12px; color: #475569;">
                <tr>
                  <td>
                    <strong style="color: #002D62; display: block; margin-bottom: 4px;">Pusat Layanan Resmi Perumda BPR Majalengka:</strong>
                    Telepon: (0233) 281144 | WhatsApp Resmi: 0811-1111-6526<br>
                    Website: https://bprmajalengka.id | Kantor Pusat: Jl. KH Abdul Halim No. 239, Majalengka
                  </td>
                </tr>
              </table>

            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background-color: #f8fafc; padding: 20px 32px; border-top: 1px solid #e2e8f0; text-align: center; font-size: 11px; color: #94a3b8;">
              Email ini dikirim secara otomatis oleh Sistem Informasi Layanan Nasabah Perumda BPR Majalengka.<br>
              Terdaftar dan diawasi oleh Otoritas Jasa Keuangan (OJK) serta penjaminan Lembaga Penjamin Simpanan (LPS).
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>

</body>
</html>
