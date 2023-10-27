@extends('layouts.backend')
@section('title')
    Users
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Management Users and Members</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-dark">Tambah User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <th scope="row">{{ $d->id }}</th>
                                    <td>
                                        <img width="100px" class="img-thumbnail" src="@if (empty($d->photo))
                                    {{url('img/default-image.png')}}
                                    @else
                                    {{url('')}}/photo/thumbnail/{{$d->photo}}
                                    @endif" alt="">
                                    </td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->role_name }}</td>
                                    <td>{{ $d->phone_number }}</td>
                                    <td><a href="{{ route('user.edit', $d->id) }}" class = "btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('user.destroy', $d->id) }}" onclick="return confirm('are you sure?')" class = "btn btn-danger btn-sm">Hapus</a>
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
