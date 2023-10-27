@extends('layouts.backend')
@section('title')
    Show Events
    @endsection
    @section('content')

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="display: flex; justify-content: center;">
                        <img width="300px" class="img-thumbnail" src="@if (empty($data->banner))
                        {{url('img/default-image.png')}}
                    @else
                        {{url('')}}/banner/{{$data->banner}}
                    @endif" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h3>Detail Event</h3>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <a href="{{ route('event.index') }}" class="btn btn-primary btn-sm">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Information</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Nama Event</td>
                                    <td>{{ $data->nama_event }}</td>
                                </tr>
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
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>{{ $data->deskripsi }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
