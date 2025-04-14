@extends('layouts.app')

@section('title', 'landing page')

@section('body')

    <body style="background-image: url('asset/img/bggambar.jpg'); background-size: cover;">

        <div class="container d-flex align-items-center justify-content-center vh-100">
            <div class="card bg-white bg-opacity-75 px-4 pb-4" style="backdrop-filter: blur(5px);">
                <div class="card-body text-center px-md-4">
                    <p class="fs-1 fw-bolder mb-3 ">ORDERIN</p>
                    <div class="text-capitalize">

                        <p class="fs-4 fw-bold mb-0 text-break">Selamat menikmati makanan lezat</p>
                        <p class="mb-2">dapatkan pengalaman baru dengan makanan di Cafe kami</p>

                        <form id="subscribeForm" class="form-subscribe">
                            <!-- Nama input-->
                            <div class="mb-3">
                                <input class="form-control form-control-lg" id="fullName" name="fullName" type="text"
                                    placeholder="Masukkan Nama Kamu Disini" required />
                                <div class="invalid-feedback text-break`">
                                    Coba lagi. Nama harus terdiri dari 3 hingga 15 huruf tanpa angka atau karakter khusus
                                    atau spasi.
                                </div>
                            </div>
                            <div class="d-grid">
                                <!-- button submit -->
                                <button type="submit" class="btn btn-warning fw-bold ">LANJUT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SweetAlert2 JS -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
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

            document.getElementById('subscribeForm').addEventListener('submit', function(event) {
                event.preventDefault();
                if (validateName()) {
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: "Apakah nama Anda sudah benar?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'daftarmenu'; // Lanjut ke halaman selanjutnya
                        }
                    });
                }
            });

            // Dapatkan nama dari local storage dan tampilkan di halaman cart
            window.onload = function() {
                var customerName = localStorage.getItem('customerName');
                if (customerName) {
                    document.getElementById('customerNameDisplay').innerText = customerName;
                }
            };
        </script>

    </body>

@endsection
