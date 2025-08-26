@extends('template.master')
@section('title', 'Posts')
@section('content')
    <div class="min-vh-80 p-3">
        <div class="row m-0 justify-content-center">
            <div class="col-md-8 col-lg-5">
                <p class="fs-3 fw-semibold text-center text-uppercase">Profile Page</p>

                <p>My Posts</p>
                <div class="row m-0">
                    @foreach($posts as $post)
                        <div class="col-md-4 mb-4 px-0">
                            <a href="{{ route('user.view-post', ['username' => $user->username, 'post' => $post->id]) }}"
                                class="text-decoration-none">
                                <div class="card rounded-0 h-100">
                                    @if($post->files->count())
                                        @php
                                            $imageFile = $post->files->filter(function ($file) {
                                                return str_starts_with($file->file_type, 'image');
                                            })->first();
                                        @endphp

                                        @if($imageFile)
                                            <img src="{{ asset('storage/uploads/posts/' . $imageFile->file_name) }}"
                                                class="card-img-top" alt="Post Image">
                                        @else
                                            <div class="p-4 text-center text-warning">Files found, but no image</div>
                                        @endif
                                    @else
                                        <div class="p-4 text-center text-muted">No files found</div>
                                    @endif
                                    <div class="card-body">
                                        <p class="card-text">{{ $post->caption ?? 'No caption' }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>



    <!-- Scripts -->


@endsection