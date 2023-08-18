<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="{{asset('assets\assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py3">
        <div class="container">
            <div class="h4 text-white">Create categories </div>
</div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Create</div>
            <div>
                <a href="{{route('tag.index')}}" class="btn btn-primary">Back</a>
               </div>

            </div>
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('tag.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Tag Name</label>
                        <input type="text" name="tag_name" id="tag_name" placeholder="Enter category" class="form-control
                        @error('title') is-invalid @enderror" value="{{old('title')}}">
                        @error('title')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select name="contact_id" id="contact_id">
                            @foreach($contact as $con)
                            <option value="{{$con->id}}">{{$con->contact_name}}</option>
                            @endforeach
                        </select>
                        </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Save Tag</button>
        </form>
    </div>
</body>
</html>
