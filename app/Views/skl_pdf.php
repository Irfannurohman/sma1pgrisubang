<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SKL - <?= $siswa['nama_siswa'] ?></title>
    <style>
        @page { size: A4; margin: 10mm 15mm; }
        body { 
            font-family: "Times New Roman", Times, serif; 
            margin: 0; padding: 0;
            font-size: 10.5pt;
            line-height: 1.3;
        }
        .container { width: 100%; position: relative; }
        
        /* Header / Kop Surat */
        .header-table { width: 100%; border-bottom: 3px double black; padding-bottom: 5px; margin-bottom: 10px; }
        .logo-col { width: 15%; text-align: left; vertical-align: middle; }
        .logo-pgri { width: 85px; height: auto; }
        .text-col { width: 85%; text-align: center; }
        .text-col h4 { margin: 0; font-size: 11pt; font-weight: bold; line-height: 1.1; }
        .text-col h3 { margin: 2px 0; font-size: 16pt; font-weight: bold; }
        .text-col p { margin: 0; font-size: 8pt; }

        /* Nomor Surat */
        .nomor-surat { text-align: center; margin: 10px 0; }
        .nomor-surat h2 { text-decoration: underline; margin-bottom: 2px; font-size: 14pt; text-transform: uppercase; }
        .nomor-surat p { margin: 0; font-size: 11pt; }

        /* Isi Surat */
        .isi-surat { text-align: justify; font-size: 10.5pt; line-height: 1.3; margin-bottom: 5px; }
        .isi-surat ol { margin-top: 2px; margin-bottom: 2px; padding-left: 20px; }

        /* Tabel Identitas */
        .tabel-identitas { width: 100%; margin: 5px 0; font-size: 10.5pt; border-collapse: collapse; }
        .tabel-identitas td { padding: 1px 0; vertical-align: top; }
        .tabel-identitas td:first-child { width: 30%; }

        /* Kotak Hasil */
        .kotak-hasil {
            border: 2px solid black;
            width: 250px;
            margin: 8px auto 12px auto;
            padding: 5px 40px;
            font-size: 18pt;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
        }

        /* TTD */
        .wrapper-ttd { width: 100%; margin-top: 5px; }
        .ttd-kanan { float: right; width: 280px; text-align: center; font-size: 10.5pt; }
        .area-ttd-cap { position: relative; height: 90px; margin: 2px 0; }
        .img-ttd { height: 80px; position: absolute; z-index: 1; left: 50%; margin-left: -25px; }
        .img-cap { height: 95px; position: absolute; z-index: 2; left: 30%; top: -5px; opacity: 0.85; }
        .nama-kepsek { margin-top: 0; font-weight: bold; text-decoration: underline; }
        .clear { clear: both; }
    </style>
</head>
<body>
<div class="container">
    <table class="header-table">
        <tr>
            <td class="logo-col">
                <?php if (!empty($logo_base64)): ?>
                <img src="<?= $logo_base64 ?>" class="logo-pgri">
                <?php endif; ?>
            </td>
            <td class="text-col">
                <h4>PERWAKILAN YAYASAN PEMBINA LEMBAGA PENDIDIKAN</h4>
                <h4>PENDIDIKAN DASAR DAN MENENGAH PERSATUAN GURU REPUBLIK INDONESIA</h4>
                <h4>(YPLP DIKDASMEN PGRI) KABUPATEN SUBANG</h4>
                <h3>SMA PGRI 1 SUBANG</h3>
                <p>TERAKREDITASI "A" (AMAT BAIK)</p>
                <p>Jl. Otto Iskandardinata No. 83 Kel. Karanganyar Subang 41211 Website: www.smapgri1subang.com</p>
            </td>
        </tr>
    </table>

    <div class="nomor-surat">
        <h2>PENGUMUMAN KELULUSAN</h2>
        <p>Nomor: 158/SATDIK-SMA / 11.2 / Μ. 2026</p>
    </div>

    <div class="isi-surat">
        Kepala SMA PGRI 1 Subang selaku Ketua Penyelenggara Penilaian Sumatif Akhir Jenjang (PSAJ) Tahun Pelajaran 2025/2026, berdasarkan :
        <ol>
            <li>Ketuntasan dari seluruh program pembelajaran pada kurikulum 2013</li>
            <li>Kriteria kelulusan dari satuan pendidikan sesuai dengan Kurikulum Tingkat Satuan Pendidikan dan Peraturan Perundang-undangan yang berlaku.</li>
            <li>Rapat Pleno Dewan Guru tentang Kelulusan Siswa Siswi SMA PGRI 1 Subang Tahun Pelajaran 2025 - 2026 pada Hari Jumat Tanggal 02 Mei 2026.</li>
        </ol>
        Menerangkan Bahwa :
    </div>

    <table class="tabel-identitas">
        <tr><td>Nama Peserta Didik</td><td>:</td><td><strong><?= strtoupper($siswa['nama_siswa']) ?></strong></td></tr>
        <tr><td>Kelas</td><td>:</td><td><?= $siswa['kelas'] ?></td></tr>
        <tr><td>Tempat dan Tanggal Lahir</td><td>:</td><td><?= $siswa['tempat_lahir'] ?>, <?= date('d F Y', strtotime($siswa['tanggal_lahir'])) ?></td></tr>
        <tr><td>Nama Orang Tua</td><td>:</td><td><?= $siswa['nama_orang_tua'] ?></td></tr>
        <tr><td>NISN</td><td>:</td><td><?= $siswa['nisn'] ?></td></tr>
        <tr><td>Jurusan</td><td>:</td><td><?= $siswa['jurusan'] ?></td></tr>
    </table>

    <div style="text-align:left;font-size:10.5pt;margin:8px 0 3px 0;">
        Dengan ini siswa yang bersangkutan dinyatakan :
    </div>

    <div class="kotak-hasil">
        <?= strtoupper($siswa['status_kelulusan']) ?>
    </div>

    <div class="isi-surat">
        Demikian Pengumuman Kelulusan ini kami sampaikan, atas segala perhatian kami ucapkan terima kasih.
    </div>

    <div class="wrapper-ttd">
        <div class="ttd-kanan">
            <p style="margin-bottom:5px;">Subang, 05 Mei 2026</p>
            <p style="margin-bottom:0;">Kepala SMA PGRI 1 Subang,</p>
            <div class="area-ttd-cap">
                <?php if (!empty($cap_base64)): ?>
                <img src="<?= $cap_base64 ?>" class="img-cap">
                <?php endif; ?>
                <?php if (!empty($ttd_base64)): ?>
                <img src="<?= $ttd_base64 ?>" class="img-ttd">
                <?php endif; ?>
            </div>
            <p class="nama-kepsek">Drs. H. Asep Kahlan Husen, M.MPd.</p>
            <p style="margin-top:0;">NIP. 19680111 199403 1 006</p>
        </div>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>
