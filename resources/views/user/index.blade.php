<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</head>

<body>

    <div class="container min-h-dvh">

        <div class="row mt-3">
            <div class="col-md-6 mt-3 mt-md-0">

                @if (session('status') == 'success')
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12 mt-2 p-3 bg-light rounded">
                        <form action="{{ url('add-user') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="user_name">Name</label>
                                    <input type="text" name="name" id="user_name" class="form-control shadow-none mt-1"
                                        placeholder="Enter Name">
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="age">Age</label>
                                    <input type="number" min="1" max="100" name="age" id="age" class="form-control shadow-none mt-1"
                                        placeholder="Enter Age">
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control shadow-none mt-1"
                                        placeholder="Enter Email">
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control shadow-none mt-1"
                                        placeholder="Enter Phone">
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary w-100">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3 mt-md-0">
                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No User Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>