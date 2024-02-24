
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Penentuan Jurusan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- /assets1/Libraries Stylesheet -->
    <link href="/assets1/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/assets1/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/assets1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/assets1/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h5 class="ml-3">{{ auth()->user()->name }}/ {{ auth()->user()->username }}</h5>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav p-4 p-lg-0" style="margin-left: 30%">
                <h5>00:29:30</h5>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Ujian Start -->
    
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="row g-3">
                @foreach ($soal as $question)
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
                                <div class="col-lg-4">
                                    @foreach ($question->subsoal as $sub)
                                    <label for="option{{ $sub->id }}">
                                        <input type="radio" id="option{{ $sub->id }}"
                                        name="jawaban"
                                        value="{{ $sub->nilai }}">
                                        {{ $sub->jawaban }}
                                    </label><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center" style="background-color:rgb(210, 210, 210)">
                        <a href="#" class="btn btn-primary">kembali</a>
                        <a href="#" class="btn btn-primary">Lanjutkan</a>
                    </div>
                    <div class="card-footer text-center">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ujian End -->


    <!-- JavaScript /assets1/Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets1/lib/wow/wow.min.js"></script>
    <script src="/assets1/lib/easing/easing.min.js"></script>
    <script src="/assets1/lib/waypoints/waypoints.min.js"></script>
    <script src="/assets1/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/assets1/js/main.js"></script>
</body>

</html>
