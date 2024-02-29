@extends('tampilan2.main')
@section('content')

<!-- Categories Start -->
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Penentuan Jurusan</h6>
            <h1 class="mb-5">SMKN 2 Padang Panjang</h1>
        </div>
        <div class="row g-3">
                <div class="card" style="border: 0ch">
                    <div class="card-block" style="text-align: center">
                                <p>Selamat datang, calon siswa SMK! Saat ini, Anda memasuki fase penentuan jurusan, momen krusial dalam perjalanan pendidikan Anda.
                                    Ujian ini adalah langkah awal untuk menemukan keahlian dan minat yang akan membimbing Anda meraih sukses di dunia kerja.
                                </p>
                                <p>
                                    Ingatlah, setiap pertanyaan didesain untuk menggali potensi unik dan kecakapan Anda di berbagai bidang.
                                    Gunakan kesempatan ini untuk mengeksplorasi minat Anda dan menemukan jurusan yang sesuai dengan impian karir masa depan Anda.
                                </p>
                                <p>
                                    Sukses mengikuti ujian penentuan jurusan SMK! Gunakan dengan bijak setiap pertanyaan sebagai langkah menuju masa depan sukses dan memuaskan.
                                    Kami yakin Anda akan menemukan jurusan yang menciptakan landasan kokoh untuk kesuksesan karir Anda di SMK. Selamat menemukan potensi terbaik Anda!</p>
                                </p>
                                    <a href="/ujian" class="btn btn-primary mb-3 ">Mulai Ujain</a>
                    </div>
                </div>
        </div>
    </div>
</div>
@foreach ($soal as $item)
  <button id="colorChangeButton_{{ $item->id }}" data-id="{{ $item->id }}">{{ $item->id }}</button>
  @foreach ($soal as $subsoal)
    <input type="radio" class="radioButton" name="colorRadio"
    data-parent-id="{{ $item->id }}"
     onchange="changeButtonColor('{{ $item->id }}')">{{ $subsoal->id }}
  @endforeach
@endforeach

<script>
  function changeButtonColor(buttonId) {
    var colorChangeButton = document.getElementById('colorChangeButton_' + buttonId);
    var radioButtons = document.querySelectorAll('.radioButton[data-parent-id="' + buttonId + '"]');

    // Reset all buttons to default color
    document.querySelectorAll('.colorChangeButton').forEach(function(button) {
      button.style.backgroundColor = "green";
    });

    // Set the background color based on the checked radio button
    radioButtons.forEach(function(radioButton) {
      if (radioButton.checked) {
        colorChangeButton.style.backgroundColor = "red";
      }
    });
  }
</script>


<!-- Categories Start -->
@endsection
