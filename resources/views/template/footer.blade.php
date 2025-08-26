</div>

<footer>
    <div class="footer">
        <div class="row m-0 justify-content-center ">
            <div class="col-md-8 col-lg-5">
                <div class="p-2 rounded-5" style="min-height: 10dvh; background-color: black;">
                    <div class="row m-0">
                        <div class="col-12">
                            <div class="row justify-content-evenly">
                                <div class="col-2">
                                    <a href="{{ route('user.dashboard', Auth::user()->username) }}"
                                        class="text-decoration-none text-white">
                                        <span class="text-center">
                                            <p class="mb-0">
                                                <i class="bi bi-house-fill fs-4"></i>
                                            </p>
                                            <p class="mb-0">Home</p>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('user.posts', Auth::user()->username) }}"
                                        class="text-decoration-none text-white">
                                        <span class="text-center">
                                            <p class="mb-0">
                                                <i class="bi bi-plus-circle fs-4"></i>
                                            </p>
                                            <p class="mb-0">Post</p>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('user.profile', Auth::user()->username) }}"
                                        class="text-decoration-none text-white">
                                        <span class="text-center">
                                            <p class="mb-0">
                                                <i class="bi bi-person-fill fs-4"></i>
                                            </p>
                                            <p class="mb-0">Profile</p>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>
</body>

</html>

<!-- 
    FOOTER FILE        
        # This File contains all scripts
        # This is the footer of the app for all pages    
-->