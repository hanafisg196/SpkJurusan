@extends('tampilan.main')
@section('content')
<div class="col-lg-12">
<!-- Contextual classes table starts -->
    <div class="card">
        <div class="card-header">
            <h5>Tabel Data Siswa</h5>
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
        <div class="row">

            <div class="col-md-4 ml-4">
                <form action="/siswa">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="btn-group ml-2">
                <button type="button" class="btn btn-primary">Filter</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/siswa">Semua Kelas</a>
                    @foreach ($kelas as $item)
                        <a class="dropdown-item" href="/filtersiswa/{{$item->id}}">{{ $item->kelas }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <caption>Data Siswa</caption>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <!-- Kemudian bagian HTML templatenya -->
                    <style>
                        .custom-td {
                            white-space: pre-wrap;
                        }
                    </style>
                    @php $no = 1; @endphp
                    <tbody>
                        @foreach ($data as $key => $datas)
                            @if ($datas['role'] == "siswa")
                                <tr>
                                    <th scope="row">{{ $data->firstItem()+$key}}</th>
                                    <td>{{ $datas['name'] }}</td>
                                    <td>{{ $datas['username'] }}</td>
                                    <td>
                                        @if ($datas->kelas)
                                            {{ $datas->kelas->kelas }}
                                        @else
                                            {{ 'Kelas belum diisi' }}
                                        @endif
                                    </td>
                                    <td>{{ $datas['tempat_lahir'] }}</td>
                                    <td>{{ $datas['tanggal_lahir'] }}</td>
                                    <td>{{ $datas['jenis_kelamin'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary exampleModaledit" data-toggle="modal" data-target="#exampleModaledit{{ $datas->id }}">
                                            <i class="ti-pencil"></i>
                                        </button>
                                        <form action="/siswa/{{ $datas->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                Showing
                {{ $data->firstItem() }}
                to
                {{ $data->lastItem() }}
                of
                {{ $data->total() }}
                entries
            </div>

            <div class="pull-right">
                <div class="mx-auto text-end mb-2 wow fadeInUp" data-wow-delay="0.5s">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Data --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/siswa" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Siswa</label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" required>

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIS</label>
                            <div class="col-sm-9">
                                <input type="number" id="username" name="username" class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" required>

                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kelas</label>
                            <div class="col-md-9">
                                <select class="form-control" name="kelas_id" >
                                    @foreach ($kelas as $items )
                                    <option value="{{ $items->id }}">{{ $items->kelas }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                value="{{ old('tempat_lahir') }}" required>

                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                value="{{ old('tanggal_lahir') }}" required>

                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                value="{{ old('jenis_kelamin') }}" required>

                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                                <input type="hidden" id="role" name="role" class="form-control @error('role') is-invalid @enderror"
                                value="siswa" readonly>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" required>

                                @error('password')
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
@foreach ($data as $data)
    <div class="modal fade" id="exampleModaledit{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/editsiswa', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-block">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nama Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIS</label>
                                <div class="col-sm-9">
                                    <input type="number" id="username" name="username" class="form-control @error('username') is-invalid @enderror"
                                    value="{{ $data->username }}" required>

                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kelas</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="kelas_id">
                                        @foreach ($kelas as $item)
                                        @if(old('kelas_id', $data->kelas_id) == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->kelas }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                        @endif

                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    value="{{ $data->tempat_lahir }}" required>

                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    value="{{ $data->tanggal_lahir }}" required>

                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                    value="{{ $data->jenis_kelamin }}" required>

                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                                    <input type="hidden" id="role" name="role" class="form-control @error('role') is-invalid @enderror"
                                    value="siswa" readonly>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>

                                    @error('password')
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

  <script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    });

    $(document).ready(function() {
        $('.custom-td').each(function() {
            var text = $(this).text();
            var words = text.split(' ');
            var result = '';
            var count = 0;

            for (var i = 0; i < words.length; i++) {
                result += words[i] + ' ';
                count++;

                if (count >= 5) {
                    result += '\n';
                    count = 0;
                }
            }

            $(this).text(result.trim());
        });
    });
</script>

@endsection
