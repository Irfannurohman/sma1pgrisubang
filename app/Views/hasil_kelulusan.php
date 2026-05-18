<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENGUMUMAN KELULUSAN - SMA PGRI 1 SUBANG</title>

<style>
    @page {
        size: A4;
        margin: 0; 
    }

    @media print {
        body { 
            background: none !important; 
            margin: 0 !important; 
            padding: 0 !important; 
        }
        .container-print { 
            box-shadow: none !important; 
            margin: 0 !important; 
            width: 210mm !important; 
            height: 297mm !important; 
            padding: 8mm 15mm !important; /* Padding atas dikurangi agar teks naik */
            overflow: hidden !important; 
        }
        .nav-fixed { display: none !important; }
    }

    body { 
        background-color: white; 
        margin: 0; 
        padding: 10px; 
        font-family: "Times New Roman", Times, serif; 
    }
    
    .container-print {
        background-color: white;
        width: 210mm;
        min-height: 297mm;
        margin: 0 auto;
        padding: 10mm 15mm;
        box-sizing: border-box;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
        position: relative;
    }

    /* HEADER / KOP - Dipersempit spasi bawahnya */
    .header-table { width: 100%; border-bottom: 5px double black; margin-bottom: 10px; padding-bottom: 5px; }
    .logo-col { width: 15%; text-align: left; vertical-align: middle;}
    .logo-pgri { width: 95px; height: auto; }
    .text-col { width: 85%; text-align: center; }
    .text-col h4 { margin: 0; font-size: 11pt; font-weight: bold; line-height: 1.1; }
    .text-col h3 { margin: 2px 0; font-size: 16pt; font-weight: bold; }
    .text-col p { margin: 0; font-size: 8pt; }

    /* NOMOR SURAT - Margin dikurangi */
    .nomor-surat { text-align: center; margin: 10px 0; }
    .nomor-surat h2 { text-decoration: underline; margin-bottom: 2px; font-size: 14pt; text-transform: uppercase; }
    .nomor-surat p { margin: 0; font-size: 11pt; }

    /* ISI SURAT - Line height dikurangi sedikit */
    .isi-surat { text-align: justify; font-size: 10.5pt; line-height: 1.2; margin-bottom: 5px; }
    .isi-surat ol { margin-top: 2px; margin-bottom: 2px; padding-left: 20px; }

    /* TABEL IDENTITAS */
    .tabel-identitas { width: 100%; margin: 5px 0; font-size: 10.5pt; border-collapse: collapse; }
    .tabel-identitas td { padding: 1px 0; vertical-align: top; }
    .tabel-identitas td:first-child { width: 30%; }

    /* PERNYATAAN & KOTAK HASIL */
    .pernyataan-kiri { text-align: left; font-size: 10.5pt; margin: 8px 0 3px 0; }
    .kotak-hasil {
        border: 2px solid black;
        width: fit-content;
        margin: 5px auto 10px auto;
        padding: 5px 40px;
        font-size: 18pt;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
    }

    /* TTD - Kunci utama biar tidak bocor ke hal 2 */
    .wrapper-ttd { width: 100%; margin-top: 5px; position: relative; }
    .ttd-kanan { float: right; width: 280px; text-align: center; font-size: 10.5pt; position: relative; }
    
    .area-ttd-cap {
        position: relative;
        height: 95px; /* Dikurangi dari 120px */
        margin: 2px 0;
        display: flex;
        justify-content: center;
    }

    .img-ttd { height: 85px; position: absolute; z-index: 1; left: 50%; transform: translateX(-30%); }
    .img-cap { height: 100px; position: absolute; z-index: 2; left: 45%; transform: translateX(-65%); top: -5px; opacity: 0.85; }

    .nama-kepsek { margin-top: 0; font-weight: bold; text-decoration: underline; position: relative; z-index: 3; }

    .nav-fixed { position: fixed; bottom: 20px; right: 20px; display: flex; gap: 10px; z-index: 9999; }
    .btn-aksi { padding: 12px 24px; border-radius: 30px; border: none; cursor: pointer; font-weight: bold; color: white; text-decoration: none; box-shadow: 0 4px 10px rgba(0,0,0,0.3); }
    .btn-blue { background: #1a73e8; }
    .btn-gray { background: #5f6368; }
</style>

</head>
<body>

<div class="nav-fixed">
    <button onclick="window.print()" class="btn-aksi btn-blue">CETAK SEKARANG</button>
    <a href="<?= base_url('/') ?>" class="btn-aksi btn-gray">KEMBALI</a>
</div>

<div class="container-print">
    <table class="header-table">
        <tr>
            <td class="logo-col">
                <img src="<?= base_url('logo%20pgri.png') ?>" class="logo-pgri">
            </td>
            <td class="text-col">
                <h4>PERWAKILAN YAYASAN PEMBINA LEMBAGA PENDIDIKAN </h4>
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

    <div class="pernyataan-kiri">
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
            <p style="margin-bottom: 5px;">Subang, 05 Mei 2026</p>
            <p style="margin-bottom: 0;">Kepala SMA PGRI 1 Subang,</p>
            
            <div class="area-ttd-cap">
                <img src="<?= base_url('CAP%20BASAH%20PGRI.png') ?>" class="img-cap">
                <img src="<?= base_url('TTD%20PGRI.png') ?>" class="img-ttd">
            </div>
            
            <p class="nama-kepsek">Drs. H. Asep Kahlan Husen, M.MPd.</p>
            <p style="margin-top: 0;">NIP. 19680111 199403 1 006</p>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>

</body>
</html>