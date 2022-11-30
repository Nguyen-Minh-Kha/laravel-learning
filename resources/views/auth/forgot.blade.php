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

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Card -->
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Forgot my password
                </div>
                <div class="card-body">
                    <form action="{{ route('post.forgot') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                    <div> <a href="{{ route('register') }}">I don't have an account</a></div>
                    <div> <a href="{{ route('forgot') }}">I forgot my password</a></div>
                </div>
            </div>
            <!-- Card -->
        </div>
    </div>
@stop
