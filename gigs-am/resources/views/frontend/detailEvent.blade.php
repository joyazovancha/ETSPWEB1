@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-4 text-center">
            <h1 style="font-family: 'Bebas Neue', sans-serif; font-weight: bold; text-decoration: underline;">Detail Event Arctic Monkeys</h1>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card text-bg-dark">
                    <img src="@if (empty($data->banner))
                                    {{url('img/default-image.png')}}
                                    @else
                                    {{url('')}}/banner/thumbnail/{{$data->banner}}
                                    @endif" class="card-img" alt="...">
                </div>
            </div>
            <div class="col-8">
                <div class="card text-light" style="background-color: #000000;">
                    <div class="card-header">
                        {{ $data->nama_event }}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $data->deskripsi }}</p>
                            <div class="table-responsive mb-4">
                                <table class="" style="background-color: black; color: white;">
                                    <thead>
                                    <tr>
                                        <th style="width: 200px">Title</th>
                                        <th>Information</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tanggal Event</td>
                                        <td>{{ $data->tanggal_event }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kapasitas</td>
                                        <td>{{ $data->kapasitas }}</td>
                                    </tr>
                                    <tr>
                                        <td>HTM</td>
                                        <td>@currency($data->htm)</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <footer class="blockquote-footer">Come on <cite title="Source Title">Join Us!</cite></footer>
                            <footer class="blockquote-footer">Share <cite title="Source Title">
                                    <a href="#" class="copy-button"
                                       data-clipboard-text="{{ url()->current() }}">
                                        <i class="lni lni-link mx-2"></i> Copy Link
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode(url()->current()) }}"
                                       target="_blank"
                                       rel="noopener noreferrer">
                                        <i class="fa fa-whatsapp mx-2"></i> Whatsapp
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                       target="_blank"
                                       rel="noopener noreferrer">
                                        <i class="lni lni-facebook-original mx-2"></i> Facebook
                                    </a>

                                </cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Menambahkan event listener untuk tombol copy
        document.querySelector('.copy-button').addEventListener('click', function(event) {
            event.preventDefault();

            // Mengambil teks yang akan disalin ke clipboard
            var textToCopy = this.getAttribute('data-clipboard-text');

            // Membuat elemen textarea sementara untuk menyalin teks ke clipboard
            var textArea = document.createElement('textarea');
            textArea.value = textToCopy;

            // Menambahkan elemen textarea ke dokumen
            document.body.appendChild(textArea);

            // Memilih teks dalam elemen textarea
            textArea.select();
            textArea.setSelectionRange(0, 99999); // Untuk mendukung beberapa browser

            // Menyalin teks ke clipboard
            document.execCommand('copy');

            // Menghapus elemen textarea sementara
            document.body.removeChild(textArea);

            // Menampilkan pesan atau tindakan lain setelah menyalin berhasil
            alert('Link copied to clipboard');
        });
    </script>
@endsection
