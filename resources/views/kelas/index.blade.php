@extends('tampilan.main')
@section('content')
<div class="col-lg-12">
<!-- Contextual classes table starts -->
    <div class="card">
        <div class="card-header">
            <h5>Tabel Kelas</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="fa fa-chevron-left"></i></li>
                    <li><i class="fa fa-window-maximize full-card"></i></li>
                    <li><i class="fa fa-minus minimize-card"></i></li>
                    <li><i class="fa fa-refresh reload-card"></i></li>
                    <li><i class="fa fa-times close-card"></i></li>
                </ul>
            </div>
        </div>

        @if(session()->has('success'))
        <div class="m-2 row">
            <div class="alert alert-success col-sm-3 ml-3 mb-2" role="alert">
                {{ session('success') }}
            </div>
        </div>
        @endif

        <div class="text-right mr-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="ti-plus"></i>Tambah
            </button>
            {{-- <a href="/kegiatan/create" class="btn waves-effect waves-light btn-primary"><i class="ti-plus"></i>Tambah</a> --}}
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <caption>Data Kelas</caption>
                    <thead>
                        <tr>
                            <th style="width: 10%">No</th>
                            <th style="width: 70%">Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    </style>
                    @php $no = 1; @endphp
                    <tbody>
                        @foreach ($data as $datas)
                        <tr>
                            <th scope="row">{{ $no++}}</th>
                            <td>{{ $datas->kelas }}</td>
                            <td>
                                <button type="button" class="btn btn-primary exampleModaledit"
                                 data-toggle="modal" data-target="#exampleModaledit{{ $datas->id }}">
                                    <i class="ti-pencil"></i>
                                </button>
                                <form action="/kelas/{{ $datas->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="ti-trash btn btn-danger"
                                    onclick="return confirm('Yakin Menghapus Data?')"></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Data --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/kelas" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kelas</label>
                            <div class="col-sm-9">
                                <input type="text" id="kelas" name="kelas" class="form-control @error('kelas') is-invalid @enderror"
                                value="{{ old('kelas') }}" required>

                                @error('kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data ends -->

{{-- Modal Edit Data --}}

@foreach ($data as $datas)
    <div class="modal fade" id="exampleModaledit{{ $datas->id }}"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/editkelas', $datas->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-block">
                            <div class="form-group row">
                                <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                                <div class="col-sm-9">
                                    <input type="text" id="kelas" name="kelas" class="form-control
                                     @error('kelas') is-invalid @enderror" value="{{ $datas->kelas }}" required>
                                    @error('kelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- Modal Edit Data End--}}


@endsection
