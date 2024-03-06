@extends("tampilan.main")
@section('content')

<div class="col-lg-12">
    <!-- Contextual classes table starts -->
        <div class="card">
            <div class="card-header">
                <h5>Tabel Data Jurusan Siswa</h5>
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

            <div class="btn-group ml-4">
                <button type="button" class="btn btn-primary">Filter siswa berdasarkan kelas</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    @foreach ($kelas as $item)
                        <a class="dropdown-item {{ $selected_kelas->id == $item->id ? 'active' : '' }}" href="/filterkelas/{{$item->id}}">{{ $item->kelas }}</a>
                    @endforeach
                </div>
                <div class="pull-right mr-4">
                    <a href="#" onclick="printPage()" class="btn btn-primary pull-right" target="_blank">Cetak</a>
                </div>
            </div>

            <div class="card-block table-border-style">
                <div class="table-responsive">
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
                            @forelse ($data as $datas)
                                @if ($datas->user && $datas->user->kelas && $datas->user->kelas->kelas)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $datas->user->name }}</td>
                                        <td>{{ $datas->user->kelas->kelas }}</td>
                                        <td>{{ $datas->kepribadian }}</td>
                                        <td>{{ $datas->jurusan }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="4">Tidak ada data yang tersedia</td>
                                    </tr>
                                @endif
                                @empty
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printPage() {
            // Get the selected class data
            var selectedClass = document.querySelector('.dropdown-item.active').getAttribute('href').split('/').pop();

            // Create a new window for printing
            var printWindow = window.open('', '_blank');

            // Construct the new URL with the selected class data
            var newUrl = '/printfilter/' + selectedClass;

            // Update the URL of the new window
            printWindow.location.href = newUrl;

            // Print the new window
            printWindow.print();
        }
    </script>


@endsection
