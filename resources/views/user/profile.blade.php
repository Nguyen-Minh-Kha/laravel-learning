@extends('layouts.main')

@section('content')
    <div class="row">

        <div class="col-lg-3">
            @include('includes.sidebar')
        </div>

        <div class="col-lg-9">

            <h1 class="text-muted">{{ $user->name }}'s profile</h1>

            @if (!empty($user->avatar->filename))
                <div class="mb-2">
                    <a href="{{ parse_url($user->avatar->url, PHP_URL_PATH) }}" target="_blank">
                        <img src="{{ parse_url($user->avatar->thumb_url, PHP_URL_PATH) }}" width="200" height="200"
                            alt="{{ $user->name }}'s picture">
                    </a>
                </div>
            @endif


            @forelse ($articles as $article)
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
                        <div class="text-end">{{ $article->comments_count }} Comment(s)</div>
                        @if (Auth::check() && Auth::user()->id == $article->user_id)
                            <div class="mt-2">
                                <a href="{{ route('articles.edit', ['article' => $article->slug]) }}"
                                    class="btn btn-info">Edit</a> &nbsp;

                                <form
                                    style="display:inline"action="{{ route('articles.destroy', ['article' => $article->slug]) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">x</button>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            @empty
                <div class="card mt-4">
                    <div class="card-body">
                        <p class="card-text">No articles found</p>
                    </div>
                </div>
            @endforelse

            {{-- pagination --}}
            <div class="pagination mt-5">
                {{ $articles->links() }}
            </div>


        </div>
    </div>
    </div>
@stop
