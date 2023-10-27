@extends('layouts.backend')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body" style="display: flex; justify-content: center;">
                    <img width="300px" class="img-thumbnail" src="@if (empty($data->photo))
                        {{url('img/default-image.png')}}
                    @else
                        {{url('')}}/photo/{{$data->photo}}
                    @endif" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Edit Users</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('user.index') }}" class="btn btn-dark">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
                    <form action="{{ route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ old('name', $data->name) }}" name="name" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control"  value="{{ old('email', $data->email) }}" name="email" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Role Name</label>
                            <select name="role_name" class="form-control" id="">
                                <option value="Admin" @if($data->role_name == 'Admin') selected @endif>Admin</option>
                                <option value="Member" @if($data->role_name == 'Member') selected @endif>Member</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Domicile</label>
                            <input type="text" class="form-control" value="{{ old('domicile', $data->domicile) }}" name="domicile" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" value="{{ old('phone_number', $data->phone_number) }}" name="phone_number" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" value="{{ old('alamat', $data->domicile) }}" id="exampleFormControlTextarea1" rows="3">{!! old('alamat', $data->domicile) !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                        </div>
                        <small></small>
                        <div class="mb-3">
                            <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
