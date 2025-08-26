@extends('template.master')
@section('title', 'Posts')
@section('content')
    <div class="min-vh-80 p-3">
        <div class="row m-0 justify-content-center">
            <div class="col-md-8 col-lg-5">
                <p class="fs-3 fw-semibold text-center text-uppercase">Add Post</p>


                <form action="{{ route('user.add-post', Auth::user()->username) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <label for="files" class="form-label d-block">Upload Images/Videos</label>
                            <input type="file" id="files" name="files[]" multiple accept="image/*,video/*"
                                class="form-control" onchange="previewCarousel()">
                        </div>
                    </div>

                    <!-- Bootstrap Carousel for Preview -->
                    <div id="previewCarouselWrapper" class="mt-3" style="display: none;">
                        <div id="previewCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner" id="carousel-inner">
                                <!-- Slides will be injected here -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#previewCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#previewCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label for="caption" class="form-label">Caption</label>
                            <textarea name="caption" id="caption" rows="3" required class="form-control w-100"
                                placeholder="Enter caption..."></textarea>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success w-100">Post</button>
                    </div>
                </form>




            </div>
        </div>
    </div>



    <!-- Scripts -->
    <script>
        function previewCarousel() {
            const previewWrapper = document.getElementById('previewCarouselWrapper');
            const carouselInner = document.getElementById('carousel-inner');
            const files = document.getElementById('files').files;

            carouselInner.innerHTML = '';
            previewWrapper.style.display = files.length ? 'block' : 'none';

            Array.from(files).forEach((file, index) => {
                const type = file.type;
                const item = document.createElement('div');
                item.className = `carousel-item${index === 0 ? ' active' : ''}`;

                if (type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.className = 'd-block w-100 rounded';
                    img.style.maxHeight = '400px';
                    item.appendChild(img);
                } else if (type.startsWith('video/')) {
                    const video = document.createElement('video');
                    video.src = URL.createObjectURL(file);
                    video.className = 'd-block w-100 rounded';
                    video.style.maxHeight = '400px';
                    video.controls = true;
                    item.appendChild(video);
                } else {
                    const msg = document.createElement('p');
                    msg.innerText = 'Unsupported file type';
                    item.appendChild(msg);
                }

                carouselInner.appendChild(item);
            });
        }
    </script>


@endsection