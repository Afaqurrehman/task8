
<x-app-layout>
    <x-slot name="header">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contacts</title>
            <link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            <style>
                /* Additional custom styles */
                body {
                    background-color: #f8f9fa;
                    font-family: Arial, sans-serif;
                }
                .header {
                    background-color: #2c3e50; /* Deep Blue Color */
                    color: #fff;
                    padding: 20px 0;
                    text-align: center;
                }
                .note-heading {
                    font-size: 36px;
                    margin-bottom: 20px;
                }
                .action-buttons {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-top: 20px;
                }
                .action-buttons a {
                    margin-right: 10px;
                    background-color: #34495e; /* Dark Gray Color */
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    padding: 10px 20px;
                    text-decoration: none;
                }
                .action-buttons a:hover {
                    background-color: #2c3e50; /* Deep Blue Color */
                }
                .search-container {
                    margin-top: 20px;
                    display: flex;
                    align-items: center;
                }
                .search-input {
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px 0 0 5px;
                    width: 60%;
                    min-width: 200px;
                }
                .search-button {
                    padding: 10px 20px;
                    background-color: #34495e; /* Dark Gray Color */
                    color: #fff;
                    border: none;
                    border-radius: 0 5px 5px 0;
                    cursor: pointer;
                }
                .search-button:hover {
                    background-color: #2c3e50; /* Deep Blue Color */
                }
                .note-table {
                    margin-top: 30px;
                }
                .note-table th {
                    background-color: #2c3e50; /* Deep Blue Color */
                    color: #fff;
                    font-weight: bold;
                }
                .note-table td {
                    background-color: #f8f9fa;
                }
                .note-table tbody tr:nth-of-type(odd) {
                    background-color: #f8f9fa;
                }
                .note-table tbody tr:hover {
                    background-color: #e2e6ea;
                }
            </style>
        </head>
        <body>

            <div class="header">
                <div class="container">
                    <h1 class="note-heading">Contacts</h1>
                </div>
            </div>

            <div class="container">
                <div class="action-buttons">
                    <h2>Your Contacts</h2>
                    <div>
                        <a href="{{route('contact.create')}}" class="btn btn-primary">Add Contact</a>
                        <a href="{{route('export')}}" class="btn btn-success">Upload to Excel</a>
                        <a href="{{route('activity.index')}}" class="btn btn-success">Activities</a>
                        <a href="{{route('tag.index')}}" class="btn btn-success">Tags</a>
                    </div>

                </div>

                <div class="search-container">
                    <form action="" method="GET" class="form-inline">
                        <input type="text" name="search" class="form-control search-input" placeholder="Search Contact">
                        <button type="submit" class="mt-3 btn btn-primary search-button">Search</button>
                    </form>
                </div>

                @if(Session::has('success'))
                <div class="alert alert-success alert-message">
                    {{ Session::get('success') }}
                </div>
                @endif

                <div class="card border-0 shadow-lg note-table">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Company</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($contact->isNotEmpty())
                                @foreach($contact as $cat)
                                <tr>
                                    <td>{{$cat->contact_name}}</td>
                                    <td>{{$cat->email }}</td>
                                    <td>{{$cat->phone_num }}</td>
                                    <td>{{$cat->company}}</td>

                                    <td>
                                        <a href="{{ route('contact.edit', $cat->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    </td>
                                    <td>
                                        <a href="/delete/dashboard/{{$cat->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4">No records found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </body>

    </x-slot>
</x-app-layout>

