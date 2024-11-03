
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    {{ config('app.name') }} - CETAK BUKTI TRACER
  </title>
  <link rel="stylesheet" href="customize/with-margin.css">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
  <style>
    p, {
      line-height: 20px;
    }
    .fw-normal{
      font-weight: normal!important;
    }
    .custom-row::after {
    content: "";
    display: table;
    clear: both;
  }

  .custom-column {
    width: 50%;
    float: left;
    box-sizing: border-box;
    padding: 10px; /* Sesuaikan padding sesuai kebutuhan */
  }

  .pasfoto {
    display: flex;
    flex-wrap: wrap;
    position: absolute;
  }

  .pasfotobox {
      width: 120px;
      height: 160px;
      background-color: #fff;
      border: 1px solid #2980b9;
      margin: 5px;
  }
  </style>
  <style>

  </style>
</head>
<body>

  <div class="container">
    <div class="header">
      <img src="img/logo/sekolah-logo.png" alt="logo-serang" style="width: 100px; left: -1%;">
      <div class="title">
        <h1 class=" upcase" style="margin-bottom: 5px">BURSA KERJA KHUSUS</h1>
        <h1 class=" upcase" style="margin-bottom: 5px">(BKK)</h1>
        <h1 class="upcase" style="margin-bottom: 5px">{{ config('school.name') }}</h1>
        {{-- <h1 class="upcase" style="margin-bottom: 5px">FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN</h1> --}}
        <h6 class="fw-normal">Jl. Jatibarang-Kadipaten  Desa / Kelurahan, Rancajawat,</h6>
        <h6 class="fw-normal">Kecamatan,  Tukdana  Kabupaten / Kota,  Kabupaten Indramayu.</h6>
      </div>
    </div>
    <div class="content">
      <h2 class="jenis-surat">
        BUKTI TRACER
      </h2>

      <div class="data my">
        <table>
          <tr>
            <td>Nama</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->user->name }}</td>
          </tr>
          <tr>
            <td>NIK</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->nik }}</td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->user->jk() }}</td>
          </tr>
          <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->user->ttl() }}</td>
          </tr>
          <tr>
            <td>Telepon/WA</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->user->telepon }}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->user->email }}</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->user->alamat }}</td>
          </tr>
          <tr>
            <td>Pendidikan Terakhir</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->pend_terakhir }}</td>
          </tr>
          <tr>
            <td>Jurusan Terakhir</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->jurusan_terakhir }}</td>
          </tr>
          <tr>
            <td>Tahun Lulus</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->tahun_lulus }}</td>
          </tr>
        </table>
      </div>
      <div class="data my">
        <table>
          <tr>
            <td>Jurusan saat sekolah di SMK</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{  $pelamar->alumni->jurusan ? $pelamar->alumni->jurusan->name : ''}}</td>
          </tr>
          <tr>
            <td>Tahun Lulus</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->alumni->angkatan ? $pelamar->alumni->angkatan->tahun : ''}}</td>
          </tr>
          <tr>
            <td>Kegiatan Saat Ini</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{  $pelamar->alumni->kegiatan ? $pelamar->alumni->kegiatan->name : ''}}</td>
          </tr>
          <tr>
            <td>Pekerjaan Saat Ini</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->alumni->pekerjaan }}</td>
          </tr>
          <tr>
            <td>Tahun Mulai Bekerja</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->alumni->tahun_mulai }}</td>
          </tr>
          <tr>
            <td>Nama DU/DI</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->alumni->nama_dudi }}</td>
          </tr>
          <tr>
            <td>Bidang DU/DI</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->alumni->bidang_dudi }}</td>
          </tr>
          <tr>
            <td>Penghasilan/Pendapatan</td>
            <td style="padding-left: 10px; padding-right:10px">:</td>
            <td>{{ $pelamar->alumni->penghasilan }}</td>
          </tr>
        </table>
      </div>
      <div class="pasfoto">
        <div class="pasfotobox">
           <div style="text-align: center; margin-top: 50%">
             FOTO 3x4
           </div>
        </div>
      </div>

    </div>
    <div class="footer">
      <div class="data-foot">
        <span>
          Indramayu, {{ Carbon\Carbon::parse(date('d-m-Y'))->locale('id_ID')->isoFormat('D MMMM Y') }},
          <br>
          Kepala Sekolah {{ config('school.name') }},
        </span>

        <h6 class="nama-ttd" style="text-align: left; padding-left: 0%">
          Aiptu Kasdullah., SH.,MH.
          <br>
          NIP. 197401162000122001
        </h6>

        <div class="stempel" style="position: absolute; top: 3%">
          <img src="img/stempel/stempel.png" alt="" style="width: 75px">
        </div>

        <div class="ttd" style="position: absolute; top: 3%; left: 25%">
          <img src="img/ttd/ibrahim.png" alt="" style="width: 110px">
        </div>

        </div>

      </div>
    </div>
  </div>

</body>
</html>
