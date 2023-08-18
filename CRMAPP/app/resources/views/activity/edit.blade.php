<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="{{asset('assets\assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py3">
        <div class="container">
            <div class="h4 text-white">Edit activity</div>
</div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Edit</div>
            <div>
                <a href="{{route('activity.index')}}" class="btn btn-primary">Back</a>
               </div>
            </div>
        <form action="{{route('activity.update',$activity->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Type</label>
                        <input type="text" name="type" id="type" placeholder="Enter title of book" class="form-control
                        @error('title') is-invalid @enderror" value="{{old('title',$activity->tag)}}">
                        @error('title')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Description</label>
                        <input type="text" name="description" id="description" placeholder="Enter author name" class="form-control
                        @error('author') is-invalid @enderror" value="{{old('title',$activity->description)}}">
                        @error('author')
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
            <button class="btn btn-primary my-3">update activity</button>
        </form>
    </div>
</body>
</html>
