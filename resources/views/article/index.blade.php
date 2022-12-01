@extends('layouts.main')

@section('content')
    <div class="row">

        <div class="col-lg-3">
            @include('includes.sidebar')
        </div>

        <div class="col-lg-9">

            @foreach ($articles as $article)
                <div class="card mt-4">
                    <div class="card-body">
                        <h2 class="card-title"><a href="{{ route('articles.show', ['article' => $article->slug]) }}">
                                {{ $article->title }} </a></h2>

                        <p class="card-text">
                            {{ Str::words($article->content, 5) }}
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
            @endforeach

            {{-- pagination --}}
            <div class="pagination mt-5">
                {{ $articles->links() }}
            </div>


        </div>
    </div>
    </div>
@stop
