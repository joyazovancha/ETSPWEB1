@extends('layouts.backend')
@section('title')
    Events
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Arctic Monkeys Events</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('event.create') }}" class="btn btn-dark">Tambah Event</a>
                        </div>
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
                                <th scope="col">Opsi</th>
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
                                    <td><a href="{{ route('event.edit', $d->id) }}" class = "btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('event.destroy', $d->id) }}" onclick="return confirm('are you sure?')" class = "btn btn-danger btn-sm">Hapus</a>
                                        <a href="{{ route('event.show', $d->id) }}" class = "btn btn-info btn-sm">Detail</a>
                                    </td>
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
