<div class="my-4">
    Category
</div>
<div class="list-group">
    @foreach (App\Models\Category::has('articles')->get() as $category)
        <a href="{{ route('category.show', ['category' => $category->slug]) }}"
            class="list-group-item {{ Request::is('category/' . $category->slug) ? 'active' : '' }}">{{ $category->name }}</a>
    @endforeach
    {{-- <a href="#" class="list-group-item active">Laravel</a>
    <a href="#" class="list-group-item">PHP</a>
    <a href="#" class="list-group-item">JS</a>
    <a href="#" class="list-group-item">VueJS</a> --}}
</div>
