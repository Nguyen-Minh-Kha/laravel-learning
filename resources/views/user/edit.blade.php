@extends('layouts.main')

@section('content')
    <div class="row">

        <div class="col-lg-3">
            @include('includes.sidebar')
        </div>

        <div class="col-lg-9">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Card -->
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Hello {{ $user->name }} !
                </div>
                <div class="card-body">
                    <form action="{{ route('post.user') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" name="avatar">
                            @error('avatar')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        @if (!empty($user->avatar->filename))
                            <div class="mb-2">
                                <a href="{{ parse_url($user->avatar->url, PHP_URL_PATH) }}" target="_blank">
                                    <img src="{{ parse_url($user->avatar->thumb_url, PHP_URL_PATH) }}" width="200"
                                        height="200">
                                </a>
                            </div>
                        @endif


                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                    <p class="mt-5"><a href="{{ route('user.password') }}">Change my Password</a></p>
                    <div class="text-end">
                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="alert alert-danger">Delete</button>
                        </form>
                    </div>


                </div>
            </div>
            <!-- Card -->
        </div>
    </div>
@stop
