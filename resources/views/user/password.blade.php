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
                    Edit my Password
                </div>
                <div class="card-body">
                    <form action="{{ route('update.password') }}" method="POST">


                        @csrf

                        <div class="form-group">
                            <label for="current" class="form-label">Current password</label>
                            <input type="password" name="current" class="form-control">
                            @error('current')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">New password</label>
                            <input type="password" name="password" class="form-control">
                            @error('current')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Password confirm</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                    <p class="mt-5"><a href="{{ route('user.edit') }}">back to my account</a></p>
                </div>
            </div>
        </div>
        <!-- Card -->
    </div>
    </div>
@stop
