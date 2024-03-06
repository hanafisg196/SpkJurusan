@extends('tampilan2.main')
@section('content')
<div class="container">
    <br>
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">Penentuan Jurusan</h6>
        <h1 class="mb-5">SMKN 2 Padang Panjang</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            @foreach ($batch as $item)
            <div class="text-center col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">Ujian Penetuan Jurusan</p>
                        @livewire('doneCounter')

                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
