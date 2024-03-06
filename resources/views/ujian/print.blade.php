<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.min.css">

</head>

<body onload="window.print()">
    <!-- Categories Start -->
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center">
            <h5 class="mb-5">Hasil Penentuan Jurusan</h5>
        </div>

        <div class="row g-3">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><b>Nama</b></td>
                                <td>: {{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <td><b>NIS</b></td>
                                <td>: {{ auth()->user()->username }}</td>
                            </tr>
                            <tr>
                                <td><b>Kelas</b></td>
                                <td>: {{ auth()->user()->kelas->kelas }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="row g-3">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <caption>Data Hasil</caption>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Soal</th>
                                <th>Nilai Rule</th>
                                <th>Nilai user</th>
                                <th>Nilai (H,E)</th>
                            </tr>
                        </thead>

                        <!-- Kemudian bagian HTML templatenya -->
                        <style>
                            .custom-td {
                                white-space: pre-wrap;
                            }
                        </style>
                        @php $no = 1;

                        @endphp
                        <tbody>
                            @foreach ($hasil as $datas)
                                @php
                                    # code...
                                    $nilaiSoal = $datas->soal->nilaicf->cf;
                                    $nilaiSubsoal = $datas->subsoal->nilaicf->cf;
                                    $hasilrule = $nilaiSoal * $nilaiSubsoal;
                                @endphp
                                <tr>
                                    <th scope="row">{{ $no++}}</th>
                                    <td>{{ $datas->soal->soal }}</td>
                                    <td>{{ $nilaiSoal }}</td>
                                    <td>{{ $nilaiSubsoal }}</td>
                                    <td>{{ $hasilrule }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

        {{-- Mencari nilai CF (h,e) --}}
    @php
        $HasilIntrovert = []; // Inisialisasi array untuk menyimpan hasilrule
        $HasilEksrovert = [];
        $HasilSensing = [];
        $HasilIntuition = [];
        $HasilThinking = [];
        $HasilFeeling = [];
        $HasilJudging = [];
        $HasilPerceiving = [];
    @endphp

    @foreach ($hasil as $datas)
        @php

            if ($datas->soal->jenis == "introvert") {
                # code...
                $nilaiSoal = $datas->soal->nilaicf->cf;
                $nilaiSubsoal = $datas->subsoal->nilaicf->cf;
                $hasilrule = $nilaiSoal * $nilaiSubsoal;

                // Menyimpan nilai $hasilrule ke dalam array
                $HasilIntrovert[] = $hasilrule;
            }

            if ($datas->soal->jenis == "ekstrovert") {
                # code...
                $nilaiSoal = $datas->soal->nilaicf->cf;
                $nilaiSubsoal = $datas->subsoal->nilaicf->cf;
                $hasilrule = $nilaiSoal * $nilaiSubsoal;

                // Menyimpan nilai $hasilrule ke dalam array
                $HasilEksrovert[] = $hasilrule;
            }

            if ($datas->soal->jenis == "feeling") {
                # code...
                $nilaiSoal = $datas->soal->nilaicf->cf;
                $nilaiSubsoal = $datas->subsoal->nilaicf->cf;
                $hasilrule = $nilaiSoal * $nilaiSubsoal;

                // Menyimpan nilai $hasilrule ke dalam array
                $HasilFeeling[] = $hasilrule;
            }

            if ($datas->soal->jenis == "sensing") {
                # code...
                $nilaiSoal = $datas->soal->nilaicf->cf;
                $nilaiSubsoal = $datas->subsoal->nilaicf->cf;
                $hasilrule = $nilaiSoal * $nilaiSubsoal;

                // Menyimpan nilai $hasilrule ke dalam array
                $HasilSensing[] = $hasilrule;
            }

            if ($datas->soal->jenis == "intuition") {
                # code...
                $nilaiSoal = $datas->soal->nilaicf->cf;
                $nilaiSubsoal = $datas->subsoal->nilaicf->cf;
                $hasilrule = $nilaiSoal * $nilaiSubsoal;

                // Menyimpan nilai $hasilrule ke dalam array
                $HasilIntuition[] = $hasilrule;
            }

            if ($datas->soal->jenis == "thinking") {
                # code...
                $nilaiSoal = $datas->soal->nilaicf->cf;
                $nilaiSubsoal = $datas->subsoal->nilaicf->cf;
                $hasilrule = $nilaiSoal * $nilaiSubsoal;

                // Menyimpan nilai $hasilrule ke dalam array
                $HasilThinking[] = $hasilrule;
            }

            if ($datas->soal->jenis == "judging") {
                # code...
                $nilaiSoal = $datas->soal->nilaicf->cf;
                $nilaiSubsoal = $datas->subsoal->nilaicf->cf;
                $hasilrule = $nilaiSoal * $nilaiSubsoal;

                // Menyimpan nilai $hasilrule ke dalam array
                $HasilJudging[] = $hasilrule;
            }

            if ($datas->soal->jenis == "perceiving") {
                # code...
                $nilaiSoal = $datas->soal->nilaicf->cf;
                $nilaiSubsoal = $datas->subsoal->nilaicf->cf;
                $hasilrule = $nilaiSoal * $nilaiSubsoal;

                // Menyimpan nilai $hasilrule ke dalam array
                $HasilPerceiving[] = $hasilrule;
            }

        @endphp
    @endforeach
    {{-- End Mencari nilai CF (h,e) --}}

    {{-- Perhitungan --}}
    @php
        function hitung_perceiving($HasilPerceiving)
            {
                $cf_old = 0;

                foreach ($HasilPerceiving as $key => $value) {
                    if ($key === 0) {
                        $cf_old = $value;
                    } else {
                        $cf_old = $cf_old + $value * (1 - $cf_old);
                    }
                }

                return $cf_old;
            }
        $PersenPerceiving = hitung_perceiving($HasilPerceiving) * 100;

        function hitung_judging($HasilJudging)
                {
                    $cf_old = 0;

                    foreach ($HasilJudging as $key => $value) {
                        if ($key === 0) {
                            $cf_old = $value;
                        } else {
                            $cf_old = $cf_old + $value * (1 - $cf_old);
                        }
                    }

                    return $cf_old;
                }
        $PersenJudging = hitung_judging($HasilJudging) * 100;

        function hitung_feeling($HasilFeeling)
                {
                    $cf_old = 0;

                    foreach ($HasilFeeling as $key => $value) {
                        if ($key === 0) {
                            $cf_old = $value;
                        } else {
                            $cf_old = $cf_old + $value * (1 - $cf_old);
                        }
                    }

                    return $cf_old;
                }
        $PersenFeeling = hitung_feeling($HasilFeeling) * 100;

        function hitung_intuition($HasilIntuition)
                {
                    $cf_old = 0;

                    foreach ($HasilIntuition as $key => $value) {
                        if ($key === 0) {
                            $cf_old = $value;
                        } else {
                            $cf_old = $cf_old + $value * (1 - $cf_old);
                        }
                    }

                    return $cf_old;
                }
        $PersenIntuition = hitung_intuition($HasilIntuition) * 100;

        function hitung_thinking($HasilThinking)
                {
                    $cf_old = 0;

                    foreach ($HasilThinking as $key => $value) {
                        if ($key === 0) {
                            $cf_old = $value;
                        } else {
                            $cf_old = $cf_old + $value * (1 - $cf_old);
                        }
                    }

                    return $cf_old;
                }
        $PersenThinking = hitung_thinking($HasilThinking) * 100;

        function hitung_sensing($HasilSensing)
            {
                $cf_old = 0;

                foreach ($HasilSensing as $key => $value) {
                    if ($key === 0) {
                        $cf_old = $value;
                    } else {
                        $cf_old = $cf_old + $value * (1 - $cf_old);
                    }
                }

                return $cf_old;
            }
        $PersenSensing = hitung_sensing($HasilSensing) * 100;

        function hitung_introvert($HasilIntrovert)
        {
            $cf_old = 0;

            foreach ($HasilIntrovert as $key => $value) {
                if ($key === 0) {
                    $cf_old = $value;
                } else {
                    $cf_old = $cf_old + $value * (1 - $cf_old);
                }
            }

            return $cf_old;
        }
        $PersenIntrovert = hitung_introvert($HasilIntrovert) * 100;

        function hitung_ekstrovert($HasilEksrovert)
        {
            $cf_old = 0;

            foreach ($HasilEksrovert as $key => $value) {
                if ($key === 0) {
                    $cf_old = $value;
                } else {
                    $cf_old = $cf_old + $value * (1 - $cf_old);
                }
            }

            return $cf_old;
        }
        $PersenEkstrovert = hitung_ekstrovert($HasilEksrovert) * 100
    @endphp
    {{-- End Perhitungan --}}

        <div class="row g-3">
            <div class="col-lg-6">
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @php
                                    $kepribadian = "no data available";
                                @endphp

                                @if ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="ISTJ ( Introvert, Sensing, Thinking, Judging)" }}</td>
                                    </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Tes Kepribadian</b></td>
                                            <td>: {{ $kepribadian="ISTP ( Introvert, Sensing, Thinking, Perceiving)" }}</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                        <tr>
                                            <td><b>Hasil Tes Kepribadian</b></td>
                                            <td>: {{ $kepribadian="ISFJ ( Introvert, Sensing, Feeling, Judging)" }}</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Tes Kepribadian</b></td>
                                            <td>: {{ $kepribadian="ISFP ( Introvert, Sensing, Feeling, Perceiving)" }}</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                        <tr>
                                            <td><b>Hasil Tes Kepribadian</b></td>
                                            <td>: {{ $kepribadian="INTJ ( Introvert, Intuitive, Thinking, Judging)" }}</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Tes Kepribadian</b></td>
                                            <td>: {{ $kepribadian="INTP ( Introvert, Intuitive, Thinking, Perceiving)" }}</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="INFJ ( Introvert, Intuitive, Feeling, Judging)" }}</td>
                                    </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="INFP ( Introvert, Intuitive, Feeling, Perceiving)" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="ESTJ ( Ekstrovert, Sensing, Thinking, Judging)" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="ESTP ( Ekstrovert, Sensing, Thinking, Perceiving)" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="ESFJ ( Ekstrovert, Sensing, Feeling, Judging)" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="ESFP ( Ekstrovert, Sensing, Feeling, Perceiving)" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="ENTJ ( Ekstrovert, Intuitive, Thinking, Judging)" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="ENTP ( Ekstrovert, Intuitive, Thinking, Perceiving)" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="ENFJ ( Ekstrovert, Intuitive, Feeling, Judging)" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="ENFP ( Ekstrovert, Intuitive, Feeling, Perceiving)" }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: {{ $kepribadian="Kepribadian tidak ditemukan!" }}</td>
                                    </tr>

                                @endif

                                {{-- Perbandingan Persentase --}}

                                    @if ( $PersenIntrovert > $PersenEkstrovert )
                                        <tr>
                                            <td></td>
                                            <td>&nbsp;Introvert : {{ number_format($PersenIntrovert,2) }}%</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td>&nbsp;Ekstrovert : {{ number_format($PersenEkstrovert,2) }}%</td>
                                        </tr>
                                    @endif

                                    @if ( $PersenSensing > $PersenIntuition )
                                    <tr>
                                        <td></td>
                                        <td>&nbsp;Sensing : {{ number_format($PersenSensing,2) }}%</td>
                                    </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td>&nbsp;Intuition : {{ number_format($PersenIntuition,2) }}%</td>
                                        </tr>
                                    @endif

                                    @if ( $PersenThinking > $PersenFeeling )
                                        <tr>
                                            <td></td>
                                            <td>&nbsp;Thinking : {{ number_format($PersenThinking,2) }}%</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td>&nbsp;Feeling : {{ number_format($PersenFeeling,2) }}%</td>
                                        </tr>
                                    @endif

                                    @if ($PersenJudging > $PersenPerceiving)
                                        <tr>
                                            <td></td>
                                            <td>&nbsp;Judging : {{ number_format($PersenJudging,2) }}%</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td>&nbsp;Perceiving : {{ number_format($PersenPerceiving,2) }}%</td>
                                        </tr>
                                    @endif
                                {{-- End Perbandingan Persentase --}}

                                {{-- Hasil Jurusan --}}
                                @php
                                        $jurusan = "no data available";
                                @endphp
                                @if ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Teknik Komputer dan Jaringan" }}</td>
                                    </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Jurusan</b></td>
                                            <td>: {{ $jurusan = "Desain Komunikasi Visual" }}</td>

                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                        <tr>
                                            <td><b>Hasil Jurusan</b></td>
                                            <td>: {{ $jurusan = "Desain Komunikasi Visual" }}</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Jurusan</b></td>
                                            <td>: {{ $jurusan = "Desain Komunikasi Visual" }}</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                        <tr>
                                            <td><b>Hasil Jurusan</b></td>
                                            <td>: {{ $jurusan = "Pengembangan Perangkat Lunak Gim" }}</td>

                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Jurusan</b></td>
                                            <td>: {{ $jurusan = "Pengembangan Perangkat Lunak Gim" }}</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Desain Komunikasi Visual" }}</td>
                                    </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Produksi dan Siaran Program Televisi" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Teknik Komputer dan Jaringan" }}</td>

                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Desain Komunikasi Visual" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Produksi dan Siaran Program Televisi" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Produksi dan Siaran Program Televisi" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Pengembangan Perangkat Lunak Gim" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Pengembangan Perangkat Lunak Gim" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Teknik Komputer dan Jaringan" }}</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Produksi dan Siaran Program Televisi" }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: {{ $jurusan = "Jurusan Tidak Ditemukan!" }}</td>
                                    </tr>


                                @endif
                                {{-- End Hasil Jurusan --}}

                            </tbody>

                                {{-- @php
                                    function hitung_cf($arrayHasilRule)
                                    {
                                        $cf_old = 0;

                                        foreach ($arrayHasilRule as $key => $value) {
                                            if ($key === 0) {
                                                $cf_old = $value; // Set nilai awal dengan nilai pertama dalam array
                                            } else {
                                                // Menggunakan rumus Certainty Factor
                                                $cf_old = $cf_old + $value * (1 - $cf_old);
                                            }
                                        }

                                        return $cf_old;
                                    }
                                @endphp

                                @php
                                    // Contoh penggunaan dengan data tertentu
                                    $arrayHasilRule = [0.16, 0.32];
                                    $hasil_cf = hitung_cf($arrayHasilRule);

                                    // Menampilkan hasil
                                    echo "Hasil Certainty Factor: " . $hasil_cf;
                                @endphp --}}

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p>
                Selamat! Berdasarkan hasil seleksi ujian penentuan jurusan SMKN 2 Padang Panjang, kami dengan senang hati mengumumkan bahwa Anda telah diterima di jurusan
                @if ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                 <b>[&nbsp;Teknik Komputer dan Jaringan&nbsp;]</b>

                @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                    <b>[&nbsp;Desain Komunikasi Visual&nbsp;]</b>

                @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                    <b>[&nbsp;Teknik Komputer dan Jaringan&nbsp;]</b>

                @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                   <b>[&nbsp;Desain Komunikasi Visual&nbsp;]</b>

                @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                    <b>[&nbsp;Pengembangan Perangkat Lunak Gim&nbsp;]</b>

                @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                    <b>[&nbsp;Pengembangan Perangkat Lunak Gim&nbsp;]</b>

                @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                    <b>[&nbsp;Desain Komunikasi Visual&nbsp;]</b>

                @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                    <b> [&nbsp;Produksi dan Siaran Program Televisi&nbsp;]</b>

                @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                    <b>[&nbsp;Teknik Komputer dan Jaringan&nbsp;]</b>

                @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                    <b>[&nbsp;Desain Komunikasi Visual&nbsp;]</b>

                @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                    <b> [&nbsp;Produksi dan Siaran Program Televisi&nbsp;]</b>

                @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                    <b> [&nbsp;Produksi dan Siaran Program Televisi&nbsp;]</b>

                @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                    <b>[&nbsp;Pengembangan Perangkat Lunak Gim&nbsp;]</b>

                @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                    <b>[&nbsp;Pengembangan Perangkat Lunak Gim&nbsp;]</b>

                @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                    <b>[&nbsp;Teknik Komputer dan Jaringan&nbsp;]</b>

                @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                    <b> [&nbsp;Produksi dan Siaran Program Televisi&nbsp;]</b>
                @else
                    <b>[ Jurusan Tidak Ditemukan! ]</b>

            @endif . Keberhasilan Anda dalam mengikuti proses seleksi ini menunjukkan dedikasi dan potensi Anda dalam bidang tersebut.
            </p>
            <p>
                Kami yakin bahwa perjalanan pendidikan Anda di jurusan ini akan memberikan pengalaman belajar yang berharga serta membuka peluang karir di masa depan.
                Jangan ragu untuk mengeksplorasi peluang-peluang yang ditawarkan oleh jurusan ini, dan libatkan diri Anda secara aktif dalam kegiatan ekstrakurikuler
                maupun proyek-proyek pembelajaran yang dapat memperkaya pengetahuan dan keterampilan Anda.
            </p>
            <p>
                Selamat belajar dan semoga sukses dalam mengejar impian pendidikan dan karir Anda!
            </p>

        </div>
    </div>
</div>
</body>

</html>
