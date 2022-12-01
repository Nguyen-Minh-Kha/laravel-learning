@extends('layouts.main')

@section('content')
    <div class="row">

        <div class="col-lg-3">
            @include('includes.sidebar')
        </div>

        <div class="col-lg-9">
            <div class="card mt-4">
                <div class="card-body">
                    <h1 class="card-title"> {{ $article->title }} </h1>

                    <p class="card-text">
                        {{ $article->content }}
                    </p>

                    <span class="author"> by <a
                            href=" {{ route('user.profile', ['user' => $article->user->id]) }}">{{ $article->user->name }}</a>
                        joined on the
                        {{ $article->user->created_at->format('d/m/y') }}</span>
                    <div class="mt-2">
                        <span class="time"> Posted {{ $article->created_at->diffForHumans() }} </span>
                    </div>
                </div>
            </div>
            <!-- Card -->
            {{-- <div class="card card-outline-secondary my-4">
            <div class="card-header">
                comment
            </div>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas eius iusto facere alias
                    corporis possimus
                    ! Modi enim perspiciatis tempore numquam excepturi doloremque illum dolores laudantium aut
                    blanditiis? Eaque, blanditiis error!</p>
                <small class="text-muted"> Jean at 25/01 </small>
                <hr>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit vitae deleniti error enim
                    veniam doloremque cumque tenetur officia tempore eius voluptate,
                    quasi repellat rerum. Blanditiis recusandae cumque dignissimos eaque vero!</p>
                <small class="text-muted"> Paul 29/06 </small>
                <hr>

                <a href="#" class="btn btn-success"> leave a comment</a>
            </div>
        </div> --}}
            <!-- Card -->
        </div>
    </div>
@stop
