@extends('template.master')
@section('title', 'View Post')
@section('content')
    <div class="min-vh-80 p-3">
        <div class="row m-0 justify-content-center">
            <div class="col-md-8 col-lg-5">
                <p class="fs-3 fw-semibold text-center text-uppercase text-center">View Post</p>

                <div class="card text-white bg-black">
                    @if ($post->files->count())
                        <div id="postCarousel{{ $post->id }}" class="carousel slide mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner p-3">

                                @foreach ($post->files as $index => $file)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        @if (str_starts_with($file->file_type, 'image'))
                                            <img src="{{ asset('storage/uploads/posts/' . $file->file_name) }}" class="d-block w-100"
                                                style="height: 400px; object-fit: contain; background-color: black;" alt="Post Image">
                                        @elseif (str_starts_with($file->file_type, 'video'))
                                            <video class="d-block w-100" style="height: 400px; object-fit: cover;" controls>
                                                <source src="{{ asset('storage/uploads/posts/' . $file->file_name) }}"
                                                    type="{{ $file->file_type }}">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    </div>
                                @endforeach

                            </div>

                            {{-- Carousel controls --}}
                            @if ($post->files->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#postCarousel{{ $post->id }}"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#postCarousel{{ $post->id }}"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            @endif
                        </div>
                    @endif


                    <div class="card-body">
                        <h5 class="card-title">{{ $user->first_name ?? 'Unknown User' }}</h5>
                        <p class="card-text">{{ $post->caption ?? 'No caption' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection