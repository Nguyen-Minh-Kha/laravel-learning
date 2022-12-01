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
                    Create a new article
                </div>
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="name" class="form-control" value="{{ old('title') }}">
                            @error('title')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" cols="30" rows="5" placeholder="Article content"
                                value={{ old('content') }}></textarea>
                            @error('content')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
            <!-- Card -->
        </div>
    </div>
@stop
