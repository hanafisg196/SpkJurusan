<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.min.css">

</head>

<body onload="window.print()">
    <div class="page-body">
        <!-- Basic table card start -->

        <div class="card">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <div class="text-center">
                                <table style="border: 1px">
                                    <h5 class="text-center">SMKN 2 PADANG PANJANG</h5>
                                    <p class="text-center">Jl. Syech Ibrahim Musa No.26 Padang Panjang Timur</p>
                                    <hr style="border: 1px solid #000;">
                                    <p class="text-center">Daftar Jurusan Siswa</p>
                                    <div class="table-responsive" style="margin-top: 10px">
                                        <table class="table">
                                            <caption>Data Jurusan Siswa</caption>
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Kepribadian</th>
                                                    <th>Jurusan</th>
                                                </tr>
                                            </thead>

                                            @php $no = 1; @endphp
                                            <tbody>
                                                @foreach ($data as $datas)
                                                    <tr>
                                                        <th scope="row">{{ $no++}}</th>
                                                        <td>{{ $datas->user->name }}</td>
                                                        <td>{{ $datas->user->kelas->kelas }}</td>
                                                        <td>{{ $datas['kepribadian'] }}</td>
                                                        <td>{{ $datas['jurusan'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <table class="mt-5" style="width: 100%;">

                                        <tr>
                                            <td style="width: 50%;">

                                            </td>
                                            <td style="width: 50%;">
                                                <table class="center">
                                                    <tr>
                                                            <p style="text-align: center">Padang Panjang, {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
                                                            <br>
                                                            <br>
                                                            <p style="text-align: center">Nasrial, S.Pd</p>
                                                            <p style="text-align: center">
                                                                Kepala Sekolah
                                                            </p>
                                                    </tr>
                                            </td>
                                        </tr>

                                    </table>
                                </table>
                        </div>
                    </table>
                </div>
            </div>
        </div>



    </div>
</body>

</html>
