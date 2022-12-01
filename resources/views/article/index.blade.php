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
                        <h2 class="card-title"><a href="{{ route('articles.show', ['article' => $article->id]) }}">
                                {{ $article->title }} </a></h2>

                        <p class="card-text">
                            {{ Str::words($article->content, 5) }}
                        </p>

                        <span class="author"> by <a href="">Hanna</a></span>
                        <span class="time"> {{ $article->created_at->diffForHumans() }} </span>
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
