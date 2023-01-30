<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/listener.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="container">

    <nav class="navbar navbar-expand-lg my-3">
        <div class="container-fluid d-flex">
            <a class="navbar-brand fs-3" href="#">DuTiSa Cloud Drive</a>
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="{{ url('/settings') }}">
                        <button class="btn btn-primary">Settings</button>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="{{ url('/logout') }}">
                        <button class="btn btn-primary">Logout</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="container bg-info my-3 fs-5 px-4 py-2 text-light">
            {{ 'Hello ' . Auth::user()->TraineeCode . ', ' . Auth::user()->name }}
        </div>
        <div class="container mt-5">
            <h3>Upload Files</h3>
            <form id="addForm" method="post" action="{{route('uploadPublic')}}" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="file" name="file" id='file' class='p-5'>
                </div>
                <div class="mb-3">
                    <button type="submit" id='saveBtn' class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

        <script>
            const inputElement = document.querySelector('input[id="file"]');

            const pond = FilePond.create(inputElement);

            FilePond.setOptions({
                server: {
                    process: '{{ route('uploadPublic') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
            //end config filepon
            $(document).ready(function () {
                $("#addForm").on('submit', function (e) {
                    e.preventDefault();
                    $("#saveBtn").html('Processing...').attr('disabled', 'disabled');
                    var link = $("#addForm").attr('action');
                    $.ajax({
                        url: link,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            let url = `${window.location["origin"]}/dashboardPublic`;
                            window.location.href = url;
                        },
                        error: function (response) {
                            $("#saveBtn").html('Save').removeAttr('disabled');
                            let url = `${window.location["origin"]}/dashboardPublic`;
                            window.location.href = url;
                        }
                    });
                });

            });
        </script>
        <hr class="file-table container mt-5 mb-5">
        <div class="m-2 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                Public Files
                <a href="{{ url('/dashboard') }}">
                    <button class="btn btn-primary">Go To Private Folder</button>
                </a>
            </div>
            {{ $files->appends($_GET)->links() }}
        </div>
        <hr class="border border-primary border-1 opacity-75">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">File Name</th>
                <th scope="col" class="col-sm-2 text-center">View</th>
                <th scope="col" class="col-sm-2 text-center">Download</th>
                <th scope="col" class="col-sm-2 text-center">Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($files as $file)
                <tr>
                    <td>{{ $file->name }}</td>
                    <td class="col-sm-2 text-center">
                    @php
                        $extension = explode('.', $file->name)[1];
                    @endphp

                    @if ($extension == 'txt')
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal{{ $file->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade modal-xl" id="modal{{ $file->id }}" tabindex="-1"
                                 aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"> {{ $file->name }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe class="w-100" height="600px"
                                                    src="{{ Storage::url('public/public_files/' . $file->discriminator) }}">
                                            </iframe>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    </td>
                    <td class="col-sm-2 text-center">
                        <form action="{{ url('/downloadPublic/' . $file->id) }}" method="post"
                              id="downloadform{{ $file->id }}">
                            @csrf
                            <button class="btn btn-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                    <td class="col-sm-2 text-center">
                        <form action="{{ url('/deletePublic/' . $file->id) }}" method="post"
                              id="delform{{ $file->id }}">
                            @csrf
                            <button class="btn btn-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    </body>

</html>
