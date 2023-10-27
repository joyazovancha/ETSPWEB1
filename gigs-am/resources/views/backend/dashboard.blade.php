@extends('layouts.backend')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <div class="text-center">
                            <h3 class="card-title">Event In The Nearest Future</h3>
                        </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Banner</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Event Date</th>
                                <th scope="col">Capacity</th>
                                <th scope="col">HTM</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <th scope="row">{{ $d->id }}</th>
                                    <td>
                                        <img width="100px" class="img-thumbnail" src="@if (empty($d->banner))
                                    {{url('img/default-image.png')}}
                                    @else
                                    {{url('')}}/banner/thumbnail/{{$d->banner}}
                                    @endif" alt="">
                                    </td>
                                    <td>{{ $d->nama_event }}</td>
                                    <td>{{ $d->tanggal_event }}</td>
                                    <td>{{ $d->kapasitas }}</td>
                                    <td> @currency($d->htm)</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
