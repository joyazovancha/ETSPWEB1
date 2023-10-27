@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-4 text-center">
            <h1 style="font-family: 'Bebas Neue', sans-serif; font-weight: bold; text-decoration: underline;">Events Arctic Monkeys</h1>
        </div>
        <div class="row">
            @foreach($data as $d)
                <div class="col-3 mb-3">

                    <div class="card text-light" style="background-color: #000000">
                        <a href="{{ route('detailGigs',$d->id) }}">
                        <img src="@if (empty($d->banner))
                                    {{url('img/default-image.png')}}
                                    @else
                                    {{url('')}}/banner/thumbnail/{{$d->banner}}
                                    @endif" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $d->nama_event }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($d->deskripsi, 100) }}</p>
                        </div>
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item text-secondary text-end" style="background-color: #000000"><small>{{ $d->tanggal_event }}</small></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
