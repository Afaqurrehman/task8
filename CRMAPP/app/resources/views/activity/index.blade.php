<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
    <link rel="stylesheet" href="{{asset('assets\assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py3">
        <div class="container">
            <div class="h4 text-white">Activity</div>
</div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Add new Activitys</div>
            <div>
                <a href="{{route('activity.create')}}" class="btn btn-primary">Add</a>
                <a href="{{route('dashboard')}}" class="btn btn-secondary">Back</a>
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
                        <th>type</th>
                        <th>description</th>
                    </tr>
                    @if($activity->isNotEmpty())
                    @foreach($activity as $activity)
                    <tr valign="middle">
                        <td>{{ $activity->type}}</td>
                        <td>{{ $activity->description}}</td>
                    <td>
                        <a href="{{route('activity.edit',$activity->id)}}" class="btn btn-primary btn-sm"> Edit </a>
                    </td>
                    <td>
                        <a href="/delete/activity/{{$activity->id}}" class="btn btn-danger btn-sm">Delete</a>

                    </td>
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
