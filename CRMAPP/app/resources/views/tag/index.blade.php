<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tags</title>
    <link rel="stylesheet" href="{{asset('assets\assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py3">
        <div class="container">
            <div class="h4 text-white">Tags</div>
</div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Add new categories</div>
            <div>
                <a href="{{route('tag.create')}}" class="btn btn-primary">Add</a>
                <a href="" class="btn btn-secondary">Back</a>
               </div>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success">
              {{Session::get('success')}}
            </div>
            @endif
        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>category name</th>
                        <th>description</th>
                    </tr>
                    @if($tag->isNotEmpty())
                    @foreach($tag as $tag)
                    <tr valign="middle">
                        <td>{{ $tag->tag_name}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">Record not found</tr>
                    @endif


</table>
            </div>
        </div>
    </div>
</body>
</html>
