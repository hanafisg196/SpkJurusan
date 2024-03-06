@extends('tampilan.main')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-block caption-breadcrumb">
            <div class="breadcrumb-header">
                <h5>Assalamualaikum {{ auth()->user()->name }}</h5>
                <span>Selamat datang di WEB Sistem Penentuan Jurusan SMKN 2 Padang Panjang !</span>
            </div>
        </div>
    </div>
</div>
@endsection
