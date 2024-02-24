<!-- Ujian Start -->

<div class="container-xxl py-5 category">
    @foreach ($soal as $question)
        <div class="container">
            <div class="row g-3">
                <div class="card" style="border: 0ch">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    {{$soal->links()}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <form wire:submit.prevent="store">
                    <div class="card" style="border: 0ch">
                        <div class="card-header">
                        </div>
                        <div class="card-header" style="background-color:rgb(210, 210, 210)">
                            Soal No {{ $question->id }}
                        </div>
                        <div class="card-body">
                            <div class="col-lg-11 mx-auto">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <p class="card-text">{{ $question->soal }}</p>
                                    </div>
                                    <div class="col-lg-4">
                                        @foreach ($question->subsoal as $key => $sub)
                                        <label for="option{{ $key }}">
                                            <input type="radio" id="option{{ $key }}" wire:model="subsoal_id" name="subsoal_id" value="{{ $sub->nilai }}">
                                            {{ $sub->jawaban }}
                                        </label><br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center" style="background-color:rgb(210, 210, 210)">
                            <a wire:click="kembali" href="javascript:void(0)" class="btn btn-primary btn-lg btn-block">Kembali</a>
                            <a wire:click="store" href="javascript:void(0)" class="btn btn-primary btn-lg btn-block">Simpan dan Lanjutkan</a>
                        </div>
                        <div class="card-footer text-center">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</div>
<!-- Ujian End -->
