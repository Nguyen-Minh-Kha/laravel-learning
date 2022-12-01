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
                    Edit {{ $article->title }}
                </div>
                <div class="card-body">
                    <form action="{{ route('articles.update', ['article' => $article->slug]) }}" method="POST">

                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $article->title) }}">
                            @error('title')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" cols="30" rows="5" placeholder="Article content">{{ old('content', $article->content) }}</textarea>
                            @error('content')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if (old('category', $article->category_id ?? '') == $category->id) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>

                </div>
            </div>
            <!-- Card -->
        </div>
    </div>
@stop
