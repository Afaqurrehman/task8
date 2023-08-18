<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap.min.css') }}">
    <style>
        /* Additional custom styles */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #37474f; /* Teal Color */
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .create-heading {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .form-container {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }
        .form-container label {
            font-weight: bold;
        }
        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            padding: 10px 20px;
            background-color: #00796b; /* Teal Darker Shade */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #005b4f; /* Teal Darker Shade on Hover */
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="container">
            <h1 class="create-heading">Create Contact</h1>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <div class="d-flex justify-content-between py-3">
                <div class="h4">Create New Contact</div>
                <div>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>

            @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <textarea id="editor" name="contact_name" class="form-control @error('contact_name') is-invalid @enderror"></textarea>
                    @error('contact_name')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <textarea id="email" name="email" class="form-control @error('email') is-invalid @enderror"></textarea>
                    @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone_num" class="form-label">Phone</label>
                    <textarea id="phone_num" name="phone_num" class="form-control @error('phone_num') is-invalid @enderror"></textarea>
                    @error('phone_num')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="company" class="form-label">Company</label>
                    <textarea id="editors" name="company" class="form-control @error('company') is-invalid @enderror"></textarea>
                    @error('company')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <button class="btn btn-primary">Save Contact</button>
            </form>
        </div>
    </div>
</body>
</html>
