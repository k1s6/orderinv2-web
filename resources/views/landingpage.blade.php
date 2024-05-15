<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Landing Page</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('asset/css/styles2.css')}}" rel="stylesheet" />
    <!-- Font inter -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <style>
    @media (max-width: 767.98px) {

        .footer .container .row .col-lg-6.h-100.text-center.text-lg-start.my-auto,
        .footer .container .row .col-lg-6.h-100.text-center.text-lg-end.my-auto {
            text-align: center;
            margin-top: 20px;
        }
    }

    .text-center.text-white {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">ORDERIN</h1>
                        <hr style="border-top: 3px solid black; width: 100%; margin-bottom: 30px;">
                        <h4 class="mb-5">Selamat menikmati makanan lezat</h4>
                        <p>dan dapatkan pengalaman baru dengan makanan di Cafe kami</p>
                    </div>

                    <form action="{{ route('landingpage.validate') }}" method="post" class="form-subscribe"
                        onsubmit="submitForm(event)">
                        <!-- Email address input-->
                        <div class="row">
                            <div class="col">
                                <input class="form-control form-control-lg" id="fullName" name="fullName" type="text"
                                    placeholder="Masukkan Nama Kamu Disini" required />
                                <div class="invalid-feedback text-white">
                                    Coba lagi. Nama harus terdiri dari 3 hingga 15 huruf tanpa angka atau karakter khusus atau spasi.
                                </div>
                            </div>
                        </div>
                        <!-- button submit -->
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-lg">Lanjut</button>
                                </div>
                            </div>
                        </div>
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                <p>To activate this form, sign up at</p>
                                <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer-->
    <footer class="footer bg-light"
        style="background-image: url('asset/img/bggambar.jpg'); background-size: cover; position: relative;">
        <div class="overlay"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(47, 47, 47, 0.5);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline d-flex justify-content-center"
                            style="display:flex; flex-direction:column;">
                            <div style="display:flex; align-items:center">
                                <a href="#!">
                                    <i class="bi-instagram fs-3 text-white" id="logo-ig"></i>
                                </a>
                                <h6 class="mb-0" style="padding: 10px; color: white;">@ngafein</h6>
                            </div>
                            <div>
                                <p class="text-muted small mb-0"
                                    style="padding: 10px; color: white;">&copy; Your Website 2023. All Rights
                                    Reserved.</p>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
        function validateName() {
            var nameInput = document.getElementById('fullName').value;
            var lettersOnly = /^[A-Za-z]+$/;
            if (nameInput.length >= 3 && nameInput.length <= 15 && lettersOnly.test(nameInput)) {
                document.getElementById('fullName').classList.remove('is-invalid');
                // Simpan nama ke dalam local storage
                localStorage.setItem('customerName', nameInput);
                return true;
            } else {
                document.getElementById('fullName').classList.add('is-invalid');
                return false;
            }
        }
    
        function submitForm(event) {
            event.preventDefault();
            if (validateName()) {
                // Tampilkan message box konfirmasi
                var confirmation = confirm("Apakah nama Anda sudah benar?");
                if (confirmation) {
                    window.location.href = 'daftarmenu'; // Lanjut ke halaman selanjutnya
                }
            }
        }
    
        // Dapatkan nama dari local storage dan tampilkan di halaman cart
        window.onload = function () {
            var customerName = localStorage.getItem('customerName');
            if (customerName) {
                document.getElementById('customerNameDisplay').innerText = customerName;
            }
        };
    </script>
    
</body>
