@extends('template.master')
@section('title', 'Dashboard')
@section('content')
    <div class="min-vh-80 p-3">
        <div class="row m-0 justify-content-center">
            <div class="col-md-8 col-lg-5">
                <p class="fs-3 fw-semibold">Welcome {{ Auth::user()->first_name }} !</p>

                <div class="row m-0">
                    @foreach($posts as $post)
                        <div class="col-md-12 mb-4 px-0">
                            <div class="card rounded-0 h-100">
                                @if($post->files->count())
                                    @php
                                        $imageFile = $post->files->firstWhere(fn($file) => str_starts_with($file->file_type, 'image'));
                                    @endphp

                                    @if($imageFile)
                                        <img src="{{ asset('storage/uploads/posts/' . $imageFile->file_name) }}" class="card-img-top"
                                            alt="Post Image">
                                    @else
                                        <div class="p-4 text-center text-warning">Files found, but no image</div>
                                    @endif
                                @else
                                    <div class="p-4 text-center text-muted">No files found</div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title mb-0">
                                        {{ $post->user->first_name ?? 'Unknown User' }}
                                    </h5>
                                    <small>{{ $post->user->username ?? 'unknown'}}</small>
                                    <p class="card-text">{{ $post->caption ?? 'No caption' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>   
    </div>
@endsection