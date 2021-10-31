@php
use App\Models\Wilayah;
$wilayah = new Wilayah();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <style type="text/css">
        html,
        body {
            font-family: 'Poppins', sans-serif;
        }

        .doc-title {
            color: #142B63;
        }

        .user-photo,
        .user-photo img {
            width: 150px;
            border-radius: 75px;
        }

        h2,
        h3 {
            margin: 0px;
        }

        .fname {
            font-weight: bolder;
            margin-left: 25px;
            line-height: 20px;
        }

        .lname {
            font-weight: 500;
            margin-left: 25px;
        }

        .section-title {
            padding-top: 10px;
            padding-bottom: 10px;
            margin-bottom: 5px;
        }

        .section-title i {
            position: absolute;
            font-size: 26px;
        }

        .section-title span {
            font-size: 18px;
            margin-left: 36px;
            font-weight: bold;
            color: #142B63;
        }

        .text-muted {
            color: #6c757d;
        }

        .m-0 {
            margin: 0;
        }

        .p-0 {
            padding: 0;
        }

        .mb-3 {
            margin-bottom: .1rem;
        }

        .pb-3 {
            padding-bottom: .1rem;
        }
    </style>
</head>

<body>
    <h1 class="doc-title">Resume / CV</h1>
    <table>
        <tr>
            <td width="15%">
                @if($personal->photo)
                <div class="user-photo">
                    <img src="{{ $personal->photo }}" alt="{{ $personal->nama_depan }}" />
                </div>
                @else
                <div class="user-no-photo">
                    {{ strtoupper(substr($personal->nama_depan, 0, 1)) }}
                </div>
                @endif
            </td>
            <td>
                <h2 class="fname"><strong>{{ $personal->nama_depan }}</strong></h2>
                <h3 class="lname">{{ $personal->nama_belakang }}</h3>
            </td>
        </tr>
    </table>

    <h4 class="section-title">
        <i class="la la-id-card text-secondary"></i>
        <span>Informasi Personal</span>
    </h4>

    <table width="100%">
        <tr>
            <td width="198px" valign="top"><span class="text-muted">Jenis Kelamin</span></td>
            <td valign="top">{{ $personal->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td valign="top"><span class="text-muted">Np HP/Whatsapp</span></td>
            <td valign="top">{{ $personal->no_hp }}</td>
        </tr>
        <tr>
            <td valign="top"><span class="text-muted">Email</span></td>
            <td valign="top">{{ $personal->email }}</td>
        </tr>
        <tr>
            <td valign="top"><span class="text-muted">Tempat, Tanggal Lahir</span></td>
            <td valign="top">{{ $personal->tempat_lahir }}, {{ Carbon\Carbon::parse($personal->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
        </tr>
        <tr>
            <td valign="top"><span class="text-muted">Alamat</span></td>
            <td valign="top">
                {{ $personal->alamat ? $personal->alamat : '-' }}
                {{ $personal->desa ? ', ' . $wilayah->getName($personal->desa) : '' }}
                {{ $personal->kecamatan ? ', Kec. ' . $wilayah->getName($personal->kecamatan) : '' }}
                {{ $personal->kabupaten ? ', ' . $wilayah->getName($personal->kabupaten) : '' }}
                {{ $personal->provinsi ? ', ' . $wilayah->getName($personal->provinsi) : '' }}
                {{ $personal->kodepos ? ', ' . $personal->kodepos : '' }}
            </td>
        </tr>
    </table>

    <h4 class="section-title">
        <i class="la la-briefcase text-secondary"></i>
        <span>Pengalaman Kerja</span>
    </h4>

    <table class="pengalaman" width="100%">
        @foreach($pengalaman as $key => $val)
        <tr>
            <td width="198px" valign="top" align="left" class="pb-3">
                <p class="text-secondary m-0"><strong>{{ Carbon\Carbon::parse($val->tanggal_mulai)->isoFormat('MMM Y') }} - {{ $val->masih_bekerja ? "Sekarang" : Carbon\Carbon::parse($val->tanggal_selesai)->isoFormat('MMM Y') }}</strong></p>
                <p class="text-muted m-0">
                    @php
                    $start = date_create($val->tanggal_mulai);
                    $end = date_create($val->masih_bekerja ? date('Y-m-d') : $val->tanggal_selesai);
                    $diff = date_diff($end, $start);
                    print($diff->y . " Tahun " . $diff->m . " Bulan")
                    @endphp
                </p>
            </td>
            <td valign="top" class="pb-3" align="left">
                <h3 class="text-secondary mb-0"><strong>{{ $val->bekerja_sebagai }}</strong></h3>

                <p class="text-muted m-0"><i class="la la-building me-2"></i> {{ $val->nama_perusahaan }}</p>
                <p class="text-muted m-0"><i class="la la-map-marker me-2"></i> {{ $wilayah->getName($val->kabupaten) }}, {{ $wilayah->getName($val->provinsi) }}, Indonesia</p>
                <p class="text-muted m-0"><i class="la la-industry me-2"></i> {{ $val->bidang_usaha }}</p>
            </td>
        </tr>
        @endforeach
    </table>

    <h4 class="section-title">
        <i class="la la-graduation-cap"></i>
        <span>Riwayat Pendidikan</span>
    </h4>

    <table class="pendidikan" width="100%">
        @foreach($pendidikan as $key => $val)
        <tr>
            <td width="198px" valign="top" class="pb-3" align="left">
                <p class="text-secondary m-0"><strong>{{ $val->bulan_mulai }} {{ $val->tahun_mulai }} - {{ $val->masih_sekolah ? 'Sekarang' : $val->bulan_selesai . ' ' .$val->tahun_selesai }}</strong></p>
            </td>
            <td valign="top" class="pb-3" align="left">
                <h3 class="text-secondary mb-0"><strong>{{ $val->nama_sekolah }}</strong></h3>

                <p class="text-muted m-0"><i class="la la-map-marker me-2"></i>{{ $wilayah->getName($val->kabupaten) }}, {{ $wilayah->getName($val->provinsi) }}, Indonesia</p>
                <p class="text-muted m-0"><i class="la la-graduation-cap me-2"></i>{{ $val->jenjang_pendidikan }}</p>
                <p class="text-muted m-0"><i class="las la-swatchbook me-2"></i>{{ $val->jurusan }}</p>
                <p class="text-muted m-0"><i class="las la-clipboard-list me-2"></i>{{ $val->nilai_akhir }}</p>
            </td>
        </tr>
        @endforeach
    </table>

    <h4 class="section-title">
        <i class="la la-cog"></i>
        <span>Keterampilan</span>
    </h4>

    @if($mahir)
    <table class="keterampilan" width="100%">
        <tr>
            <td width="198px" valign="top" align="left" class="pb-3">
                <p class="text-muted m-0">Mahir</p>
            </td>
            <td valign="top" align="left" class="pb-3">
                <ul class="p-0">
                    @foreach($keterampilan as $mahir)
                    @if ($mahir->prosentase == 100)
                    <li>{{ $mahir->skill }}</li>
                    @endif
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>
    @endif

    @if($menengah)
    <table class="keterampilan" width="100%">
        <tr>
            <td width="198px" valign="top" align="left" class="pb-3">
                <p class="text-muted m-0">Menengah</p>
            </td>
            <td valign="top" align="left" class="pb-3">
                <ul class="p-0">
                    @foreach($keterampilan as $menengah)
                    @if ($menengah->prosentase == 75)
                    <li>{{ $menengah->skill }}</li>
                    @endif
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>
    @endif

    @if($pemula)
    <table class="keterampilan" width="100%">
        <tr>
            <td width="198px" align="left" valign="top" class="pb-3">
                <p class="text-muted m-0">Pemula</p>
            </td>
            <td valign="top" align="left" class="pb-3">
                <ul class="p-0">
                    @foreach($keterampilan as $pemula)
                    @if ($pemula->prosentase == 60)
                    <li>{{ $pemula->skill }}</li>
                    @endif
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>
    @endif

    <h4 class="section-title">
        <i class="la la-sitemap"></i>
        <span>Pengalaman Organisasi</span>
    </h4>

    <table class="organisasi" width="100%">
        @foreach($organisasi as $key => $val)
        <tr>
            <td width="198px" align="left" valign="top" class="pb-3">
                <p class="text-muted m-0">{{ $val->tahun_mulai }} - {{ $val->masih_aktif ? 'Sekarang' : $val->tahun_berakhir }}</p>
            </td>
            <td valign="top" align="left" class="pb-3">
                <p class="m-0">{{ $val->posisi_jabatan }}</p>
                <p class="m-0 text-muted">{{ $val->nama_organisasi }}</p>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>