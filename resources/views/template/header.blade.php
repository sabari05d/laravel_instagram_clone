<!-- 
    HEADER FILE 
        # This File contains all cdns, and css files links
        # This is the header of the app for all pages    
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instagram Clone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="header">
            <div class="container-fluid p-3 shadow ">
                <div class="row m-0">
                    <div class="col-12">
                        <div class="row justify-content-evenly align-items-center">
                            <div class="col-6">
                                <span class="fs-2 fw-bold text-success font-1 ">Insatgram Clone</span>
                            </div>
                            <div class="col-6">
                                <div class="">
                                    <span>
                                        <form action="{{ route('logout-user') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger float-end">
                                                Logout
                                            </button>
                                        </form>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">