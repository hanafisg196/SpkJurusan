@extends('tampilan2.main')
@section('content')

<!-- Categories Start -->
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Penentuan Jurusan</h6>
            <h1 class="mb-5">SMKN 2 Padang Panjang</h1>
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

                                @if ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: ISTJ</td>
                                    </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Tes Kepribadian</b></td>
                                            <td>: ISTP</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                        <tr>
                                            <td><b>Hasil Tes Kepribadian</b></td>
                                            <td>: ISFJ</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Tes Kepribadian</b></td>
                                            <td>: ISFP</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                        <tr>
                                            <td><b>Hasil Tes Kepribadian</b></td>
                                            <td>: INTJ</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Tes Kepribadian</b></td>
                                            <td>: INTP</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: INFJ</td>
                                    </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: INFP</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: ESTJ</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: ESTP</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: ESFJ</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: ESFP</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: ENTJ</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: ENTP</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: ENFJ</td>
                                    </tr>

                                    @else
                                    <tr>
                                        <td><b>Hasil Tes Kepribadian</b></td>
                                        <td>: ENFP</td>
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
                                @if ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Teknik Komputer dan Jaringan</td>
                                    </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Jurusan</b></td>
                                            <td>: Desain Komunikasi Visual</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                        <tr>
                                            <td><b>Hasil Jurusan</b></td>
                                            <td>: Teknik Komputer dan Jaringan</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Jurusan</b></td>
                                            <td>: Desain Komunikasi Visual</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                        <tr>
                                            <td><b>Hasil Jurusan</b></td>
                                            <td>: Pengembangan Perangkat Lunak Gim</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                        <tr>
                                            <td><b>Hasil Jurusan</b></td>
                                            <td>: Pengembangan Perangkat Lunak Gim</td>
                                        </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Desain Komunikasi Visual</td>
                                    </tr>

                                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Produksi dan Siaran Program Televisi</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Teknik Komputer dan Jaringan</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Desain Komunikasi Visual</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Produksi dan Siaran Program Televisi</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Produksi dan Siaran Program Televisi</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Pengembangan Perangkat Lunak Gim</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Pengembangan Perangkat Lunak Gim</td>
                                    </tr>

                                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Teknik Komputer dan Jaringan</td>
                                    </tr>

                                    @else
                                    <tr>
                                        <td><b>Hasil Jurusan</b></td>
                                        <td>: Produksi dan Siaran Program Televisi</td>
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

                @else
                    <b> [&nbsp;Produksi dan Siaran Program Televisi&nbsp;]</b>

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


            <div class="text-center">
                @if ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                    <form method="post" action="{{ route('tambah.jurusan') }}">
                        @csrf
                            <input type="hidden" name="jurusan" value="Teknik Komputer dan Jaringan">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Desain Komunikasi Visual">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Teknik Komputer dan Jaringan">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenSensing > $PersenIntuition  && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Desain Komunikasi Visual">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Pengembangan Perangkat Lunak Gim">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Pengembangan Perangkat Lunak Gim">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Desain Komunikasi Visual">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenIntrovert > $PersenEkstrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )

                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Produksi dan Siaran Program Televisi">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Teknik Komputer dan Jaringan">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Desain Komunikasi Visual">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Produksi dan Siaran Program Televisi">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenSensing > $PersenIntuition && $PersenFeeling > $PersenThinking && $PersenPerceiving > $PersenJudging )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Produksi dan Siaran Program Televisi">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenJudging > $PersenPerceiving )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Pengembangan Perangkat Lunak Gim">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenThinking > $PersenFeeling && $PersenPerceiving > $PersenJudging )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Pengembangan Perangkat Lunak Gim">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @elseif ( $PersenEkstrovert > $PersenIntrovert && $PersenIntuition > $PersenSensing && $PersenFeeling > $PersenThinking && $PersenJudging > $PersenPerceiving )
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Teknik Komputer dan Jaringan">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    @else
                        <form method="post" action="{{ route('tambah.jurusan') }}">
                            @csrf
                            <input type="hidden" name="jurusan" value="Produksi dan Siaran Program Televisi">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                @endif
            </div>
        </div>
    </div>
</div>

<!-- Categories Start -->
@endsection
