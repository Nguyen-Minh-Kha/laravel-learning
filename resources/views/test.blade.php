@extends('layouts.main')

@section('content')
<div class="row">

    <div class="col-lg-3">
        @include('includes.sidebar')
    </div>

    <div class="col-lg-9">
        <div class="card mt-4">
            <div class="card-body">
                <h2 class="card-title"><a href="#">Laravel</a></h2>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed iure corrupti
                    facilis,
                    voluptates a quam adipisci est labore nihil. Consequatur sed qui impedit exercitationem
                    voluptatum rem fuga eligendi eveniet alias!</p>
                <span class="author"> by <a href="">Hanna</a></span>
                <span class="time"> 1hr ago </span>
            </div>
        </div>
        <!-- Card -->
        <div class="card card-outline-secondary my-4">
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
        </div>
        <!-- Card -->
    </div>
</div>
@stop