<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberitahuan Lowongan Kerja</title>
</head>
<style>
    .logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .logo-container img {
        width: 100px;
        height: auto;
        margin: 0 10px; /* Atur margin kecil untuk membuat logo lebih dekat */
    }
</style>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <div style="background-color: #bfcce0; padding: 20px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 600px; margin: auto;">

        <!-- Bagian untuk dua logo kiri dan kanan -->
        <div class="logo-container">
            <!-- Pastikan gambar kiri menggunakan URL absolut -->
            <img src="{{ asset('img/logo/sekolah-logo.png') }}" alt="Logo Kiri">
        
            <!-- Pastikan $cover_image mengandung URL absolut yang dapat diakses -->
            <img src="{{ $cover_image }}" alt="Logo Kanan">
        </div>
        

        <p>Kepada Yth. <strong>Penerima</strong>,</p>

        <p>Kami dari <strong>BKK SMK PEMBANGUNAN TUKDANA</strong> ingin menginformasikan bahwa saat ini ada kesempatan menarik untuk mengisi posisi <strong>{{ $judul }}</strong></p>

        <p>Berikut adalah rincian lebih lanjut mengenai lowongan pekerjaan ini:</p>

        <p><strong>Lowongan yang dicari:</strong> {{ $judul }}</p>
        <p><strong>Kualifikasi Pendidikan:</strong> {{ $kualifikasi_pendidikan }}</p>
        <p><strong>Kualifikasi Jurusan:</strong> {{ $kualifikasi_jurusan }}</p>

        <p><strong>Deskripsi Pekerjaan:</strong></p>
        <p>{{ strip_tags($deskripsi) }}</p>

        <p>Jika Anda merasa cocok untuk posisi ini, silakan kunjungi <a href="{{ $url_tautan }}" target="_blank">tautan ini</a> untuk melamar sebelum {{ $date }}. Untuk informasi lebih lanjut, Anda dapat menghubungi kami melalui email di <a href="mailto:{{ $email_contact }}">{{ $email_contact }}</a>.</p>

        <p>Terima kasih atas perhatiannya.</p>

        <br>

        <p>Hormat kami,</p>
        Admin BKK<br>
        BKK SMK PEMBANGUNAN TUKDANA<br>
        
    </div>

</body>
</html>
